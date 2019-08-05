@extends('layouts.master')

@section('content')
<div class="row customresponsive">
     <div class="col-md-offset-2 col-md-8">
                
@section('extra-css')
<script src="https://js.stripe.com/v3/"></script>
@endsection



        <h1 class="checkout-page-title text-center">Your Checkout</h1> 
        
        <div class="row">
        	<div class="col-sm-5">
        		<div class="order">

        			<h3 class="your-orders"> Your Orders</h3>
        		<table class="table table-hover checkout-table">
        			<thead>
        				<tr class="head">
        					<th>Image</th>
        					<th>Name/price</th>
        					<th>Qty</th>
                                                <th>Total</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach(Cart::content() as $product)
        				<tr class="checkout-products">
        					<td><img src="{{ asset($product->options->image) }}" width="50" height="30"></td>
        					<td>
        						<b>{{$product->name}}</b><br>
        						<span>{{$product->price}}</span>
        					</td>
        					<td class="checkout-qty"><b>{{$product->qty}}</b></td>
                                                <td> <b>{{ $product->total }}</b></td>
        				</tr>
        				@endforeach
        			</tbody>
        			<tfoot class="checkout-products-foot">
        				<tr>
        					<th colspan="3"><span class="word">Subtotal</span></th>
                                                <th><span class="badge col">{{Cart::subtotal()}}</span></th>
                                        </tr>
                                        <tr>
                                                <th colspan="3"><span class="word">Tax</span></th>
                                                <th><span class="badge col">{{Cart::tax()}}</span></th>
                                        </tr>
                                        <tr>
                                                <th colspan="3"><span class="word">Total</span></th>
                                                <th><span class="badge col">{{Cart::total()}}</span></th>
                                        </tr>
        			</tfoot>
        		</table>
        	</div>
        	</div>
        	<div class="col-sm-7">
        		<div>

        			<h3 class="shipping-details">Shipping Details</h3>

        			<form class="form" id="payment-form" method="post" action="/store/checkout">
        				{{ csrf_field() }}

        				<div class="form-group">
        				<label>Name</label>
        				<input type="text" name="name" class="form-control" id="name" value="{{Auth::user()->name}}">
        				</div>

        				<div class="form-group">
        				<label>E-mail Adress</label>
        				<input type="email" name="email" class="form-control" id="email" value="{{Auth::user()->email}}">
        				</div>

                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{Auth::user()->phone}}">
                        </div>

        				<div class="form-group">
        				<label>Address</label>
        				<input type="text" name="address" class="form-control" id="address" value="{{Auth::user()->address}}">
        				</div>

        				<div class="form-group">
        				<label>City</label>
        				<input type="text" name="city" class="form-control" id="city" value="{{Auth::user()->city}}">
        				</div>

        				<div class="form-group">
        				<label>Country</label>
        				<input type="text" name="country" class="form-control" id="country" value="{{Auth::user()->country}}">
        				</div>

        				<h3 class="payment-details">Payment Details</h3>
        				
                        <div class="form-group">
        				<label>Name on Card</label>
        				<input type="text" name="name-on-card" class="form-control" id="name-on-card">
        				</div>

        				<div class="form-group">
        					<label for="card-element">
						      Credit or debit card
						    </label>
						    <div id="card-element">
						      <!-- A Stripe Element will be inserted here. -->
						    </div>

						    <!-- Used to display form errors. -->
						    <div id="card-errors" role="alert"></div>
						</div>
        				<div class="form-group">
        					<button type="submit" id="pay" class="btn btn-success btn-block">Pay</button>
        				</div>
        				
        			</form>
        		</div>
        	</div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">

	function checkout()
	{
		// Create a Stripe client.
			var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

			// Create an instance of Elements.
			var elements = stripe.elements();

			// Custom styling can be passed to options when creating an Element.
			// (Note that this demo uses a wider set of styles than the guide below.)
			var style = {
			  base: {
			    color: '#32325d',
			    lineHeight: '18px',
			    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			    fontSmoothing: 'antialiased',
			    fontSize: '16px',
			    '::placeholder': {
			      color: '#aab7c4'
			    }
			  },
			  invalid: {
			    color: '#fa755a',
			    iconColor: '#fa755a'
			  }
			};

			// Create an instance of the card Element.
			var card = elements.create('card', {
				style: style,
				hidePostalCode: true
			});

			// Add an instance of the card Element into the `card-element` <div>.
			card.mount('#card-element');

			// Handle real-time validation errors from the card Element.
			card.addEventListener('change', function(event) {
			  var displayError = document.getElementById('card-errors');
			  if (event.error) {
			    displayError.textContent = event.error.message;
			  } else {
			    displayError.textContent = '';
			  }
			});

			// Handle form submission.
			var form = document.getElementById('payment-form');
			form.addEventListener('submit', function(event) {
			  event.preventDefault();

			  var options = {
			  	name: document.getElementById('name-on-card'),
			  	email: document.getElementById('email'),
			  	address: document.getElementById('address'),
			  	city: document.getElementById('city'),
			  	country: document.getElementById('country'),
			  	phone: document.getElementById('phone'),
			  	postal-code : document.getElementById('postal-code'),
			  };

			  stripe.createToken(card, options).then(function(result) {
			    if (result.error) 
			    {
			      // Inform the user if there was an error.
			      var errorElement = document.getElementById('card-errors');
			      errorElement.textContent = result.error.message;
			      document.getElementById('pay').disabled= false;
			    } 
			    else 
			    {
			      // Send the token to your server.
			      stripeTokenHandler(result.token);
			    }
			  });
			});

			// Submit the form with the token ID.
			function stripeTokenHandler(token) 
			{
			  // Insert the token ID into the form so it gets submitted to the server
			  var form = document.getElementById('payment-form');
			  var hiddenInput = document.createElement('input');
			  hiddenInput.setAttribute('type', 'hidden');
			  hiddenInput.setAttribute('name', 'stripeToken');
			  hiddenInput.setAttribute('value', token.id);
			  form.appendChild(hiddenInput);

			  // Submit the form
			  form.submit();
			}
	};

	checkout();

</script>

</div>
</div>
@endsection
