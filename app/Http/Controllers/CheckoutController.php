<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
Use App\Payment;
use App\Order;
use App\OrderDetail;
use Cart;
use SoftDeletes;
use Cartalyst\Stripe\Stripe;
use Charge;
use Session;
Use Auth; 
session_start(); 

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function get_checkout()
    {
        if (Auth::check()) 
        {
            return view('user.checkout');
        }
        else
        {
    		return redirect('/login');
        }
    }

    public function store_checkout(Request $request)
    {
        /*
        try 
        {
            $stripe  = new Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

            $charges = $stripe->charges()->create([
                    'amount'         =>  Cart::total() / 100,
                    'currency'       =>  'usd',
                    'description'    =>  'Example charge',
                    'source'         =>  $request->stripeToken,
                    'receipt_email'  =>  $request->email,
                    ]);

            if ($charges) 
            {*/
                $shipping= Shipping::create([
                    'user_id'    => Auth::user()->id,
                    'name'       => $request->name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                    'address'    => $request->address,
                    'city'       => $request->city,
                    'country'    => $request->country,
                ]);
                $order= Order::create([
                    'user_id'        => Auth::user()->id,
                    'shipping_id'    => $shipping->id,
                    'payment_id'     => '1',
                    'order_total'    => Cart::total(),
                    'status_id'      => '1', 
                ]);
                
                $cart_contents = Cart::content();
                foreach ($cart_contents as $product) 
                {
                    OrderDetail::create([
                        'order_id'               => $order->id,
                        'product_id'             => $product->id,
                        'product_name'           => $product->name,
                        'product_total'          => $product->total,
                        'product_sales_quantity' => $product->qty,
                    ]);
                }
                Cart::instance('default')->destroy();
                Session::put('success_payment', 'your payment has successfully been accepted');
                return redirect('/thanks/for/order');
           /* }
            else
            {
               Session::put('failed_payment', 'your payment has not been accepted');
                return redirect()->back();   
            }
        } 
        catch (Exception $e) 
        {
            echo 'error';
        }*/
    }

    public function thanks_for_order()
    {
        if (!Session::get('success_payment')) 
        {
            return redirect('/');
        }
        return view('user.thanks_for_order');
    }

    public function manage_orders()
    {
        $orders= Order::all();
        return view('orders.manage_order', compact('orders'));
    }

    public function view_order($order_id)
    {
        $order         = Order::findOrFail($order_id);
        $order_details = OrderDetail::where('order_id', $order_id)->get();
        return view('orders.view_order', compact('order', 'order_details'));
    }
}
