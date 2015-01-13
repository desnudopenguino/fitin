<?php echo $this->Html->script("https://checkout.stripe.com/checkout.js", array('inline' => false)); ?>
<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
  $('#UserCheckoutForm').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
</script>
<?php echo $this->Form->create('User', array(
	'controller' => 'users', 'action' => 'checkout')); ?>
  <span class="payment-errors"></span>

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input type="text" size="20" data-stripe="number"/>
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-stripe="cvc"/>
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YYYY)</span>
      <input type="text" size="2" data-stripe="exp-month"/>
    </label>
    <span> / </span>
    <input type="text" size="4" data-stripe="exp-year"/>
  </div>

  <button type="submit">Submit Payment</button>
<?php echo $this->Form->end(); ?>
