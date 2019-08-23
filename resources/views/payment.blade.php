<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
	<style>

		
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
	</style>
</head>
<body>
	<h2>Make your payment</h2>
	<form method="post" id="payment-form">
		<input type="hidden" name="payment_method" value="" id="payment-method">
		{{ csrf_field() }}
	</form>
	  <div class="form-row">
	    <input id="card-holder-name" type="text">
	    <label for="card-element">
	      Credit or debit card
	    </label>

	    <div id="card-element">
	      <!-- A Stripe Element will be inserted here. -->
	    </div>

	    <!-- Used to display form errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button id="card-button" data-secret="{{ $intent->client_secret }}">
	    Update Payment Method
	</button>
	
	<script src="https://js.stripe.com/v3/"></script>
	<script>
		// Create a Stripe client.
		var stripe = Stripe('pk_test_7kjPDG4d1KioR6BHlnMm08uF003TLUrHnI');

		const elements = stripe.elements();
	    const cardElement = elements.create('card');

	    cardElement.mount('#card-element');

		// Create an instance of Elements.

		const cardHolderName = document.getElementById('card-holder-name');
		const cardButton = document.getElementById('card-button');
		const form = document.getElementById('payment-form')
		const clientSecret = cardButton.dataset.secret;

		cardButton.addEventListener('click', async (e) => {
		    const { setupIntent, error } = await stripe.handleCardSetup(
		        clientSecret, cardElement, {
		            payment_method_data: {
		                billing_details: { name: cardHolderName.value }
		            }
		        }
		    );

		    if (error) {
		    	console.log(error)
		    	return false
		    	//alert('error')
		        // Display "error.message" to the user...
		    } else {
		    	console.log(setupIntent)
		    	document.getElementById('payment-method').value = setupIntent.payment_method
		    	document.getElementById('payment-form').submit()

		    	/*stripe.createPaymentMethod('card', cardElement, {
				  billing_details: {
				    name: cardHolderName.value,
				  },
				}).then(function(result) {
					console.log(result.error)
					console.log(result.paymentMethod)
				  // Handle result.error or result.paymentMethod
				});*/

		    	return false;
		    	//alert('success')
		        // The card has been verified successfully...
		    }
		});
		
	</script>
</body>
</html>