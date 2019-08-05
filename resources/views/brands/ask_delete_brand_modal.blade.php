<h4>Are you sure you wann delete this item ?</h4>
<form class="form-horizontal" method="post" action="/delete/brand">
	{{ csrf_field() }}
	
	<input type="hidden" name="id" value="{{$brand->id}}">
	<button type="reset" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
	<button type="sumbit" class="btn btn-sm btn-danger">Delete</button>	
</form>