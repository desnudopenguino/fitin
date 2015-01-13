<?php echo $this->Html->script("https://js.stripe.com/v2/", array('inline' => false)); ?>
<?php echo $this->Html->script("stripe.js", array('inline' => false)); ?>
<?php echo $this->Form->create('User', array(
	'controller' => 'users', 'action' => 'checkout')); ?>
  <span class="payment-errors"></span>
	<?php echo $this->Form->input('Stripe.token', array(
		'type' => 'hidden',
		'id' => 'stripeToken')); ?>
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
