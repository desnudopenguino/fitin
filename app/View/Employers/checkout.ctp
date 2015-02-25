<div class="row">
	<div class="col-md-4 well">
		<h2 class="muted">Passive</h2>
		<p>As a Passive Employer you'll gain access to the following:</p>
		<ul>
			<li>Culture match app vetting tool</li>
			<li>Free App Tracking System</li>
			<li>Search our pool of Premium Applicants</li>
		</ul>
		<p>This subscription level is popular among start-ups and small businesses.</p>
		<hr>
		<h3>Free Forever</h3>
		<hr>
		<p><button type="button" class="btn btn-primary" disabled="disabled">Free</button></p>
	</div>
	<div class="col-md-4 col-md-offset-1 well">
		<h2 class="muted">Nonprofit</h2>
		<p>Nonprofits can request a donation of services equivalent to a Premium level subscription:</p>
		<ul>
			<li>Everything from the Passive Subscription</li>
			<li>Search all Applicants on FitIn.Today</li>
			<li>Custom URL for your listings and profile</li>
			<li>Use FitIn.Today as your Careers page</li>
			<li>Gain job visibility from all Applicants</li>
		</ul>
		<p>Please send us an email to Info@FitIn.Today and we will process your request.</p>
		<hr>
		<h3>Free</h3>
		<hr>
		<?php echo $this->Html->link('Contact Us', 'mailto:info@fitin.today', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-4 well">
		<h2 class="muted">Premium</h2>
		<p>As a Premium Employer you'll also gain access to:</p>
		<ul>
			<li>Everything from the Passive Subscription</li>
			<li>Search all Applicants on FitIn.Today</li>
			<li>Custom URL for your listings and profile</li>
			<li>Use FitIn.Today as your Careers page</li>
			<li>Gain job visibility from all Applicants</li>
		</ul>
		<p>This level is good for companies with a single geographic location and a cohesive company culture.</p>
		<hr>
		<h3>$3,000/Year</h3>
		<hr>
		<?php echo $this->Form->create('User', array(
			'controller' => 'users', 'action' => 'checkout'));
			echo $this->Form->input('stripePlan', array(
				'type' => 'hidden',
				'value' => 'EmpPrem'));
			$this->Form->unlockField('stripeToken');
			$this->Form->unlockField('stripeTokenType');
			$this->Form->unlockField('stripeEmail'); ?>
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="pk_live_H5vIuAzhdJWRIFYTXpSCOAVN"
			data-name="Premium Membership"
			data-label="Subscribe"
			data-description="Premium Membership ($3,000.00/Yr)"
			data-email="<?php echo $email; ?>"
			data-amount="300000">
		</script>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="col-md-4 col-md-offset-1 well">
		<h2 class="muted">Enterprise</h2>
		<p>Enterprise Employers gain additional access to:</p>
		<ul>
			<li>Everything from all other Sub levels</li>
			<li>Enable the creation of 20 Premium ‘department’ accounts</li>
		</ul>
		<p>This level is good for enterprise agencies with a multiple geographic locations or disparate corporate culture between departments or locations.</p>
		<hr>
		<h3>$10,000/Year</h3>
		<hr>
		<?php echo $this->Form->create('User', array(
			'controller' => 'users', 'action' => 'checkout'));
			echo $this->Form->input('stripePlan', array(
				'type' => 'hidden',
				'value' => 'EmpEnt'));
			$this->Form->unlockField('stripeToken');
			$this->Form->unlockField('stripeTokenType');
			$this->Form->unlockField('stripeEmail'); ?>
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="pk_live_H5vIuAzhdJWRIFYTXpSCOAVN"
			data-name="Enterprise Membership"
			data-label="Subscribe"
			data-description="Enterprise Membership ($10,000.00/Yr)"
			data-email="<?php echo $email; ?>"
			data-amount="1000000">
		</script>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
