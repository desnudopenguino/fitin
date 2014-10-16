<?php
echo $this->Form->create('User',
								array('action' => 'register', 'method' => 'post'));
	echo $this->Form->input('User.email');
	echo $this->form->input('User.password');
	echo $this->Form->input('roleId', array(
		'options' => array('1' => 'Employer','2' => 'Applicant'),
		'label' => "Role"
		));
	echo $this->form->end('Login');
?>

