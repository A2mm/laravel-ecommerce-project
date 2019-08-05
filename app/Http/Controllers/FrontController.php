<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;

class FrontController extends Controller
{
    public function shopping_products()
    {
    	$products= Product::paginate(12);
    	return view('front.shopping_products', compact('products'));
    }

    public function shopping_products_by_category($category_id)
    {
        $products= Product::where(['category_id' => $category_id, 'status' => 1])
                          ->orderBy('created_at', 'desc')
                          ->paginate(12);
        $category= Category::where('id', $category_id)->first();
         return view('front.shopping_products_by_category', compact('products', 'category'));
    }

    public function shopping_products_by_brand($brand_id)
    {
        $products= Product::where(['brand_id' => $brand_id, 'status' => 1])->orderBy('created_at', 'desc')->paginate(12);
        $brand= Brand::where('id', $brand_id)->first();
         return view('front.shopping_products_by_brand', compact('products', 'brand'));
    }

    public function view_product_details($id)
    {
    	$product= Product::findOrFail($id);
        $might_also_like_products = Product::where('id', '!=', $id)->inRandomOrder()->take(4)->get();
    	return view('front.view_product_details', compact('product', 'might_also_like_products'));
    }

    public function shopping_products_by_price($min_range, $max_range)
    {
        $products=Product::where('price', '>=', $min_range)
                        ->Where('price', '<=', $max_range)
                        ->where('status', 1)
                        ->orderBy('price', 'asc')
                        ->paginate(12);
        return view('front.shopping_products_by_price', compact('products'));
    } 

    public function shopping_products_by_price_range($over_range)
    {
        $products=Product::where('price', '>=', $over_range)
                        ->where('status', 1)
                        ->orderBy('price', 'asc')
                        ->paginate(12);
        return view('front.shopping_products_by_price_over', compact('products'));
    }
}
