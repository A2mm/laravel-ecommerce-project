@extends('layouts.master')
 
@section('content')
<div class="row">
<div class="col-xs-12 col-sm-12">

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5>{{ Session::get('message') }}</h5>
</div>
<?php Session::put('message', null); ?>
@endif

        <h4 class="text-center shop-page-heading">Now, Shop ( <span class="brand-count"> {{ $products->total() }} ) </span> </h4>
</div>
</div>

<div class="row">
@foreach($products as $product)
    <div class="col-xs-12 col-sm-4">
        <div class="product-area">
            <div class="text-center">
                <img src="http://localhost/electroniccomm2/public/{{ $product->image }}" width="100" height="100" alt="" />
                <h2>{{$product->name}} </h2>
                <h3>{{$product->price}} </h3>
                <p>{{ substr($product->description, 0, 15) }}</p>
                <a href="/view/product/details/{{$product->id}}" class="btn btn-xs btn-success cart-button">
                    <i class="fa fa-shopping-cart"></i> cart
                </a>
                <a href="/add/item/in/wishlist/{{$product->id}}" class="btn btn-xs btn-warning cart-button">
                    <i class="fa fa-save"></i> wishlist
                </a>
                <a href="/view/product/details/{{$product->id}}" class="btn btn-xs btn-info details-button">
                    <i class="fa fa-eye"></i>  details
                </a>
            </div>
        </div>
    </div>

@endforeach
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 page-links">
        {{ $products->links() }}
    </div>
</div>

@endsection