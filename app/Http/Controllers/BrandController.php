<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;
use SoftDeletes;
session_start(); 

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function all_brands()
    {
        $brands= Brand::orderBy('created_at', 'desc')->get();
    	return view('brands.all_brands', compact('brands'));
    }

    public function add_brand()
    {
    	return view('brands.add_brand');
    }

    public function save_brand(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|unique:brands',
            'description'  => 'required|min:10|max:30',
        ]);

    	$result= Brand::create($request->all());
    	if ($result) 
    	{
            Session::put('message', 'brand added successfully');
    		return redirect()->back();
    	}
    }

    public function view_brand($id)
    {
        $brand= Brand::findOrFail($id);
        return view('brands.view_brand', compact('brand'));
    }

    public function activate_brand($id)
    {
        $brand= Brand::findOrFail($id);
        $result= $brand->update(['status' => true]);
        if ($result) 
        {
            Session::put('message', 'brand activated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'brand could not be activated');
            return redirect()->back();
        } 
    }

    public function deactivate_brand($id)
    {
        $brand= Brand::findOrFail($id);
        $result= $brand->update(['status' => false]);
        if ($result) 
        {
            Session::put('message', 'brand deactivated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'brand could not be deactivated');
            return redirect()->back();
        } 
    }

    public function edit_brand($id)
    {
        $brand= Brand::findOrFail($id);
        return view('brands.edit_brand', compact('brand'));
    }

    public function update_brand(Request $request)
    {
        $id= $request->id;
        $status= $request->status;
        $brand= Brand::findOrFail($id);
        if (empty($status)) 
        {
        $result= $brand->update([
            'name'        => $request->name, 
            'description' => $request->description,
            'status'      => false,
        ]);
            if ($result) 
            {
                Session::put('message', 'brand updated successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'brand could not be updated');
                return redirect()->back();
            }
        }
        else
        {
            $result= $brand->update($request->all());
            if ($result) 
            {
                Session::put('message', 'brand updated successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'brand could not be updated');
                return redirect()->back();
            }
        }
    }

    public function ask_delete_brand(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $brand= Brand::findOrFail($id);
            return view('brands.ask_delete_brand_modal', compact('brand'));
        }
    }

    public function delete_brand(Request $request)
    {
        $id= $request->id;
        $brand= Brand::findOrFail($id);
        $result= $brand->forceDelete();
        if ($result) 
            {
                Session::put('message', 'brand deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'brand could not be deleted');
                return redirect()->back();
            }
    }
}

