<?php
 App::uses('AppController', 'Controller');

class MessagesController extends AppController {

	public function add() {
		if($this->request->is('post')) {
			$this->Message->create();
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
			}
			else {
				$this->Session->setFlash(__('The address could not be saved, please try again'));
			}
		}
	}

//marks message as read in the db
	public function read($id = null) {

	}

//marks message as hidden in the db
	public function hide($id = null) {

	}

//loads all of the messages for a user
	public function inbox() {
		$this->set('messages',$this->Message->find('all', array(
			'condition' => array(
				'Message.receiver_id' => $this->Auth->user('id')))));

	}
 }
?>
