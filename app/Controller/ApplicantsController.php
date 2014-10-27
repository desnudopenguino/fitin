<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
		$this->Applicant->read(null,$this->Auth->user('id'));
		$this->Applicant->checkDisplayName();	//check the display name for the applicant
		$this->set('applicant', $this->Applicant->data);
	}

	function profile() {
		$userId = $this->Auth->user('id');
		$this->Applicant->read(null, $userId);
		$this->Applicant->checkDisplayName();	

		$this->set('applicant', 
			$this->Applicant->data);

		$this->set('address',
			$this->Applicant->User->Address->find('first', array(
				'conditions' => array(
					'Address.user_id' => $userId))));

		$this->set('phone',
			$this->Applicant->User->PhoneNumber->find('first', array(
				'conditions' => array(
					'PhoneNumber.user_id' => $userId))));

	}

	function culture() {

	}

	function search() {

	}

	function edit($id = null) {
		$this->Applicant->id = $id;
		if(!$this->Applicant->exists()) {
			throw new NotFoundException(__('Invalid Applicant'));
		}
		if($this->request->is('post') || $this->request->is('put')) { 
debug($this->request->data);
		{
	}
 }
?>
