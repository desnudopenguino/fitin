<div class="row">
	<div class="col-md-3 well">
		<h2 class="muted">Passive</h2>
		<p><span class="label">Free</span></p>
		<ul>
			<li>Free access</li>
			<li>Access to paid Employer listings</li>
		</ul>
		<p>Text About Passive Applicant</p>
		<hr>
		<h3>Free Forever</h3>
		<hr>
		<p><button type="button" class="btn btn-primary" disabled="disabled">Free</button></p>
	</div>
	<div class="col-md-3 col-md-offset-1 well">
		<h2 class="muted">Monthly Premium</h2>
		<p><span class="label">Budget</span></p>
		<ul>
			<li>Full, Premium access to all Employer listings</li>
		</ul>
		<p>Text about Monthly Premium</p>
		<hr>
		<h3>$5/Month</h3>
		<hr>
		<?php echo $this->Form->create('User', array(
			'controller' => 'users', 'action' => 'checkout'));
			echo $this->Form->input('stripePlan', array(
				'type' => 'hidden',
				'value' => 'AppPremMon'));
			$this->Form->unlockField('stripeToken');
			$this->Form->unlockField('stripeTokenType');
			$this->Form->unlockField('stripeEmail'); ?>
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="pk_live_H5vIuAzhdJWRIFYTXpSCOAVN"
			data-name="Monthly Membership"
			data-label="Subscribe"
			data-description="Monthly Membership ($5.00/Mo)"
			data-email="<?php echo $email; ?>"
			data-amount="500">
		</script>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="col-md-3 col-md-offset-1 well">
		<h2 class="muted">Annual Premium</h2>
		<p><span class="label">Best Deal</span></p>
		<ul>
			<li>Full, Premium access to all Employer listings</li>
		</ul>
		<p>Text about Annual Premium</p>
		<hr>
		<h3>$50/Year</h3>
		<hr>
		<?php echo $this->Form->create('User', array(
			'controller' => 'users', 'action' => 'checkout'));
			echo $this->Form->input('stripePlan', array(
				'type' => 'hidden',
				'value' => 'AppPremYr'));
			$this->Form->unlockField('stripeToken');
			$this->Form->unlockField('stripeTokenType');
			$this->Form->unlockField('stripeEmail'); ?>
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="pk_live_H5vIuAzhdJWRIFYTXpSCOAVN"
			data-name="Annual Membership"
			data-label="Subscribe"
			data-description="Annual Membership ($50.00/Yr)"
			data-email="<?php echo $email; ?>"
			data-amount="5000">
		</script>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
