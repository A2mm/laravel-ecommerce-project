@extends('layouts.customer_dashboard')

@section('content')
<div class="row customresponsive">
	<div class="col-md-offset-1 col-md-10">
		@if(Session::get('message'))
			<script type="text/javascript">
			            swal({
			                title:'Hello',
			                text: '<?php echo Session::get("message"); ?>',
			                icon: 'success',
			                button: 'yes'

			            });
			</script>
        <?php Session::put('message', null); ?>
        @endif
	
<h3 class="text-center order-title">Your orders' list contains 
	<span class="badge orders-count"> {{count($orders)}} </span> order(s)
</h3>

@forelse($orders as $order)
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
			<tfoot>
				<tr>
					<th class="order-foot" colspan="3">Actions</th>
					<th class="order-foot" colspan="3">
						<a type="button" class="btn btn-xs btn-info" href="/view/order/{{$order->id}}">view</a>
						<a type="button" class="btn btn-xs btn-danger delete-order" id="{{$order->id}}" href="/#view/order/{{$order->id}}">delete</a>
					</th>
				</tr>
			</tfoot>
		</table>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
				<div class="modal-dialog"> 
					<div class="modal-content"> 
						<div class="modal-header"> 
						<span class="pull-right clearfix"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> </span><h4 class="modal-title" id="myModalLabel"> </h4>

						</div> 
						<div class="modal-body"> </div>  
					</div>
				</div>
</div>
@empty
<h1 class="text-center"> no orders yet</h1>

@endforelse
		

</div>
</div>

@endsection

@section('scripts')
@include('scripts.dynamic-orders')
@endsection