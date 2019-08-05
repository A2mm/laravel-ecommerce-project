<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
session_start(); 

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $id= $request->id;
        $qty= $request->qty;
        
        $this->validate($request, [
            'qty' =>'required|numeric|min:1|max:10'
        ]);

        $cartItem   = Cart::content();
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($id)
            {
                return $cartItem->id == $id;
            })->first();

        if(!empty($duplicates))
        {
            Session::put('message', 'item already exists in your cart');
            return redirect()->back();
        }
        else
        {
            $product= Product::findOrFail($id);
            $data['qty']               = $qty;
            $data['id']                = $product->id;
            $data['name']              = $product->name;
            $data['price']             = $product->price;
            $data['options']['image']  = $product->image;

            Cart::add($data);
            Session::put('message', 'item added to cart successfully');
            return redirect()->back();
        }       
    }

    public function add_item_in_wishlist($id)
    {
        $cartItem= Cart::instance('savedForLater')->content();
        $duplicates= Cart::instance('savedForLater')->search(function ($cartItem, $rowId) use ($id)
            {
                return $cartItem->id == $id;
            })->first();

        if(!empty($duplicates))
        {
            Session::put('message', 'item already exists in your wishlist');
            return redirect()->back();
        }
        else
        {
            $product= Product::findOrFail($id);

            $data['id']                = $product->id;
            $data['name']              = $product->name;
            $data['qty']               = 1;
            $data['price']             = $product->price;
            $data['options']['image']  = $product->image;

            Cart::instance('savedForLater')->add($data);
            Session::put('message', 'item added to your wishlist successfully');
            return redirect()->back();
        }       
    }

    public function show_shopping_cart_contents()
    {
    	$shopping_cart_contents= Cart::content();
    	return view('cart.shopping_cart_contents', compact('shopping_cart_contents'));
    }

    public function get_shopping_cart_empty()
    {
            Cart::destroy();
            Session::put('message', 'Cart got empty successfully');
            return redirect('/show/shopping/cart/contents');                
    }
    public function get_saved_for_later_empty()
    {
            Cart::instance('savedForLater')->destroy();
            Session::put('message', 'saved for later got empty successfully');
            return redirect()->back();                
    }


    public function delete_item_from_cart($rowId)
    {
            Cart::remove($rowId);
            Session::put('message', 'product removed successfully');
            return redirect()->back();      		
    }

    public function delete_item_from_saved_for_later($rowId)
    {
            Cart::instance('savedForLater')->remove($rowId);
            Session::put('message', 'product removed from saved for later successfully');
            return redirect()->back();              
    }

    public function save_item_for_later($current_rowId)
    {
            $item= Cart::get($current_rowId);
            Cart::remove($current_rowId);
            $cartItem = Cart::instance('savedForLater')->content();

            $duplicates= Cart::instance('savedForLater')->search(function($cartItem, $rowId) use ($current_rowId)
            {
                return $rowId === $current_rowId;
            })->first();

            if(!empty($duplicates))
            {
                Session::put('message', 'item already saved for later before');
                return redirect()->back();
            }
            else
            {

            
            $data['qty']               = $item->qty;
            $data['id']                = $item->id;
            $data['name']              = $item->name;
            $data['price']             = $item->price;
            $data['options']['image']  = $item->options->image;

            Cart::instance('savedForLater')->add($data);
            Session::put('message', 'product saved for later successfully');
            return redirect()->back();
            }         
    }

    public function move_item_to_cart($current_rowId)
    {
            $item= Cart::instance('savedForLater')->get($current_rowId);
            Cart::instance('savedForLater')->remove($current_rowId);
            $cartItem = Cart::content();
            $duplicates= Cart::instance('default')->search(function($cartItem, $rowId) use ($current_rowId)
            {
                return $rowId === $current_rowId;
            })->first();

            if(!empty($duplicates))
            {
                Session::put('message', 'item already exists in your cart');
                return redirect()->back();
            }
            else
            {
            $data['qty']               = $item->qty;
            $data['id']                = $item->id;
            $data['name']              = $item->name;
            $data['price']             = $item->price;
            $data['options']['image']  = $item->options->image;

            Cart::instance('default')->add($data);
            Session::put('message', 'product moved to cart successfully');
            return redirect()->back(); 
            }        
    }

    public function update_shopping_cart(Request $request)
    {
        $this->validate($request, [
            'qty' =>'required|numeric|min:1|max:10'
        ]);

    	$rowId = $request->rowId; 
        $qty   = $request->qty;
    	Cart::update($rowId, $qty);
    	Session::put('message', 'quantity updated successfully');
    	return redirect()->back();     	
    }
}

