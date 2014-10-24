<?php
 App::uses('AppController', 'Controller');

class PhoneNumbersController extends AppController {

	public function add() {
		$this->set('phone_types',$this->PhoneNumber->PhoneType->find('list', array('fields' => array('PhoneType.id','PhoneType.phone_type'))));
		//userid gets added to the request data (in beforesave probably
		//then it is all saved
		if($this->request->is('post')) {
			$this->PhoneNumber->create();
			$this->PhoneNumber->User->id = $this->Auth->user('id');
			if($this->PhoneNumber->save($this->request->data)) {
				$this->Session->setFlash(__('The phone number has been saved'));
			}
			else {
				$this->Session->setFlash(__('The phone number could not be saved, please try again'));
			}
		}
	}

	public function edit() {

	}
 }
?>
