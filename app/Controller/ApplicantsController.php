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
		$userId = $this->Auth->user('id');
		$this->Applicant->read(null,$userId);
		$this->Applicant->checkDisplayName();
		$this->set('applicant', $this->Applicant->data);
		$this->set('messages', $this->Applicant->User->Message->find('all', array(
			'conditions' => array(
				'Message.receiver_id' => $userId))));

		$this->set('applications', $this->Applicant->Application->find('all', array(
			'conditions' => array(
				'Application.applicant_id' => $userId))));
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

		$this->set('certifications',
			$this->Applicant->Certification->findApplicantAll($userId));

		$this->set('degrees', $this->Degree->find('list',array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type'))));
		$this->set('concentrations', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('educations',
			$this->Applicant->Education->find('all', array(
				'conditions' => array(
					'Education.applicant_id' => $userId))));

		$this->set('projects',
			$this->Applicant->Project->find('all', array(
				'conditions' => array(
					'Project.applicant_id' => $userId))));

		$this->set('industries', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('functions', $this->WorkFunction->find('list', array(
			'fields' => array(
				'WorkFunction.id','WorkFunction.function_type'))));

		$this->set('skills', $this->Skill->find('list', array(
			'fields' => array(
				'Skill.id','Skill.skill_type'))));
	}

// Culture - allows user to answer corporate culture questions
	public function culture() {

	}

// Search - search page, applicant gets matched up with open positions based on skills & culture match
	public function search() {
		$this->set('applicant', $this->Applicant->loadDataCard($this->Auth->user('id')));
		$applicantCard = $this->Applicant->loadDataCard($this->Auth->user('id'));
		$positions = $this->Position->find('all', array(
			'fields' => array('Position.id')));
		$positionCards = array();
		foreach($positions as $position) {
			$positionCard = $this->Position->loadDataCard($position['Position']['id']);
			
			$positionCard['Results'] = $this->DataCard->compare($applicantCard, $positionCard);
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
		$applicant = $this->Applicant->User->findByUrl($url);
		if(empty($applicant)) {
			throw new NotFoundException(__('Invalid User'));
		}

		$state = $this->State->find('first', array(
			'conditions' => array(
				'State.id' => $applicant['Address']['state_id']),
			'fields' => 'State.short_name' 
		));
		$applicant['Address']['state'] = $state['State']['short_name'];
		$this->set('applicant', $applicant);

		$this->set('certifications',
			$this->Applicant->Certification->findApplicantAll($applicant['Applicant']['user_id']));

		$this->set('educations',
			$this->Applicant->Education->find('all', array(
				'conditions' => array(
					'Education.applicant_id' => $applicant['Applicant']['user_id']))));

		$this->set('projects',
			$this->Applicant->Project->find('all', array(
				'conditions' => array(
					'Project.applicant_id' => $applicant['Applicant']['user_id']))));

		if($this->Auth->loggedIn()) {
			$myId = $this->Applicant->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')),
				'fields' => array(
					'User.roleId')));
			$myId = $myId['User']['roleId'];

			if($myId == 1) { //i'm an employer!
				$this->set('culture', $this->UserCultureAnswer->compareCulture($applicant['Applicant']['user_id'],$this->Auth->user('id')));
			}
		}
	}
 }
?>
