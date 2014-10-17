<?php
	echo $this->Form->create('User',array(
		'action' => 'login',
		'method' => 'post',
		'class' => 'form-inline',
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => false,
			'wrapInput' => false,
			'class' => 'form-control'
		)
	));
	echo $this->Form->input('User.email', array('placeholder' => 'Email'));
	echo $this->Form->input('User.password', array('placeholder' => 'Password'));
	echo $this->Form->submit('Login', array(
		'div' => 'form-group',
		'class' => 'btn btn-default')
	);
	echo $this->Form->end();
?>
