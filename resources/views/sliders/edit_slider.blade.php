@extends('layouts.dashboard1')

@section('content')

<div class="row updating-slider">
<div class="col-md-offset-2 col-md-8">
		
@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h3>{{ Session::get('message') }}</h3>
</div>
<?php Session::put('message', null); ?>
@endif

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="text-center"> <u>Update Slider</u> </h1>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/update/slider" enctype="multipart/form-data">
		{{ csrf_field() }}
		
		<input type="hidden" name="id" value="{{$slider->id}}">

		<div class="form-group">
				<label class="col-md-4 control-label">Slider Name</label>
			    <div class="col-md-8">
				    <input type="text" name="name" class="form-control" value="{{$slider->name}}">
			    </div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Slider Description</label>
			<div class="col-md-8">
				<textarea class="form-control" name="description"> {{$slider->description}} </textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Slider Image</label>
			<div class="col-md-6">
				<input type="file" id="image"  name="image" required value="{{$slider->image}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Slider Status</label>
			<div class="col-md-6">
				<input type="checkbox" name="status" class="checkbox" {{$slider->status == 1 ? 'checked' : ''}}>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<button type="reset" class="btn btn-sm">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary">Update Slider</button>
           </div>
		</div>

	</form>

	</div>
</div>

</div>
</div>

@endsection