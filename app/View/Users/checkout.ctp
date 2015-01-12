<?php //echo $this->Form->create('User', array(
	//'controller' => 'users', 'action' => 'checkout')); ?>
<form action="/bucky/users/checkout" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-amount="2000">
  </script>
</form>
<?php //echo $this->Form->end(); ?>
