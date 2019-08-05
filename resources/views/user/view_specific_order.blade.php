@extends('layouts.customer_dashboard')

@section('content')
<div class="row customresponsive">
	<div class="col-md-offset-1 col-md-10">
		
	
<h3 class="text-center order-title">Order <span class="badge specific-order"> {{$order->id}} </span> details 
</h3>

        <table class="table table-bordered orders-table">
			<thead>
				<tr class="row-order">
					<th colspan="5" class="order-id"> Order ID {{ $order->id }} 
						<span class="pull-right created_at_order">date created at : {{$order->created_at}} </span>
					</th>
					<th>Order Total is <span class="badge order-total">{{ $order->order_total }}</span></th>
				</tr>
			</thead>
			<tbody>
				<tr class="product-details">
					<td>Prod id</td>
					<td>Prod name</td>
					<td>Prod image</td>
					<td>Prod price</td>
					<td>Prod qty</td>
					<td>Prod total</td>
					
				</tr>
				@foreach($order->order_details as $product)
				<tr>
					<td>{{ $product->product_id }}</td>
					<td>{{ $product->product_name }}</td>
					<td><img src="{{ asset($product->product->image)}}" width="60" height="30"></td>
					<td>{{ $product->product->price }}</td>
					<td>{{ $product->product_sales_quantity }}</td>
					<td>{{ $product->product_total }}</td>
					
				</tr>
				@endforeach
				
			</tbody>
		</table>
		

</div>
</div>

@endsection