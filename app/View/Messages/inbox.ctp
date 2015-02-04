<?php foreach($messages as $message) {
		$this->set('message', $message);
		echo $this->element('Messages/message');
	} ?>
