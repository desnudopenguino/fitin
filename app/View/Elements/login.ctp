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
	echo $this->Form->input('User.email');
	echo $this->form->input('User.password');
	echo $this->form->end('Login');
?>
