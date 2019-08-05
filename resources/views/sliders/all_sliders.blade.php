@extends('layouts.dashboard1')

@section('content')

@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h3>{{ Session::get('message') }}</h3>
</div>
<?php Session::put('message', null); ?>
@endif

<h1 class="text-center"><u><i>All sliders</i></u></h1>
<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Description</th>
			<th>Status</th>
			<th colspan="4" style="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		@forelse($sliders as $slider)
		<tr>
			<td>{{$slider->id }}</td>
			<td>{{$slider->name }}</td>
			<td><img src="http://localhost/electroniccomm3/public/{{ $slider->image }}" width="50" height="30"></td>
			<td>{{substr($slider->description, 0, 15) }}...</td>
			<td>
				@if($slider->status == 0)
				<span class="label label-warning">unactive</span>
				@else
				<span class="label label-success">active</span>
				@endif
			</td>
			<td>
				@if($slider->status == 0)
			<a type="button" href="/activate/slider/{{$slider->id}}" class="btn btn-success" style="font-size: 10px;">activate</a>
				@else
			<a type="button" href="/deactivate/slider/{{$slider->id}}" class="btn btn-danger" style="font-size: 10px;">deactivate</a>
				@endif
			</td>
	<td><a type="button" href="/view/slider/{{$slider->id}}" class="btn btn-sm btn-info" style="font-size: 10px;">view</a></td>
	<td><a type="button" href="/edit/slider/{{$slider->id}}" class="btn btn-sm btn-primary" style="font-size: 10px;">edit</a></td>
	<td><a type="button" id="{{$slider->id}}" href="#delete/this/slider" class="btn btn-sm btn-danger delete-slider" style="font-size: 10px;">delete</a></td>
		</tr>
		@empty
		<h2>No data available</h2>
		@endforelse
	</tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<h4 class="modal-title" id="myModalLabel"> </h4> 
				<span class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> </span>

			</div> 
			<div class="modal-body"> </div>  
		</div>
	</div>
</div>

</div>
</div>
</div>
@endsection

@section('scripts')
@include('scripts.dynamic-sliders')
@endsection