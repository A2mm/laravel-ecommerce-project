@extends('layouts.dashboard1')

@section('content')
<h1 class="text-center"><u><i>slider {{$slider->name }}</i></u></h1>

	<div class="row slider-info">
		<div class="col-md-4">
			<img src="http://localhost/electroniccomm3/public/{{ $slider->image }}">
		</div>
		<div class="col-md-8 img-info">

			<div class="row">
				<div class="col-md-2"><p>Name</p></div>
				<div class="col-md-6"><p>{{ $slider->name }}</p></div>
			</div>

			<div class="row">
				<div class="col-md-2"><p>Description</p></div>
				<div class="col-md-6 img-desc"><p>{{ $slider->description }}</p></div>
			</div>

			<div class="row">
				<div class="col-md-2"><p>Status</p></div>
				<div class="col-md-6">
				<p>@if($slider->status == 0)
					<span class="label label-warning">unactive</span>
				@else
				<span class="label label-success">active</span>
				@endif
			    </p>
		    </div>
			</div>
			
		</div>
						
		</div>		
@endsection