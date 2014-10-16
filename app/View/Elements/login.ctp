<?php
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->input('email',
					array('label' => 'Email')
	);
	echo $this->form->input('password',
					array('label' => 'Password')
	);
?>
