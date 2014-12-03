<?php foreach($messages as $message) {
		$this->set('message', $message);
		$this->element('Messages/message');
	} ?>
