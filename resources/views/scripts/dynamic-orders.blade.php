<script type="text/javascript">

	$(document).ready(function()
	{
		$('.delete-order').on('click', function(event)
			{
				event.preventDefault();
				var id= $(this).attr('id');
				
				$.ajax({
					url: '{{ route("ask.delete.order") }}',
					type: 'GET',
					data: { 'id': id },
					success: function(data)
					{
					     $('.modal-title').html('deleting order data');
						 $('.modal-body').html(data);
						 $('#myModal').modal('show');	
					}
				});
			});
	});
</script>