@extends('layouts.dashboard1')

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

<div class="panel panel-default product-panel">
	<div class="panel-heading">
		<h1 class="text-center"> <u>update Product {{$product->name}}</u> </h1>
	</div>
	<div class="panel-body">
		
	<form class="form-horizontal" method="post" action="/update/product" enctype="multipart/form-data">
		{{ csrf_field() }}

		<input type="hidden" name="id" value="{{$product->id}}">

		<div class="form-group{{$errors->has('name') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Name</label>
			    <div class="col-md-6">
				    <input type="text" name="name" class="form-control" value="{{$product->name}}">
				    @if($errors->has('name'))
				    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('category_id') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Category</label>
			    <div class="col-md-6">
				    <select class="form-control" name="category_id">
				    	@foreach(App\Category::all() as $category)
				<option value="{{ $category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
				    	@endforeach
				    </select> 
				    @if($errors->has('category_id'))
				    <span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
				    @endif 
			    </div>
		</div>

		<div class="form-group{{$errors->has('brand_id') ? 'error' : ''}}">
				<label class="col-md-4 control-label">Product Brand</label>
			    <div class="col-md-6">
				    <select class="form-control" name="brand_id">
				    	@foreach(App\Brand::all() as $brand)
				    	<option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
				    		{{$brand->name}}</option>
				    	@endforeach
				    </select> 
				    @if($errors->has('brand_id'))
				    <span class="help-block"><strong>{{ $errors->first('brand_id') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('description') ? 'error' : ''}}">
			    <label class="col-md-4 control-label">Product Description</label>
			    <div class="col-md-6">
				    <textarea name="description" class="form-control">{{$product->description}}</textarea>
				    @if($errors->has('description'))
				    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
				    @endif
			    </div>
		</div>

		<div class="form-group{{$errors->has('price') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Price</label>
			<div class="col-md-6">
				<input type="text" name="price" class="form-control" value="{{$product->price}}">
				@if($errors->has('price'))
				    <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('color') ? 'error' : ''}}">
			<label class="col-md-4 control-label">Product Color</label>
			<div class="col-md-6">
				<input type="color" name="color" class="form-control" value="{{$product->color}}">
				@if($errors->has('color'))
				    <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('image') ? 'error' : ''}}">
			<label class="col-md-4 control-label" for="image">Product Image</label>
			<div class="col-md-6">
				<input type="file" id="image"  name="image" value="{{$product->image}}" required>
				@if($errors->has('image'))
				    <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('availability') ? 'error' : ''}}">
			<label class="col-md-4 control-label"><b>Product Availability</b></label>
			<div class="col-md-6">
				<input type="text" name="availability" class="form-control" value="{{$product->availability}}">
				@if($errors->has('status'))
				    <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('status') ? 'error' : ''}}">
			<label class="col-md-4 control-label checkbox-inline"><b>Product Status</b></label>
			<div class="col-md-6">
				<input type="checkbox" name="status" class="checkbox" {{$product->status == 1 ? 'checked' : ''}}>
				@if($errors->has('status'))
				    <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
				@endif
			</div>
		</div>

		<div class="form-group">
				<div class="col-md-4"></div>
			<div class="col-md-6">
				<button type="reset" class="btn btn-sm">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary">Update Product</button>
           </div>
		</div>

	</form>

	</div>
</div>

</div>
</div>

@endsection