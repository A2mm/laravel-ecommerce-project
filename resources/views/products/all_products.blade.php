@extends('layouts.dashboard1')

@section('content')

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

<h1 class="text-center"><u><i>All Products <span class="badge products-count">{{$products->count()}}</span></i></u></h1>
<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Brand</th>
			<th>Description</th>
			<th>Price</th>
			<th>Image</th>
			<th>Status</th>
			<th colspan="4" style="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		@forelse($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td>{{ $product->name }}</td>
			<td>{{ $product->category->name }} </td>
			<td>{{ $product->brand->name }}
			</td>
			<td>{{ substr($product->description, 0, 15) }}</td>
			<td>{{ $product->price }}</td>
			<td><img src="{{ asset($product->image) }}" width="50" height="30"></td>
			<td>
				@if($product->status == 0)
				<a type="button" class="btn btn-warning" style="font-size: 10px;">unactive</a>
				@else
				<a type="button" class="btn btn-success" style="font-size: 10px;">active</a>
				@endif
			</td>
			<td>
				@if($product->status == 0)
				<a type="button" href="/activate/product/{{$product->id}}" class="btn btn-success" style="font-size: 10px;">activate</a>
				@else
				<a type="button" href="/deactivate/product/{{$product->id}}" class="btn btn-danger" style="font-size: 10px;">deactivate</a>
				@endif
			</td>
		<td><a type="button" href="/view/product/{{$product->id}}" class="btn btn-sm btn-info" style="font-size: 10px;">view</a></td>
		<td><a type="button" href="/edit/product/{{$product->id}}" class="btn btn-sm btn-primary" style="font-size: 10px;">edit</a></td>
		<td><a type="button" href="#delete/this/product" id="{{$product->id}}" class="btn btn-sm btn-danger delete-product" style="font-size: 10px;">delete</a></td>
		</tr>
		@empty
		<h2>No data available</h2>
		@endforelse
	</tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				 
			<span class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> </span>
				<h4 class="modal-title" id="myModalLabel"> </h4>
			</div> 
			<div class="modal-body"> </div>  
		</div>
	</div>
</div>

</div>
</div>
</div>
@endsection

@section('scripts')
@include('scripts.dynamic-products')
@endsection