@extends('layouts.dashboard')

@section('content')

@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h3>{{ Session::get('message') }}</h3>
</div>
<?php Session::put('message', null); ?>
@endif

<h1 class="text-center"><u><i>All Orders {{count($orders)}}</i></u></h1>
<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Customer Name</th>
			<th>Order Total</th>
			<th>Status</th>
			<th colspan="4" style="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		@forelse($orders as $order)
		<tr>
			<td>{{$order->id }}</td>
			<td>{{$order->customer->name}}</td>
			<td>{{$order->order_total }}</td>
			<td>
<a type="button" href="#" class="btn btn-xs btn-warning" style="font-size:10px;">{{$order->order_status}}</a></td>
			<td>
				@if($order->order_status == 'pending')
<a type="button" href="/activate/order/{{$order->id}}" class="btn btn-success" style="font-size: 10px;">activate</a>
				@else
<a type="button" href="/deactivate/order/{{$order->id}}" class="btn btn-danger" style="font-size: 10px;">deactivate</a>
				@endif
			</td>
	<td>
		<a type="button" href="/view/order/{{$order->id}}" class="btn btn-sm btn-info" style="font-size: 10px;">
	    <i class="fas fa-eye"></i> view</a>
	</td>
	<td>
		<a type="button" href="/edit/order/{{$order->id}}" class="btn btn-sm btn-primary" style="font-size: 10px;">
		<i class="fas fa-edit"></i> edit</a></td>
	<td>
		<a type="button" id="{{$order->id}}" href="#delete/this/order" class="btn btn-sm btn-danger delete-order" style="font-size: 10px;"><i class="fas fa-trash"></i> delete</a></td>
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
@include('scripts.dynamic-orders')
@endsection