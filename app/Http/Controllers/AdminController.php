<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Product;
use App\Category;
use App\Brand;
use App\Slider;
use App\Order;
use DB;
use Session;
session_start();

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('admin_login_form', 'store_admin_login_form');
    }

    public function admin_login_form()
    {
        if (Session::get('admin_name')) 
        {
            return redirect('/admin/dashboard');
        }
        else
        {
            return view('admin.admin_login_form');  
        }       
    }

    public function store_admin_login_form(Request $request)
    {
        $this->validate($request,[
            'admin_email'     => 'required|email',
            'admin_password'  => 'required|min:6',
        ]);
        $admin_email      = $request->admin_email;
        $admin_password  = md5($request->admin_password);

        $result= Admin::where(['admin_email' => $admin_email, 'admin_password' => $admin_password])->first();
        
        if(empty($result))
        {
            
            Session::put('error_message', 'invalid email or password');
            return redirect('/admin/login')->with('error_message', 'invalid email or password');
        }
        else
        {
            Session::put('admin_id', $result->id);
            Session::put('admin_name', $result->admin_name);
            return redirect('/admin/dashboard');
        } 
    }

    public function admin_dashboard()
    {
            $users      =  User::all();
            $products   =  Product::all();
            $categories =  Category::all();
            $brands     =  Brand::all();
            $sliders    =  Slider::all();
            $orders     =  Order::all();
            return view('admin.admin_dashboard', compact('users', 'products', 'categories', 'brands', 'sliders', 'orders'));
    }

    public function admin_logout()
    {
            Session::flush();
            return redirect('/admin/login');
    }

    public function view_all_customers()
    {
        $users= User::all();
        return view('admin.view_all_customers', compact('users'));
    }

    public function view_customer_orders($id)
    {
        $user   = User::where('id', $id)->first();
        $orders = Order::where('user_id', $id)->get();
        return view('admin.view_customer_orders', compact('user', 'orders'));
    }

    public function ask_delete_customer(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $customer= User::findOrFail($id);
            return view('admin.ask_delete_customer_modal', compact('customer'));
        }
    }

    public function delete_customer(Request $request)
    {
        $id= $request->id;
        $customer= User::findOrFail($id);
        $result= $customer->forceDelete();
        if ($result) 
            {
                Session::put('message', 'customer deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'customer could not be deleted');
                return redirect()->back();
            }
    }

    public function view_all_orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.view_all_orders', compact('orders'));
    }

}
