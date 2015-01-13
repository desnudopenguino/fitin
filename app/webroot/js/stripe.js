Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');

var stripeResponseHandler = function(status, response) {
	var form = $('#UserCheckoutForm');
	if (response.error) {
		// Show the errors on the form
		form.find('.payment-errors').text(response.error.message);
		form.find('button').prop('disabled', false);
	} else {
		// token contains id, last4, and card type
		var token = response.id;
		// Insert the token into the form so it gets submitted to the server
		$('#stripeToken').val(token);
//		form.append($('<input type="hidden" name="data[Stripe][token]" />').val(token));
		// and re-submit
		form.get(0).submit();
	}
};

jQuery(function($) {
	$('#UserCheckoutForm').submit(function(e) {
console.log('form submit pressed');
		var form = $(this);
		// Disable the submit button to prevent repeated clicks
		form.find('button').prop('disabled', true);
		Stripe.card.createToken(form, stripeResponseHandler);
		// Prevent the form from submitting with the default action
		return false;
	});
}); 
