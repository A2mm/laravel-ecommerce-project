@extends('layouts.customer_dashboard')

@section('content')

<div class="row customresponsive">
	<div class="col-md-offset-1 col-md-10">
		

<h2 class="text-center dashboard-title">Customer Dashboard</h2>

<div class="orders-card">
	<h2 class="">
		Orders
	</h2>
	<span class="orders-count">
		{{ $user_orders_count->count() }}
	</span>
</div>


</div>
</div>

@endsection