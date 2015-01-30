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
		'type' => 'text',
		'label' => 'Title '.$this->Html->image('tooltip.png',array(
			'class' => 'masterTooltip',
			'title' => 'Messaging about a position? Never lose track of which position with the title already prefilled.'))
	));

	echo $this->Form->input('message', array(
		'type' => 'textarea'));
	echo $this->Form->submit('Send', array(
		'div' => 'form-group',
		'class' => 'btn btn-default'));
	/*echo $this->Html->image('tooltip.png',array(
			'class' => 'masterTooltip',
			'title' => 'Keep track of messages on your dashboard page.'));*/
	?>
</fieldset>
<?php echo $this->Form->end(); ?>
