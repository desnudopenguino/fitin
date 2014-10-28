<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {

// Add saves new applicant, called from user/register
	public function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

// Dashboard - logged in page
	public function dashboard() {
		$this->Applicant->read(null,$this->Auth->user('id'));
		$this->Applicant->checkDisplayName();	//check the display name for the applicant
		$this->set('applicant', $this->Applicant->data);
	}

// Profile - contains profile data for user, logged in page
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

// Culture - allows user to answer corporate culture questions
	public function culture() {

	}

// Search - search page, applicant gets matched up with open positions based on skills & culture match
	public function search() {

	}

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		$this->set('phone_types',
			$this->Applicant->User->PhoneNumber->PhoneType->find('list', array(
				'fields' => array(
					'PhoneType.id','PhoneType.phone_type'))));

		$this->set('states',
			$this->Applicant->User->Address->State->find('list', array(
				'fields' => array(
					'State.id','State.long_name'))));

		$this->Applicant->read(null,$id);
		$this->set('applicant', $this->Applicant->data['Applicant']);

		$phoneNumber = $this->Applicant->User->PhoneNumber->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
		$this->Applicant->User->PhoneNumber->read(null,$phoneNumber['PhoneNumber']['id']);
		$this->set('phone_number',$this->Applicant->User->PhoneNumber->data['PhoneNumber']);

		$address = $this->Applicant->User->Address->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
		$this->Applicant->User->Address->read(null,$address['Address']['id']);
		$this->set('address',$this->Applicant->User->Address->data['Address']);

		if(!$this->Applicant->exists()) {
			throw new NotFoundException(__('Invalid Applicant'));
		}
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->Applicant->save($this->request->data['User']['Applicant']);
			$this->Applicant->User->PhoneNumber->save($this->request->data['User']['PhoneNumber']);
			$this->Applicant->User->Address->save($this->request->data['User']['Address']);
		}
	}

// View - publice view of applicant data
	public function view($url = null) {
		$applicant = $this->Applicant->User->findByUrl($url);
		$this->Applicant->id = $applicant['Applicant']['user_id'];
		if(empty($applicant)) {
			throw new NotFoundException(__('Invalid User'));
		}
		debug($applicant);
//		$this->Applicant->User->Address->State->find('all');
		debug($this->Applicant->User->Address->States->data);
		$this->set('applicant', $applicant);
	}
 }
?>
