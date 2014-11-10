<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {

	public $uses = array('Employer','State','PhoneType');

	function add($userArray) {
		$this->Employer->create();
		if ($this->Employer->save($userArray)) {

		}
	}

	function dashboard() {
		$this->Employer->read(null,$this->Auth->user('id'));
		$this->set('employer', $this->Employer->data);
	}

	function profile() {
		$userId = $this->Auth->user('id');
		$this->Employer->read(null,$userId);
		$this->set('employer', $this->Employer->data);

		$this->set('address',
			$this->Employer->User->Address->find('first', array(
				'conditions' => array(
					'Address.user_id' => $userId))));

		$this->set('phone',
			$this->Employer->User->PhoneNumber->find('first', array(
				'conditions' => array(
					'PhoneNumber.user_id' => $userId))));


	}

	function culture() {

	}

	function search() {

	}
 }
?>
