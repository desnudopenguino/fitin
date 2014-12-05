<?php foreach($messages as $message) {
		$this->set('message', $message);
		if($message['Message']['sender_id'] == AuthComponent::user('id')) {
			echo $this->element('Messages/sent');
		} else {
			echo $this->element('Messages/message');
		}
	} ?>
