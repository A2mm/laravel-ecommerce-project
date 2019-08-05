@extends('layouts.top')

@section('content')


@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Session::get('message') }}</h4>
</div>
<?php Session::put('message', null); ?>
@endif

        <h2 class="title text-center">Your payment {{ Session::get('customer_name') }}</h2> 

        <form class="form-horizontal" method="post" action="/order/place">
        	{{ csrf_field() }}

        	<div class="row">
        		<div class="col-sm-8">
        			<h3><i><u> Select Your Payment Method </u></i></h3>
        			@foreach(App\Payment::all() as $payment)
        			<input type="radio" name="payment_gateway" value="{{$payment->id}}"> <label>{{$payment->payment_method}}</label> <br>
        			@endforeach
        		</div>
        		<div class="col-sm-8">
        			<input type="submit" name="submit" value="Done" class="btn btn-block btn-success"><br>
        		</div>
        	</div>
        </form>
@endsection

@section('scripts')
@endsection
