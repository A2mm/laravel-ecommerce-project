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

<h1 class="text-center"><u><i>All Brands <span class="badge brands-count">{{$brands->count()}}</span></i></u></h1>
<table class="table table-striped table-bordered" style="font-size: 12px;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Status</th>
			<th colspan="4" style="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		@forelse($brands as $brand)
		<tr>
			<td>{{$brand->id }}</td>
			<td>{{$brand->name }}</td>
			<td>{{$brand->description }}</td>
			<td>
				@if($brand->status == 0)
				<a type="button" class="btn btn-warning" style="font-size: 10px;">unactive</a>
				@else
				<a type="button" class="btn btn-success" style="font-size: 10px;">active</a>
				@endif
			</td>
			<td>
				@if($brand->status == 0)
				<a type="button" href="/activate/brand/{{$brand->id}}" class="btn btn-success" style="font-size: 10px;">activate</a>
				@else
				<a type="button" href="/deactivate/brand/{{$brand->id}}" class="btn btn-danger" style="font-size: 10px;">deactivate</a>
				@endif
			</td>
		<td><a type="button" href="/view/brand/{{$brand->id}}" class="btn btn-sm btn-info" style="font-size: 10px;">view</a></td>
		<td><a type="button" href="/edit/brand/{{$brand->id}}" class="btn btn-sm btn-primary" style="font-size: 10px;">edit</a></td>
		<td><a type="button" id="{{$brand->id}}" href="#delete/this/brand" class="btn btn-sm btn-danger delete-brand" style="font-size: 10px;">delete</a></td>
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
				<h4 class="modal-title" id="myModalLabel"> </h4> 
				<span class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> </span>

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
@include('scripts.dynamic-brands')
@endsection