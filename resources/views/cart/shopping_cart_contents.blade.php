@extends('layouts.master')

@section('content')

<div class="row customresponsive">
    <div class="col-md-offset-2 col-md-8">
        
@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h5>{{ Session::get('message') }}</h5>
</div>
<?php Session::put('message', null); ?>
@endif

@if($errors->has('qty'))
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5>{{ $error }}</h5>
</div>
@endforeach
@endif


        @if(Cart::count() > 0)

        <div class="cart-page-title text-center"">
        	 <h2 class="cart-section">{{ Cart::count() }} Item(s) In Your Shopping Cart</h2>
             <a type="button" href="/get/shopping/cart/empty" class="btn btn-default empty-cart-button"> Got Cart Empty</a>
        </div>
       

    <table class="table table-responsive table-striped table-bordered cart-table" style="width: 100%; background: white;">
        	<thead>
        		<tr>
        			<th>Image</th>
        			<th>Name</th>
        			<th class="qty-th">Qty</th>
        			<th>Price</th>
        			<th>Total</th>
        			<th>Actions</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($shopping_cart_contents as $product)
        		<tr>
        	<td><img src="{{ asset($product->options->image) }}" width="50" height="30"></</td>
        			<td>{{$product->name}}</td>
        			<td class="qty-td"> 
        				<form class="form-horizontal update-qty-form" method="post" action="/update/shopping/cart">
        					{{ csrf_field() }}
        					        <input type="hidden" name="rowId" value="{{$product->rowId}}">
        					        <input type="text" class="form-control qty-input" name="qty" value="{{$product->qty}}">
                                    <button type="submit" class="btn btn-primary btn-sm qty-update">update</button>
        				</form>
        				</td>
        			<td>{{$product->price}}</td>
        			<td>{{$product->total}}</td>
        			<td>
        <form class="form-horizontal save-later-item-form" method="post" action="/save/item/for/later/{{$product->rowId}}">
        					{{ csrf_field() }}
        					<button type="submit" class="btn btn-xs btn-warning">
        						<i class="fas fa-save"></i> save for later
        					</button>
        </form>
        <form class="form-horizontal remove-item-form" method="post" action="/delete/item/from/cart/{{$product->rowId}}">
        					{{ csrf_field() }}
        					<button type="submit" class="btn btn-xs btn-danger remove-from-cart">
        						<i class="fas fa-trash"></i> reomve
        					</button>
        </form>
        			</td>
        		</tr>
        		@endforeach
        	</tbody>
        	<tfoot>
        		<tr>
        			<th colspan="4">Subtotal Price</th>
        			<th colspan="2"> {{ Cart::subtotal() }} </th>
        		</tr>
        		<tr>
        			<th colspan="4">Tax</th>
        			<th colspan="2"> {{ Cart::tax() }} </th>
        		</tr>
        		<tr>
        			<th colspan="4">Total Price</th>
        			<th colspan="2"> {{Cart::total() }} </th>
        		</tr>
        	</tfoot>
        </table>
        <div class="action-taken">
                <span><a type="button" href="/shop" class="btn btn-default continue-shopping">Continue Shopping</a></span>
                <span class="pull-right"><a type="button" href="/get/checkout" class="btn btn-success">Got Checkout</a></span>
        </div>
        @else
        <div class="no-items-in-cart">
        	<h3>No Items In Your Cart <small><a href="/shop">Shop Products Now</a></small></h3> 
        </div>
        @endif


        @if(Cart::instance('savedForLater')->count() > 0)

        <div class="cart-page-title text-center"">
        	 <h2 class="wishlist-section">{{ Cart::instance('savedForLater')->count() }} Item(s) saved for later</h2>
             <a type="button" href="/get/saved/for/later/empty" class="btn btn-default empty-wishlist-button"> Got saved for later(Wishlist) Empty</a>
        </div>
       

        <table class="table table-responsive table-striped table-bordered cart-table" style="width: 100%; background: white;">
        	<thead>
        		<tr>
        			<th>Image</th>
        			<th>Name</th>
        			<th>Qty</th>
        			<th>Price</th>
        			<th>Total</th>
        			<th>Actions</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach(Cart::instance('savedForLater')->content() as $product)
        		<tr>
        	<td><img src="{{ asset($product->options->image) }}" width="50" height="30"></</td>
        			<td>{{$product->name}}</td>
        			<td>{{$product->qty}}</td>
        			<td>{{$product->price}}</td>
        			<td>{{$product->total}}</td>
        			<td>
        <form class="form-horizontal move-item-form" method="post" action="/move/item/to/cart/{{$product->rowId}}">
        					{{ csrf_field() }}
        					<input type="hidden" name="id" value="{{$product->id}}">
        					<button type="submit" class="btn btn-xs btn-warning">
        						<i class="fas fa-save"></i> move to cart
        					</button>
        				</form>
        <form class="form-horizontal remove-item-form" method="post" 
                                                       action="/delete/item/from/saved/for/later/{{$product->rowId}}">
        					{{ csrf_field() }}
        					<button type="submit" class="btn btn-xs btn-danger remove-from-wishlist">
        						<i class="fas fa-trash"></i> reomve
        					</button>
        				</form>
        			</td>
        		</tr>
        		@endforeach
        	</tbody>
        	<tfoot>
        		<tr>
        			<th colspan="4">Subtotal Price</th>
        			<th colspan="2"> {{ Cart::instance('savedForLater')->subtotal() }} </th>
        		</tr>
        		<tr>
        			<th colspan="4">Tax</th>
        			<th colspan="2"> {{ Cart::instance('savedForLater')->tax() }} </th>
        		</tr>
        		<tr>
        			<th colspan="4">Total Price</th>
        			<th colspan="2"> {{ Cart::instance('savedForLater')->total() }} </th>
        		</tr>
        	</tfoot>
        </table>
        
        @endif
			
@endsection

@section('scripts')
@include('scripts.cart_quantity_up_and_down')

</div>
</div>
@endsection
