<!DOCTYPE html>
<html>
<head>
	<title>Payment Method</title>
</head>
<style type="text/css">
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
.container{
	max-width: 1156px;
	width: 80%;
	margin: 0 auto;

}
.btn-strp {
    border: none;
    border-radius: 4px;
    outline: none;
    text-decoration: none;
    color: #fff;
    background: #32325d;
    white-space: nowrap;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    padding: 0 14px;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    cursor: pointer;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.025em;
    text-decoration: none;
    -webkit-transition: all 150ms ease;
    transition: all 150ms ease;
    float: left;
    margin-left: 12px;
    margin-top: 28px;
}
</style>
<body>
	<div class="container">
	<form action="{{ route('subscription.create') }}" method="post" id="payment-form">
	@csrf
	  <div class="form-row">
	    <label for="card-element">
	      Credit or debit card
	    </label>
	    <div id="card-element" style="margin-top: 1em">
	      <!-- A Stripe Element will be inserted here. -->
	    </div>

	    <!-- Used to display form errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button class="btn-strp" type="submit">Submit Payment</button>
	</form>
	</div>
	<script src="https://js.stripe.com/v3/"></script>
</body>
</html>
<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_51HUZCzCqaKkAvHaQhPkoXNjLvM3t51YdJMgaxsrJlfAAUGPw7GBmKlx04bDBKHytROfinvWfIqPmmdkefcLDpETQ00LsBMI9vU');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
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
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
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

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
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
</script>



