<?php
	echo $this->Form->create('User');
	echo $this->Form->input('email');
	echo $this->form->input('password');
	echo $this->form->end('Login');
?>
