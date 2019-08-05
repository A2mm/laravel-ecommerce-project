@extends('layouts.dashboard1')

@section('content')

@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h3>{{ Session::get('message') }}</h3>
</div>
<?php Session::put('message', null); ?>
@endif

<h1 class="text-center"><u><i>All Customers <span class="badge">{{ count($users)}}</span></i></u></h1>
<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>City</th>
			<th>Country</th>
			<th># orders</th>
			<th colspan="2" style="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		@forelse($users as $customer)
		<tr>
			<td>{{$customer->id }}</td>
			<td>{{$customer->name }}</td>
			<td>{{$customer->email }}</td>
			<td>{{$customer->phone }}</td>
			<td>{{$customer->address }}</td>
			<td>{{$customer->city }}</td>
			<td>{{$customer->country }}</td>
			<td>{{App\Order::where('user_id', $customer->id)->count()}}</td>

	<td><a type="button" href="/view/customer/orders/{{$customer->id}}" class="btn btn-xs btn-info">view orders</a></td>
	<td>
	<a type="button" id="{{$customer->id}}" href="#delete/this/customer" class="btn btn-xs btn-danger delete-customer">delete</a>
	</td>
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
				<span class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; 
				</button> </span>

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
@include('scripts.dynamic-users')
@endsection