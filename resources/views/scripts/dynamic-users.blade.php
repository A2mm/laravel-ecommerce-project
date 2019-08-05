<script type="text/javascript">

	$(document).ready(function()
	{
		$('.delete-customer').on('click', function(event)
			{
				event.preventDefault();
				var id= $(this).attr('id');
				
				$.ajax({
					url: '{{ route("ask.delete.customer") }}',
					type: 'GET',
					data: { 'id': id },
					success: function(data)
					{
					     $('.modal-title').html('deleting customer data');
						 $('.modal-body').html(data);
						 $('#myModal').modal('show');	
					}
				});
			});
	});
</script>