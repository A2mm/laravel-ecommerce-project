@extends('layouts.master')

@section('content')

<div class="row customresponsive">
	<div class="col-md-offset-2 col-md-8">
		
		@if(Session::get('success_payment'))
		  
		  <h1 class="text-center"> Thanks for order </h1> 
		  <div class="text-center">
		  	<a href="/" type="button" class="btn btn-info">Back home</a>
		  </div>
          

		@endif

	</div>
</div>
        
@endsection

