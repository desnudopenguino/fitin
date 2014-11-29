<?php 
	echo $this->Form->create('Message',array(
		'action' => 'compose',
		'method' => 'post',
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	)); ?>
<fieldset>
	<legend>Send Message</legend>
	<?php 
	echo $this->Form->input('receiver_id', array(
		'type' => 'hidden'));

	echo $this->Form->input('title', array(
		'type' => 'text'));

	echo $this->Form->input('message', array(
		'type' => 'textarea'));
	echo $this->Form->submit('Send', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
