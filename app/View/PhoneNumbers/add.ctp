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
	<?php echo $this->Form->input('phone_type_id', array(
		'type' => 'select',
		'label' => 'Phone Type',
		'options' => $phone_types
		));
	echo $this->Form->input('phone_number', array(
		'type' => 'text'));
	echo $this->Form->submit('Submit', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
