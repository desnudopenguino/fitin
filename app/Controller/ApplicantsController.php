<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	public function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	public function dashboard() {
		$this->Applicant->read(null,$this->Auth->user('id'));
		$this->Applicant->checkDisplayName();	//check the display name for the applicant
		$this->set('applicant', $this->Applicant->data);
	}

	public function profile() {
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

	public function culture() {

	}

	public function search() {

	}

	public function edit($id = null) {
		// get the look-up data for the select fields
		$this->set('phone_types',
			$this->Applicant->User->PhoneNumber->PhoneType->find('list', array(
				'fields' => array(
					'PhoneType.id','PhoneType.phone_type'))));

		$this->set('states',
			$this->Applicant->User->Address->State->find('list', array(
				'fields' => array(
					'State.id','State.long_name'))));

		// set the id of the applicant
		$this->Applicant->read(null,$id);

		// read the PhoneNumber for the Applicant
		$phoneNumber = $this->Applicant->User->PhoneNumber->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
debug($phoneNumber);
		$this->Applicant->User->PhoneNumber->read(null,$phoneNumber);

		// read the address for the Applicant
		$address = $this->Applicant->User->Address->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
debug($address);
		$this->Applicant->User->Address->read(null,$address);


		if(!$this->Applicant->exists()) {
			throw new NotFoundException(__('Invalid Applicant'));
		}
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->Applicant->save($this->request->data['User']['Applicant']);
			$this->Applicant->User->PhoneNumber->save($this->request->data['User']['PhoneNumber']);
			$this->Applicant->User->Address->save($this->request->data['User']['Address']);
		}
	}
 }
?>
