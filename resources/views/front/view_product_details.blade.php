@extends('layouts.master')

@section('content')
	
	<div class="row customresponsive">
	<div class="col-md-offset-2 col-md-8">

@if(Session::has('message'))

<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h5>{{ Session::get('message') }}</h5>
</div>
<?php Session::put('message', null); ?>
@endif

@if($errors->has('qty'))
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5>{{ $error }}</h5>
</div>
@endforeach
@endif

</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-8"><img class="img-thumnail view-product-img" src="{{ asset($product->image) }}"></div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>ID</b></div>
	<div class="col-md-6">{{$product->id}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Name</b></div>
	<div class="col-md-6">{{$product->name}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Category</b></div>
	<div class="col-md-6">{{$product->category->name}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Brand</b></div>
	<div class="col-md-6">{{$product->brand->name}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Description</b></div>
	<div class="col-md-6">{{$product->description}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Status</b></div>
	<div class="col-md-6">
		@if($product->status == 0)
			<span>unactive</span>
		@else
		    <span>in stock</span>
		@endif
	</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Price</b></div>
	<div class="col-md-6">{{$product->price}}</div>
</div>

<div class="row customresponsive">
	<div class="col-md-offset-4 col-md-2"><b>Quantity</b></div>
	<div class="col-md-6">
		<form class="form-horizontal" method="post" action="/add/to/cart">
					{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$product->id}}">
			<div class="form-group">
				<input type="text" class="form-control view-page-qty-input" name="qty" value="1">
			</div> 
		    <div class="form-group view-page-qty-submit">
			    <button type="submit" class="btn btn-success">
			    	<i class="fa fa-shopping-cart"></i> Add to cart
			    </button>
			</div>
		</form>
	</div>
</div>


<div class="container">
<div class="row customresponsive might-also-like-products-row">
<h3>You might also like....</h3>
	@foreach($might_also_like_products as $product)
    <div class="col-xs-12 col-sm-3">
        <div class="product-area">
            <div class="text-center">
                <img src="{{ asset($product->image) }}" width="80" height="100" alt="" />
                <h2>{{$product->price}} </h2>
                <p>{{substr($product->description, 0, 15) }}</p>
                <a href="/view/product/details/{{$product->id}}" class="btn btn-xs btn-info">
                    <i class="fa fa-eye"></i> details
                </a>
            </div>
        </div>
    </div>

@endforeach

</div>
@endsection

