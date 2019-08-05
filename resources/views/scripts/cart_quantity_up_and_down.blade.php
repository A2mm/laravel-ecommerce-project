<script type="text/javascript">

	$(document).ready(function()
	{
		$('.increase-qty').on('click', function()
			{
				var qty= $('.qty-input').val();
				var new_val= Number(qty) + Number(1);
				// alert(new_val);
				$('.qty-input').val(new_val);
			});

		$('.decrease-qty').on('click', function(event)
			{
				var qty= $('.qty-input').val();
				var new_val=  Number(qty) - Number(1);
				$('.qty-input').val(new_val);
			});

		$('.update-qty-button').on('click', function()
			{
			    $('.update-qty-form').submit();	
			});
	});
</script>