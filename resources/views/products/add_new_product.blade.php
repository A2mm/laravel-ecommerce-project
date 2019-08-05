@extends('layouts.dashboard1')

@section('content')

<div class="row add-product">
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
		<h3 class="text-center"> <u>Add New Product</u> </h3>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/save/product" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group{{$errors->has('name') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Name</label>
			    <div class="col-md-8">
				    <input type="text" name="name" class="form-control">
				    @if($errors->has('name'))
				    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('category_id') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Category</label>
			    <div class="col-md-8">
				    <select class="form-control" name="category_id">
				    	@foreach(App\Category::all() as $category)
				    	<option value="{{ $category->id}}">{{$category->name}}</option>
				    	@endforeach
				    </select>
				    @if($errors->has('category_id'))
				    <span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
				    @endif 
			    </div>
		</div>

		<div class="form-group{{$errors->has('brand_id') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Brand</label>
			    <div class="col-md-8">
				    <select class="form-control" name="brand_id">
				    	@foreach(App\Brand::all() as $brand)
				    	<option value="{{ $brand->id}}">{{$brand->name}}</option>
				    	@endforeach
				    </select> 
				    @if($errors->has('brand_id'))
				    <span class="help-block"><strong>{{ $errors->first('brand_id') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('description') ? 'error' : ''}}">
			    <label class="col-md-4 control-label">Product Description</label>
			    <div class="col-md-8">
				    <textarea name="description" class="form-control"></textarea>
				    @if($errors->has('description'))
				    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('price') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Price</label>
			<div class="col-md-8">
				<input type="text" name="price" class="form-control">
				@if($errors->has('price'))
				    <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('color') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Color</label>
			<div class="col-md-8">
				<input type="color" name="color" class="form-control">
				@if($errors->has('color'))
				    <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('image') ? 'error' : ''}}">
			<label class="col-md-4 control-label" for="image">Product Image</label>
			<div class="col-md-8">
				<input type="file" id="image"  name="image" required>
				@if($errors->has('image'))
				    <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('availability') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Availability</label>
			<div class="col-md-8">
				<input type="text" name="availability" class="form-control">
				@if($errors->has('availability'))
				    <span class="help-block"><strong>{{ $errors->first('availability') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('status') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Status</label>
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
				<button type="submit" class="btn btn-sm btn-primary">Add Product</button>
           </div>
           </div>

	</form>

	</div>
</div>

</div>
</div>
@endsection