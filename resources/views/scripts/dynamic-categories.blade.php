<script type="text/javascript">

	$(document).ready(function()
	{
		$('.delete-category').on('click', function(event)
			{
				event.preventDefault();
				var id= $(this).attr('id');
				
				$.ajax({
					url: '{{ route("ask.delete.category") }}',
					type: 'GET',
					data: { 'id': id },
					success: function(data)
					{
					     $('.modal-title').html('<h4>deleting category data</h4>');
						 $('.modal-body').html(data);
						 $('#myModal').modal('show');	
					}
				});
			});
	});
</script>