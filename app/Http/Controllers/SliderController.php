<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Session;
session_start();

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('admin_login_form', 'store_admin_login_form');
    }

    public function all_sliders()
    {
        $sliders= Slider::orderBy('created_at', 'desc')->get();
    	return view('sliders.all_sliders', compact('sliders'));
    }

    public function add_slider()
    {
    	return view('sliders.add_slider');
    }

    public function save_slider(Request $request)
    {
    	if ($request->hasFile('image')) 
        {
            $file= $request->file('image');
            $image_name= $file->getClientOriginalName();
            $upload_path= $file->move('slidersImages', $image_name);
            if ($upload_path) 
            {
                $result= Slider::create([
                    'name'             => $request->name,
                    'description'      => $request->description,
                    'image'            => $upload_path,
                    'status'           => $request->status,
                ]);

                 if ($result) 
                 {
                    Session::put('message', 'slider added successfully');
                    return redirect()->back();
                 }
            }
            else
            {
                return 'error';
            }
        }
        
    }

    public function view_slider($id)
    {
        $slider= Slider::where('id', $id)->first();
        return view('sliders.view_slider', compact('slider'));
    }

    public function activate_slider($id)
    {
        $slider= Slider::where('id', $id)->first();
        $result= $slider->update(['status' => true]);
        if ($result) 
        {
            Session::put('message', 'slider activated successfully');
           return redirect()->back();
        }
        else
        {
            Session::put('message', 'slider could not be activated');
           return redirect()->back();
        } 
    }

    public function deactivate_slider($id)
    {
        $slider= Slider::where('id', $id)->first();
        $result= $slider->update(['status' => false]);
        if ($result) 
        {
            Session::put('message', 'slider deactivated successfully');
            return redirect()->back();
        }
        else
        {
            Session::put('message', 'slider could not be deactivated');
            return redirect()->back();
        } 
    }

    public function edit_slider($id)
    {
        $slider= Slider::where('id', $id)->first();
        return view('sliders.edit_slider', compact('slider'));
    }

    public function update_slider(Request $request)
    {
        $id= $request->id;
        $slider= Slider::where('id', $id)->first();

        if ($request->hasFile('image')) 
        {
            $file= $request->file('image');
            $image_name= $file->getClientOriginalName();
            $upload_path= $file->move('slidersImages', $image_name);
            if ($upload_path) 
            {
                $result= $slider->update([
                    'name'             => $request->name,
                    'description'      => $request->description,
                    'image'            => $upload_path,
                    'status'           => $request->status,
                ]);

                 if ($result) 
                 {
                    Session::put('message', 'slider updated successfully');
                    return redirect()->back();
                 }
            }
            else
            {
                return 'error';
            }
        }
        
    }

    public function ask_delete_slider(Request $request)
    {
        if ($request->ajax()) 
        {
            $id= $request->get('id');
            $slider= Slider::where('id', $id)->first();
            return view('sliders.ask_delete_slider_modal', compact('slider'));
        }
    }

    public function delete_slider(Request $request)
    {
        $id= $request->id;
        $slider= Slider::where('id', $id)->first();
        $result= $slider->forceDelete();
        if ($result) 
            {
                Session::put('message', 'slider deleted successfully');
                return redirect()->back();
            }
            else 
            {
                Session::put('message', 'slider could not be deleted');
                return redirect()->back();
            }
    }
}

