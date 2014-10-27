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
	<legend>Name</legend>
	<?php echo $this->Form->Input('Applicant.first_name', array(
		'label' => 'First Name')); ?>
	<?php echo $this->Form->Input('Applicant.mi', array(
		'label' => 'Middle Initial')); ?>
	<?php echo $this->Form->Input('Applicant.last_name', array(
		'label' => 'Last Name')); ?>
</fieldset>
<fieldset>
	<legend>Phone Number</legend>
	<?php 
		echo $this->Form->input('PhoneNumber.phone_type_id', array(
			'type' => 'select',
			'label' => 'Phone Type',
			'options' => $phone_types
		));

		echo $this->Form->Input('PhoneNumber.phone_number', array(
			'type' => 'text',
			'label' => 'Phone Number')); 

	?>

</fieldset>
<?php echo $this->Form->end(); ?>
