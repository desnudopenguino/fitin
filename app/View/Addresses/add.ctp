<?php 
	echo $this->Form->create('Address',array(
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
	<legend>Add Address</legend>
	<?php 
	echo $this->Form->input('street', array(
		'type' => 'text'));
	echo $this->Form->input('city', array(
		'type' => 'text'));

	echo $this->Form->input('state', array(
		'type' => 'select',
		'label' => 'State',
		'options' => $states
		));
	echo $this->Form->input('zip', array(
		'type' => 'text'));
	echo $this->Form->submit('Submit', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
