@extends('layouts.dashboard1')

@section('content')

<h2 class="text-center dashboard-title">Admin Dashboard</h2>

<div class="row home-stats">
	<div class="col-md-3">
		<div class="stat stat-customers">
			Total Customers
			<span>{{ count($users) }}</span>
		</div>
		
	</div>
	<div class="col-md-3">
		<div class="stat stat-products">
			Total Products
			<span>{{ count($products) }}</span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="stat stat-categories">
			Total Categories
			<span>{{ count($categories) }}</span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="stat stat-brands">
			Total Brands
			<span>{{ count($brands) }}</span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="stat stat-sliders">
			Total Sliders
			<span>{{ count($sliders) }}</span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="stat stat-orders">
			Total Orders
			<span>{{ count($orders) }}</span>
		</div>
	</div>
</div>
@endsection