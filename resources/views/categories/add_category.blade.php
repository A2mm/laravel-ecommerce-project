@extends('layouts.dashboard1')

@section('content')

<div class="row add-category">
<div class="col-md-offset-1 col-md-8">

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

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="text-center"> <u>Add Category</u> </h1>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/save/category">
		{{ csrf_field() }}

		<div class="form-group{{$errors->has('name') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Category Name</label>
			    <div class="col-md-8">
				    <input type="text" name="name" class="form-control">
				    @if($errors->has('name'))
				    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('description') ? 'error' : ''}}">
			    <label class="col-md-4 control-label">Category Description</label>
			    <div class="col-md-8">
				    <textarea name="description" class="form-control"></textarea>
				    @if($errors->has('description'))
				    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('status') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Category Status</label>
			<div class="col-md-8">
				<input type="checkbox" name="status" class="checkbox">
				@if($errors->has('status'))
				    <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
				@endif
			</div>
		</div>


		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<button type="reset" class="btn btn-sm">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary">Add Category</button>
           </div>
        </div>
	</form>

	</div>
</div>

</div>
</div>
@endsection