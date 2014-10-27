<?php 
	echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	)); ?>
<fieldset>
	<legend>Contact Info</legend>
	<?php echo $this->Form->Input('Applicant.first_name', array(
		'label' => 'First Name')); ?>
	<?php echo $this->Form->Input('Applicant.last_name', array(
		'label' => 'Last Name')); ?>
</fieldset>
<?php echo $this->Form->end(); ?>


