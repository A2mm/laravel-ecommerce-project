<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use SoftDeletes;
use Session;
session_start(); 

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function all_products()
    {
    	$products= Product::orderBy('created_at', 'desc')->get();
    	 return view('products.all_products', compact('products'));
    }

    public function add_new_product()
    {
    	return view('products.add_new_product');
    }

    public function save_product(Request $request)
    {
         $this->validate($request, [
            'name'         => 'required|unique:products',
            'category_id'  => 'required',
            'brand_id'     => 'required',
            'description'  => 'required|min:10|max:100',
            'price'        => 'required|numeric',
            'availability' => 'required|numeric',
            'color'        => 'required',
            'image'        => 'required',
        ]);

    	if ($request->hasFile('image')) 
    	{
    		$file        = $request->file('image');
            $image_name  = $file->getClientOriginalName();
    		$upload_path = $file->move('productsImages', $image_name);
    		if ($upload_path) 
    		{
    			$result= Product::create([
    				'name'             => $request->name,
    				'category_id'      => $request->category_id,
    				'brand_id'         => $request->brand_id,
    				'description'      => $request->description,
    				'price'            => $request->price,
    				'color'            => $request->color,
    				'image'            => $upload_path,
                    'availability'     => $request->availability,
    				'status'           => $request->status,
    			]);

    	         if ($result) 
    	         {
                    Session::put('message', 'product added successfully');
    		        return redirect('/add/new/product');
    	         }
    		}
    		else
    		{
    			return 'error';
    		}
    	}
    	else
    	{
    		return 'no file selected';
    	}
    }

    public function view_product($id)
    {
        $product= Product::findOrFail($id);
        return view('products.view_product', compact('product'));
    }

    public function activate_product($id)
    {
        $product= Product::findOrFail($id);
        $result= $product->update(['status' => true]);
        if ($result) 
        {
            Session::put('message', 'product activated successfully');
             return redirect()->back();
        }
        else
        {
            Session::put('message', 'product could not be activated');
            return redirect()->back();
        } 
    }

    public function deactivate_product($id)
    {
        $product= Product::findOrFail($id);
        $result= $product->update(['status' => false]);
        if ($result) 
        {
            Session::put('message', 'product deactivated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'product could not be deactivated');
             return redirect()->back();
        } 
    }

    public function edit_product($id)
    {
        $product= Product::findOrFail($id);
        return view('products.edit_product', compact('product'));
    }

    public function update_product(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'category_id'  => 'required',
            'brand_id'     => 'required',
            'description'  => 'required|min:10|max:100',
            'price'        => 'required|numeric',
            'availability' => 'required|numeric',
            'color'        => 'required',
            'image'        => 'required',
        ]);
        
        $id= $request->id;
        $status= $request->status;
        if (empty($request->status)) 
        {
            $status= false;
        }
        $product= Product::findOrFail($id);

        if ($request->hasFile('image')) 
        {
            $file= $request->file('image');
            $image_name= $file->getClientOriginalName();
            $upload_path= $file->move('productsImages', $image_name);

            if ($upload_path) 
            {
                $result= $product->update([
                    'name'             => $request->name,
                    'category_id'      => $request->category_id,
                    'brand_id'         => $request->brand_id,
                    'description'      => $request->description,
                    'price'            => $request->price,
                    'color'            => $request->color,
                    'image'            => $upload_path,
                    'status'           => $status,
                ]);

                 if ($result) 
                 {
                    Session::put('message', 'product updated successfully');
                    return redirect()->back();
                 }
                 else // condition if can not updated
                 {
                    Session::put('message', 'product could not be updated');
                    return redirect()->back();
                 }
            }
            else // condition if -file not moved to upload folder path
            {
                return 'error path';
            }
        }

        else   // condition if no file selected
        {
            return 'no file selected';
        } 
    }

    public function ask_delete_product(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $product= Product::findOrFail($id);
            return view('products.ask_delete_product_modal', compact('product'));
        }
    }

    public function delete_product(Request $request)
    {
        $id= $request->id;
        $product= Product::findOrFail($id);
        $result= $product->forceDelete();
        if ($result) 
            {
                Session::put('message', 'product deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'product could not be deleted');
                return redirect()->back();
            }
    }
}
