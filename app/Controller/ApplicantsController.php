<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {

	public $uses = array('Applicant', 'State', 'PhoneType','Degree','Industry','WorkFunction','Skill','UserCultureAnswer','DataCard','Position');

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

// Add saves new applicant, called from user/register
	public function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

// Dashboard - logged in page
	public function dashboard() {
		$this->set('applicant', $this->Applicant->findDashboard($this->Auth->user('id')));
	}

// Profile - contains profile data for user, logged in page
	public function profile() {
		$this->set('applicant', $this->Applicant->findProfile($this->Auth->user('id')));

		$this->set('degrees', $this->Degree->find('list',array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type'))));

		$this->set('concentrations', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('industries', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('functions', $this->WorkFunction->findAll());

		$this->set('skills', $this->Skill->find('list', array(
			'fields' => array(
				'Skill.id','Skill.skill_type'))));
	}

// Culture - allows user to answer corporate culture questions
	public function culture() {

	}

// Search - search page, applicant gets matched up with open positions based on skills & culture match
	public function search() {
		$applicantCard = $this->Applicant->loadDataCard($this->Auth->user('id'));
		$this->set('applicant', $applicantCard);
		$positions = $this->Position->find('all', array(
			'fields' => array('Position.id','Position.employer_id')));
		$positionCards = array();
		foreach($positions as $position) {
			$positionCard = $this->Position->loadDataCard($position['Position']['id']);
			
			$positionCard['Results'] = $this->DataCard->compare($applicantCard, $positionCard);
			$positionCard['Culture'] = $this->Applicant->User->UserCultureAnswer->compareCulture($this->Auth->user('id'),$position['Position']['employer_id']);
			$positionCards[] = $positionCard;
		}
		$this->set('applicant_card', $applicantCard);
		$this->set('position_cards', $positionCards);
	}

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		$this->Applicant->read(null,$id);
		if(empty($this->Applicant->data)) {
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
		$user = $this->Applicant->User->findByUrl($url);
		if(empty($user)) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('applicant', $this->Applicant->findProfile($user['User']['id']));

		if($this->Auth->loggedIn() && $this->Auth->user('roleId') == 1) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($user['User']['id'],$this->Auth->user('id')));
		}
	}
 }
?>
