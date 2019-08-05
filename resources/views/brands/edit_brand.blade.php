@extends('layouts.dashboard1')

@section('content')

<div class="row customresponsive">
<div class="col-md-10 col-md-offset-1">

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

<div class="panel panel-default brand-panel">
	<div class="panel-heading">
		<h1 class="text-center"> <u>Update Brand {{ $brand->name}}</u> </h1>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/update/brand">
		{{ csrf_field() }}

		<input type="hidden" name="id" value="{{$brand->id}}">

		<div class="form-group">
				<label class="col-md-4 control-label">Brand Name</label>
			    <div class="col-md-6">
				    <input type="text" name="name" class="form-control" value="{{$brand->name}}">
			    </div>
		</div>


		<div class="form-group">
			    <label class="col-md-4 control-label">Brand Description</label>
			    <div class="col-md-6">
				    <textarea name="description" class="form-control">{{$brand->description}}</textarea>
			    </div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label checkbox-inline"><b>Brand Status</b></label>
			<div class="col-md-6">
				<input type="checkbox" name="status" class="checkbox" {{$brand->status == 1 ? 'checked' : ''}}>
			</div>
		</div>

		<div class="form-group">
				<div class="col-md-4"></div>
			<div class="col-md-6">
				<button type="reset" class="btn btn-sm">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary">Update Brand</button>
           </div>
		</div>

	</form>

	</div>
    </div>

</div>
</div>

@endsection