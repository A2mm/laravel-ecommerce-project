@extends('layouts.dashboard')

@section('content')
<h1 class="text-center"><u><i>Order id {{$order->id}}</i></u></h1>
<div class="row">
	<div class="col-md-6"> <h2 class="customer-details"> Customer Details </h2> 
	          	<table class="table table-bordered">
	          		<thead>
	          			<tr>
	          				<th>Customer name</th>
	          		        <th>Mobile</th>
	          		    </tr>
	          		</thead>
	          		<tbody>
	          			<tr>
	          				<td>{{$order->customer->name}}</td>
	          				<td>{{$order->customer->mobile}}</td>
	          			</tr>
	          		</tbody>
	          	</table>
	</div>

    <div class="col-md-6"> <h2 class="shipping-details"> Shipping Details </h2> 
    	<table class="table table-bordered">
	          		<thead>
	          			<tr>
	          				<th>user name</th>
	          				<th>Address</th>
	          		        <th>Mobile</th>
	          		        <th>Email</th>
	          		    </tr>
	          		</thead>
	          		<tbody>
	          			<tr>
	          				<td>{{$order->shipping->first_name}}</td>
	          				<td>{{$order->shipping->address}}</td>
	          				<td>{{$order->shipping->mobile}}</td>
	          				<td>{{$order->shipping->email}}</td>
	          			</tr>
	          		</tbody>
	    </table>
</div>
</div>

<hr>
<h2 class="order-details"> Order Details</h2>
		<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product sales qty</th>
			<th>Product sub total</th>
		</tr>
	</thead>
	<tbody>
		@foreach($order_details as $orderdetail)
		<tr>
			<td>{{$orderdetail->order_id }}</td>
			<td>{{$orderdetail->product_name }}</td>
			<td>{{$orderdetail->product_price }}</td>
			<td>{{$orderdetail->product_sales_quantity }}</td>
			<td>{{$orderdetail->product_price * $orderdetail->product_sales_quantity }}</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<th colspan="4">Order total price</th>
		<th>{{$orderdetail->order->order_total}}</th>
	</tfoot>
</table>
		
@endsection