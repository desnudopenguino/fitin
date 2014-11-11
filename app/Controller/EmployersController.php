<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {

	public $uses = array('Employer','State','PhoneType');

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

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

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		$this->Employer->read(null,$id);
		if(empty($this->Employer->data)) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('phone_types',
			$this->PhoneType->find('list', array(
				'fields' => array(
					'PhoneType.id','PhoneType.phone_type'))));

		$this->set('states',
			$this->State->find('list', array(
				'fields' => array(
					'State.id','State.long_name'))));

		$this->set('employer', $this->Employer->data['Employer']);

		$phoneNumber = $this->Employer->User->PhoneNumber->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
		$this->Employer->User->PhoneNumber->read(null,$phoneNumber['PhoneNumber']['id']);
		$this->set('phone_number',$this->Employer->User->PhoneNumber->data['PhoneNumber']);

		$address = $this->Employer->User->Address->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')),
			'fields' => 'id'
		));
		$this->Employer->User->Address->read(null,$address['Address']['id']);
		$this->set('address',$this->Employer->User->Address->data['Address']);

		if(!$this->Employer->exists()) {
			throw new NotFoundException(__('Invalid Employer'));
		}
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->Employer->save($this->request->data['User']['Employer']);
			$this->Employer->User->PhoneNumber->save($this->request->data['User']['PhoneNumber']);
			$this->Employer->User->Address->save($this->request->data['User']['Address']);
		}
	}

// View - publice view of employer data
	public function view($url = null) {
		$employer = $this->Employer->User->findByUrl($url);
		if(empty($employer)) {
			throw new NotFoundException(__('Invalid User'));
		}

		$state = $this->State->find('first', array(
			'conditions' => array(
				'State.id' => $employer['Address']['state_id']),
			'fields' => 'State.short_name' ));
		$employer['Address']['state'] = $state['State']['short_name'];
		$this->set('employer', $employer);
	}
}
?>
