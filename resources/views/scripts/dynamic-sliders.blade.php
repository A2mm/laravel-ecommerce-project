<script type="text/javascript">

	$(document).ready(function()
	{
		$('.delete-slider').on('click', function(event)
			{
				event.preventDefault();
				var id= $(this).attr('id');
				
				$.ajax({
					url: '{{ route("ask.delete.slider") }}',
					type: 'GET',
					data: { 'id': id },
					success: function(data)
					{
					     $('.modal-title').html('deleting slider data');
						 $('.modal-body').html(data);
						 $('#myModal').modal('show');	
					}
				});
			});
	});
</script>