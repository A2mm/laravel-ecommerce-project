@extends('layouts.dashboard1')

@section('content')
<div class="row customresponsive">
	<div class="col-md-offset-1 col-md-10">
		
		<div class="text-center view-all-orders">
					<h2>All orders <span class="badge orders-count">  {{ $orders->count() }} </span></h2>
       </div>
@forelse($orders as $order)
        <table class="table table-bordered orders-table">
			<thead>
				<tr class="row-order">
					<th colspan="5" class="order-id"> Order ID {{ $order->id }} <br>
					 belongs to customer <span class="badge"> {{$order->user->name}} </span> 
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
@empty
<h1 class="text-center"> no orders yet</h1>

@endforelse
		

</div>
</div>

@endsection