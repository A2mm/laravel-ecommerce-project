@extends('layouts.dashboard1')

@section('content')
<h1 class="text-center"><u><i>Brand {{$brand->name }}</i></u></h1>

		<div class="view_brand_row">
	

		<div class="row customresponsive">
			<div class="col-md-2"><b>ID</b></div>
			<div class="col-md-4"><span>{{ $brand->id }}</span></div>
		</div>

		<div class="row customresponsive">
			<div class="col-md-2"><b>Name</b></div>
			<div class="col-md-4"><span>{{ $brand->name }}</span></div>
		</div>

		<div class="row customresponsive">
			<div class="col-md-2"><b>Description</b></div>
			<div class="col-md-4"><span> {{ $brand->description }} </span></div>
		</div>

		<div class="row customresponsive">
			<div class="col-md-2"><b>Status</b></div>
			<div class="col-md-4">
				@if($brand->status == 0)
				<a type="button" class="btn btn-warning" style="font-size: 10px;">unactive</a>
				@else
				<a type="button" class="btn btn-success" style="font-size: 10px;">active</a>
				@endif
			</div>
		</div>

		</div>
@endsection