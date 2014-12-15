<?php
	echo $this->Form->create('User',array(
		'action' => 'login',
		'method' => 'post',
		'class' => 'navbar-form navbar-right',
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => false,
			'wrapInput' => false,
			'class' => 'form-control'
		)
	));
	echo $this->Form->input('User.email', array('placeholder' => 'Email'));
	echo $this->Form->input('User.password', array('placeholder' => 'Password'));
	echo $this->Form->button('<i class="glyphicon glyphicon-log-in"></i> Login', array(
		'div' => 'form-group',
		'type' => 'submit',
		'class' => 'btn btn-default')
	);
	echo $this->Form->end();
?>
