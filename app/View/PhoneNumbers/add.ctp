<?php 
	echo $this->Form->create('PhoneNumber',array(
		'action' => 'add',
		'method' => 'post',
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	)); ?>
<fieldset>
	<legend>Add Phone Number</legend>
	<?php echo $this->Form->input('select', array(
		'options' => $phone_types
		));
	echo $this->Form->input('phone_number', array(
		'options' => array(
			'label' => "Phone Number"
		)
	)); 
	echo $this->Form->submit('Submit', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
