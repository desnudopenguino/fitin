<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php echo $this->Form->create('User', array(
						'controller' => 'users', 'action' => 'checkout')); ?>
					<?php $this->Form->unlockField('stripeToken'); 
						$this->Form->unlockField('stripeTokenType'); 
						$this->Form->unlockField('stripeEmail'); ?>
				  <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_ZYzY9psrj6Nnf0eOWJUh4tZ8"
				    data-name="Demo Site"
				    data-description="2 widgets ($20.00)"
				    data-amount="2000">
				  </script>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<?php echo $this->Form->create('User', array(
						'controller' => 'users', 'action' => 'checkout')); ?>
					<?php $this->Form->unlockField('stripeToken'); 
						$this->Form->unlockField('stripeTokenType'); 
						$this->Form->unlockField('stripeEmail'); ?>
				  <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_ZYzY9psrj6Nnf0eOWJUh4tZ8"
				    data-name="Demo Site"
				    data-description="2 widgets ($20.00)"
				    data-amount="2000">
				  </script>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<?php echo $this->Form->create('User', array(
						'controller' => 'users', 'action' => 'checkout')); ?>
					<?php $this->Form->unlockField('stripeToken'); 
						$this->Form->unlockField('stripeTokenType'); 
						$this->Form->unlockField('stripeEmail'); ?>
				  <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_ZYzY9psrj6Nnf0eOWJUh4tZ8"
				    data-name="Demo Site"
				    data-description="2 widgets ($20.00)"
				    data-amount="2000">
				  </script>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
