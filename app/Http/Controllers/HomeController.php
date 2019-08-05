<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $sliders= Slider::where('status', 1)->orderBy('created_at', 'asc')->get();
        $products= Product::where('status', 1)->inRandomOrder()->limit(10)->get();
        return view('home', compact('products', 'sliders'));
    }
}
