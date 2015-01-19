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
               // and re-submit
               form.get(0).submit();
       }
};
