<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use SoftDeletes;
session_start(); 

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function all_categories()
    {
        $categories= Category::orderBy('created_at', 'desc')->get();
    	return view('categories.all_categories', compact('categories'));
    }

    public function add_category()
    {
    	return view('categories.add_category');
    }

    public function save_category(Request $request)
    {        
        $this->validate($request, [
            'name'         => 'required|unique:categories',
            'description'  => 'required|min:10|max:30',
        ]);

    	$result= Category::create($request->all());
    	if ($result) 
    	{
            Session::put('message', 'Category added successfully');
    		return redirect()->back();
    	}
    	return $request->all();
    }

    public function view_category($id)
    {
        $category= Category::findOrFail($id);
        return view('categories.view_category', compact('category'));
    }

    public function activate_category($id)
    {
        $category= Category::findOrFail($id);
        $result= $category->update(['status' => true]);
        if ($result) 
        {
            Session::put('message', 'category activated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'category could not be activated');
            return redirect()->back();
        } 
    }

    public function deactivate_category($id)
    {
        $category= Category::findOrFail($id);
        $result= $category->update(['status' => false]);
        if ($result) 
        {
            Session::put('message', 'category deactivated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'category could not be deactivated');
            return redirect()->back();
        } 
    }

    public function edit_category($id)
    {
        $category= Category::findOrFail($id);
        return view('categories.edit_category', compact('category'));
    }

    public function update_category(Request $request)
    {
        $id= $request->id;
        $status= $request->status;
        $category= Category::findOrFail($id);
        if (empty($status)) 
        {
        $result= $category->update([
            'name'        => $request->name, 
            'description' => $request->description,
            'status'      => false,
        ]);
            if ($result) 
            {
                Session::put('message', 'category updated successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'category could not be updated');
                return redirect()->back();
            }
        }
        else
        {
            $result= $category->update($request->all());
            if ($result) 
            {
                Session::put('message', 'category updated successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'category could not be updated');
                return redirect()->back();
            }
        }
    }

    public function ask_delete_category(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $category= Category::findOrFail($id);
            return view('categories.ask_delete_category_modal', compact('category'));
        }
    }

    public function delete_category(Request $request)
    {
        $id= $request->id;
        $category= Category::findOrFail($id);
        $result= $category->forceDelete();
        if ($result) 
            {
                Session::put('message', 'category deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'category could not be deleted');
                return redirect()->back();
            }
    }
}
