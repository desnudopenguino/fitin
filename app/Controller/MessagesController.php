<?php
 App::uses('AppController', 'Controller');

class MessagesController extends AppController {

//compose message action
	public function compose() {
		$this->Message->create();
		$this->Message->set($this->request->data);
		$this->set('message', $this->Message->data);
		
		if($this->request->is('post') && !empty($this->request->data['Message']['message'] )) {
			if($this->Message->save($this->request->data)) {
				$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}
		}
	}

//marks message as read in the db
	public function read($id = null) {
		

	}

//marks message as hidden in the db
	public function hide($id = null) {

	}

//loads all of the received messages for a user
	public function inbox() {
		$messages = $this->Message->findReceived($this->Auth->user('id'));
		$this->set('messages',$messages);
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
		if(empty($messages)) {
			$this->render('../Elements/Messages/empty');
		}
	}

//loads all of the sent messages for a user
	public function sent() {
		$this->set('messages', $this->Message->findSent($this->Auth->user('id')));
		$this->set('messages', $this->Message->findSent($this->Auth->user('id')));
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
		if(empty($messages)) {
			$this->render('../Elements/Messages/empty');
		}
	}

//loads the archived messages
	public function archive() {
		$this->set('messages', $this->Message->findArchived($this->Auth->user('id')));
		$this->set('messages', $this->Message->findArchived($this->Auth->user('id')));
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
		if(empty($messages)) {
			$this->render('../Elements/Messages/empty');
		}
	}

//initial messages section load
	public function load() {
		$this->set('messages', $this->Message->findReceived($this->Auth->user('id')));
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
	}
}
?>
