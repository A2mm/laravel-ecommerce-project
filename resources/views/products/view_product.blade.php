@extends('layouts.dashboard1')

@section('content')
<h1 class="text-center"><u><i>Product {{$product->name }}</i></u></h1>
<div class="row view_product_page customresponsive">
	<div class="col-md-4"><img class="img-thumnail view_product_img" src="{{ asset($product->image) }}"></div>
	
	<div class="col-md-offset-1 col-md-7 view_product_row">
		
		<div class="row">
			<div class="col-md-2"><b>ID</b></div>
			<div class="col-md-4"><span>{{ $product->id }}</span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Name</b></div>
			<div class="col-md-4"><span>{{ $product->name }}</span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Category</b></div>
			<div class="col-md-4"><span>{{ $product->category->name }} </span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Brand</b></div>
			<div class="col-md-4"><span>{{ $product->brand->name }} </span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Description</b></div>
			<div class="col-md-4"><span> {{ $product->description }} </span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Price</b></div>
			<div class="col-md-4"><span> {{ $product->price }} L.E </span></div>
		</div>

		<div class="row">
			<div class="col-md-2"><b>Status</b></div>
			<div class="col-md-4">
				@if($product->status == 0)
				<a type="button" class="btn btn-warning" style="font-size: 10px;">unactive</a>
				@else
				<a type="button" class="btn btn-success" style="font-size: 10px;">active</a>
				@endif
			</div>
		</div>
	
	</div>
</div>
		
@endsection