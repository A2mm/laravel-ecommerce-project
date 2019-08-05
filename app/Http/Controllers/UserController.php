<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use Session;
session_start();

class UserController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function user_home()
    {
        $user_id = Auth::user()->id;
        $user_orders_count= Order::where('user_id', $user_id)->get();
    	return view('user.user_dashboard', compact('user_orders_count'));
    }

    public function user_logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

    public function view_orders()
    {
        $user_id= Auth::user()->id;
    	$orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
    	return view('user.view_orders', compact('orders'));
    }

    public function view_my_profile()
    {
    	$user= Auth::user();
    	return view('user.view_profile', compact('user'));
    }

    public function manage_my_orders()
    {
        $user_id= Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('user.manage_my_orders', compact('orders'));
    }

    public function ask_delete_order(Request $request)
    {
        if ($request->ajax()) 
        {
            $order_id = $request->get('id');
            $order    = Order::findOrFail($order_id);
            if ($order) 
            {
                return view('user.ask_delete_order_modal', compact('order'));
            }
        }
    }

    public function delete_order(Request $request)
    {
        $order_id= $request->id;
        $order    = Order::findOrFail($order_id);
        if ($order) 
        {
           $order->delete();
           Session::put('message', 'Order deleted successfully');
           return redirect('/manage/my/orders');
        }
    }

    public function view_order($id)
    {
        $order = Order::where('id', $id)->first();
        return view('user.view_specific_order', compact('order'));
    }

}
