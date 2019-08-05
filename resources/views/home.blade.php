@extends('layouts.master')

@section('content')

@if($sliders->count() > 0)
        
    <div class="carousel slide" id="carouselslider" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $count=0; ?>
            @foreach($sliders as $slider)   
            @if($count == 0)
            <li data-slide-to="0" data-target="#carouselslider" class="active" ></li>
            @else
            <li data-slide-to="{{$count}}" data-target="#carouselslider"></li>
            @endif  
            <?php $count++; ?>
            @endforeach 
        </ol>
        <div class="carousel-inner">
            <div class="slider-overlay"></div>
            <?php $item=0; ?>
            @foreach($sliders as $slider)   
            @if($item == 0)
            <div class="item active">
                <img src="{{ asset($slider->image) }}">
                <div class="carousel-caption">
                    {{ $slider->description }}
                </div>
            </div>
            @else
            <div class="item">
                <img src="{{ asset($slider->image) }}">
                <div class="carousel-caption">
                    {{ $slider->description }}
                </div>
            </div>
            @endif  
            <?php $item++; ?>
            @endforeach 
        </div>
    </div>

    @else
<h3 class="text-center">!! No sliders available you can add some by admin dashboard > <a href="/admin/login">admin login</a></h3>
    @endif




@if($products->count() > 0)

<h1 class="text-center">Online Store</h1>

<div class="row home-page-row">

@foreach($products as $product)
<div class="col-md-3 col-sm-4">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="text-center product-name">{{ $product->name }}</h4>
        </div>
        <div class="panel-body text-center">
            
    <img class="product-image" src="{{ asset($product->image) }}">
            
            <h1 class="product-price">{{ $product->price }}</h1>
            <div class="product-description">
                {{ substr($product->description, 0, 10) }} ...
            </div>
            <div>In stock: <span class="product-availability"> {{ $product->availability }} </span></div>
            <div class="product-brand">Brand: 
                <a href="/shopping/products/by/brand/{{$product->brand->id}}">{{ $product->brand->name }} </a>
            </div>
            <div class="product-category">Category:
                <a href="/shopping/products/by/category/{{$product->category->id}}"> {{ $product->category->name }} </a>
            </div>
            <div class="info-button"> 
            <a href="/view/product/details/{{$product->id}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> 
            View details</a> 
            </div>
            <div class="adding-options">
            <a href="/view/product/details/{{$product->id}}" class="btn btn-xs btn-success">
                <i class="fas fa-shopping-cart"></i> Cart</a>
            <a href="/add/item/in/wishlist/{{$product->id}}" class="btn btn-xs btn-warning">
                <i class="fas fa-briefcase"></i> Wishlist</a>
            </div>
        </div>
    </div>
</div>
@endforeach

</div>

@else
<h3 class="text-center">!! No products available add some by admin dashboard > <a href="/admin/login">admin login</a></h3>
@endif

@endsection


