@extends('layouts.customer_dashboard')

@section('content')
<div class="row customresponsive">
	<div class="col-md-offset-2 col-md-8">
		
<div class="row view_customer_page">
<div class="col-md-offset-2 col-md-4">
	<img class="img-circle profile-img" src="{{ asset('images/one.jpg') }}">
</div>
</div>
	
		
		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>ID</b></div>
			<div class="col-md-4"><span>{{ $user->id }}</span></div>
		</div>

		<div class="row  profile-details">
			<div class="col-md-offset-2 col-md-2"><b>Name</b></div>
			<div class="col-md-4"><span>{{ $user->name }}</span></div>
		</div>

		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>Email</b></div>
			<div class="col-md-4"><span>{{ $user->email }} </span></div>
		</div>

		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>Phone</b></div>
			<div class="col-md-4"><span>{{ $user->phone }} </span></div>
		</div>

		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>Address</b></div>
			<div class="col-md-4"><span>{{ $user->address }} </span></div>
		</div>

		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>City</b></div>
			<div class="col-md-4"><span>{{ $user->city }} </span></div>
		</div>

		<div class="row profile-details">
			<div class="col-md-offset-2 col-md-2"><b>Country</b></div>
			<div class="col-md-4"><span>{{ $user->country }} </span></div>
		</div>

		

	
	</div>
</div>

		
@endsection