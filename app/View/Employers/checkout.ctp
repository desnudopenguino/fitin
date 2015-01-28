<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="container">
<div class="row">
<div class="col-md-2 well">
<h2 class="muted">Passive</h2>
<p><span class="label">Free</span></p>
<ul>
<li>Free access</li>
<li>Access to paid Employer listings</li>
</ul>
<p>Passive Applicant</p>
<hr>
<h3>Free Forever</h3>
<hr>
<p><button type="button" class="btn btn-primary" disabled="disabled">Free</button></p>
</div>
<div class="col-md-2 col-md-offset-1 well">
<h2 class="muted">Premium</h2>
<p><span class="label">Budget</span></p>
<ul>
<li>Full, Premium access to all Employer listings</li>
<li>Custom URL for your account and job postings</li>
</ul>
<p>Premium Employer</p>
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
<div class="col-md-2 col-md-offset-1 well">
<h2 class="muted">Enterprise</h2>
<p><span class="label">Best Deal</span></p>
<ul>
<li>Full, Premium access to all Employer listings</li>
<li>Up to 20 department accounts included</li>
</ul>
<p>Enterprise Employer</p>
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
<div class="col-md-2 col-md-offset-1 well">
<h2 class="muted">Nonprofit</h2>
<p><span class="label">Best Deal</span></p>
<ul>
<li>Free Premium access to all Employer listings</li>
</ul>
<p>Nonprofit</p>
<hr>
<h3>Free</h3>
<hr>
<?php echo $this->Html->link('Contact Us', 'mailto:info@fitin.today', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
</div>
</div>
</div>
</div>
</div>
