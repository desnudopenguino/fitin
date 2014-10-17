<?php
echo $this->Form->create('User');
	echo $this->Form->input('User.email');
	echo $this->form->input('User.password');
	echo $this->form->end('Login');
?>
