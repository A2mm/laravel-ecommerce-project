@extends('layouts.dashboard')

@section('content')

@if(Session::get('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h3>{{ Session::get('message') }}</h3>
</div>
<?php Session::put('message', null); ?>
@endif

<div class="row">
<div class="col-md-offset-1 col-md-10">

<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="text-center"> <u>Update Customer</u> </h1>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/update/customer">
		{{ csrf_field() }}
		
        <input type="hidden" name="id" value="{{ $customer->id }}">

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<div class="row">
				<div class="col-md-4"><label>Customer Name</label></div>
			    <div class="col-md-6">
				    <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
				    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
			    </div>
		    </div>
		</div>


		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<div class="row">
			    <div class="col-md-4"><label>Customer email</label></div>
			    <div class="col-md-6">
				    <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
				    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
			    </div>
			</div>
		</div>

		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<div class="row">
			    <div class="col-md-4"><label>Customer Password</label></div>
			    <div class="col-md-6">
				    <input type="password" name="password" class="form-control">
				    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
			    </div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
			    <div class="col-md-4"><label>Confirm Password</label></div>
			    <div class="col-md-6">
				    <input type="password" name="password_confirmation" class="form-control">
			    </div>
			</div>
		</div>


		<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
			<div class="row">
			<div class="col-md-4"><label>Customer Mobile</div>
			<div class="col-md-6">
				<input type="string" name="mobile" value="{{ $customer->mobile }}" class="form-control">
				@if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                @endif
			</div>
           </div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-4"></div>
			<div class="col-md-6">
				<button type="reset" class="btn btn-sm">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary">Add Customer</button>
           </div>
           </div>
		</div>

	</form>

	</div>
</div>

</div>
</div>
</div>
@endsection