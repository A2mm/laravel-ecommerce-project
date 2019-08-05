<script type="text/javascript">

	$(document).ready(function()
	{
		$('.delete-brand').on('click', function(event)
			{
				event.preventDefault();
				var id= $(this).attr('id');
				
				$.ajax({
					url: '{{ route("ask.delete.brand") }}',
					type: 'GET',
					data: { 'id': id },
					success: function(data)
					{
					     $('.modal-title').html('deleting brand data');
						 $('.modal-body').html(data);
						 $('#myModal').modal('show');	
					}
				});
			});
	});
</script>