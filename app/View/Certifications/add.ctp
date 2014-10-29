<?php 
	echo $this->Form->create('Certification',array(
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
	<legend>Add Certification</legend>
	<?php 
	echo $this->Form->input('certification_name', array(
		'type' => 'text',
		'label' => 'Name'));
	echo $this->Form->input('organization', array(
		'type' => 'text'));
	echo $this->Form->input('earned_date', array(
		'type' => 'text'));
	echo $this->Form->input('expiration_date', array(
		'type' => 'text'));
	echo $this->Form->submit('submit', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
