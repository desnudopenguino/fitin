<?php
echo $this->Form->create('User',
				array('action' => 'login', 'method' => 'post'));
	echo $this->Form->input('User.email');
	echo $this->form->input('User.password');
	echo $this->form->end('Login');
?>
