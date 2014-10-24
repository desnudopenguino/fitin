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
		); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
		
	
		
