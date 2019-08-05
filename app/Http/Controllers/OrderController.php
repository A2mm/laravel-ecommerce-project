<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use SoftDeletes;
use Session;

class OrderController extends Controller
{
    public function ask_delete_order(Request $request)
    {
          if (!Session::get('admin_name')) 
        {
            return redirect('/admin/login');
        }
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $order= Order::findOrFail($id);
            return view('orders.ask_delete_order_modal', compact('order'));
        }
    }

    public function delete_order(Request $request)
    {
        $id= $request->id;
        $order= Order::findOrFail($id);
        $result= $order->forceDelete();
        if ($result) 
            {
                Session::put('message', 'order deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'order could not be deleted');
                return redirect()->back();
            }
    }   
}
