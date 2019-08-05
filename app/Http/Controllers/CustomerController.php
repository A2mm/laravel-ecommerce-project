<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use SoftDeletes;
use Session;
session_start(); 

class CustomerController extends Controller
{
    public function all_customers()
    {
        $customers= Customer::orderBy('created_at', 'desc')->get();
    	return view('customer.all_customers', compact('customers'));
    }


    public function view_customer($id)
    {
        $customer= Customer::findOrFail($id);
        return view('customer.view_customer', compact('customer'));
    }


    public function ask_delete_customer(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $customer= Customer::findOrFail($id);
            return view('customer.ask_delete_customer_modal', compact('customer'));
        }
    }

    public function delete_customer(Request $request)
    {
        $id= $request->id;
        $customer= Customer::findOrFail($id);
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
}

}
