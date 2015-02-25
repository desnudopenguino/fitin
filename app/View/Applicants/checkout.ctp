<div class="row">
	<div class="col-md-3 well">
		<h2 class="muted">Passive</h2>
		<p>All users start as Passive applicants, and are granted the following tools and freedoms:</p>
		<ul>
			<li>Culture match tool</li>
			<li>Free, live resume</li>
			<li>One-click applications</li>
			<li>Resume-based job search</li>
		</ul>
		<p>This subscription level is for users looking to passively find a place they Fit In.</p>
		<hr>
		<h3>Free Forever</h3>
		<hr>
		<p><button type="button" class="btn btn-primary" disabled="disabled">Free</button></p>
	</div>
	<div class="col-md-3 col-md-offset-1 well">
		<h2 class="muted">Monthly Premium</h2>
		<p>Applicants actively seeking to find a new position tend to start here:</p>
		<ul>
			<li>Custom URL for linking</li>
			<li>Search all Employer jobs</li>
			<li>Earn referral bonuses And more!</li>
		</ul>
		<p>This subscription level is for anyone looking to find a career they will love. </p>
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
		<p>Applicants serious about their career search opt for Annual:</p>
		<ul>
			<li>All perks from the Monthly Premium sub.</li>
			<li>Save 17% over Monthly.</li>
		</ul>
		<p>This subscription level is for anyone serious about finding a career they will love.</p>
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
