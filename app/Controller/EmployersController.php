<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {

	public $uses = array('Employer','State','PhoneType','Industry','WorkFunction','UserCultureAnswer','Applicant','DataCard','Organization');

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

	function add($userArray) {
		$this->Employer->create();
		if ($this->Employer->save($userArray)) {

		}
	}

	function dashboard() {
		$this->set('employer', $this->Employer->findDashboard($this->Auth->user('id')));
	}

	function profile() {
		$this->set('employer', $this->Employer->findProfile($this->Auth->user('id')));

		$this->set('industries', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('functions', $this->WorkFunction->find('list', array(
			'fields' => array(
				'WorkFunction.id','WorkFunction.function_type'))));
	}

	function culture() {

	}

	function search() {
		$this->set('positions', $this->Employer->Position->find('list', array(
			'conditions' => array(
				'Position.employer_id' => $this->Auth->user('id')),
			'fields' => array(
				'Position.id','Position.title'))));
		$position_id = $this->Session->read('position_id');
		if(!empty($position_id)) {

			$positionCard = $this->Employer->Position->loadDataCard($position_id);
		
			$applicants = $this->Applicant->find('all', array(
				'fields' => array('Applicant.user_id')));

			$applicantCards = array();
			foreach($applicants as $applicant) {
				$applicantCard = $this->Applicant->loadDataCard($applicant['Applicant']['user_id']);
				$applicantCard['Results'] = $this->DataCard->compare($applicantCard,$positionCard);
				$applicantCard['Culture'] = $this->Employer->User->UserCultureAnswer->compareCulture($applicant['Applicant']['user_id'],$this->Auth->user('id'));
				$applicantCards[] = $applicantCard;
			}
		
			$this->set('position_card', $positionCard);
			$this->set('applicant_cards', $applicantCards);
		}
	}

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		$this->Employer->read(null,$id);
		if(!$this->Employer->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('phone_types', $this->PhoneType->findAll());

		$this->set('states', $this->State->findAllLongNames());

		$employer = $this->Employer->findEdit($id);
		$this->set('employer', $employer);

		$this->Employer->User->Address->id = $employer['User']['Address']['id'];
		$this->Employer->User->PhoneNumber->id = $employer['User']['PhoneNumber']['id'];


		if($this->request->is('post') || $this->request->is('put')) { 
			$organization = $this->Organization->checkAndCreate($this->request->data,1);
			$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
			$this->Employer->save($this->request->data['Employer']);
			$this->Employer->User->PhoneNumber->save($this->request->data['User']['PhoneNumber']);
			$this->Employer->User->Address->save($this->request->data['User']['Address']);
			$this->Employer->Company->checkAndCreate($organization);
		}
	}

// View - public view of employer data
	public function view($url = null) {
		$user = $this->Employer->User->findByUrl($url);
		if(empty($user)) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('employer', $this->Employer->findProfile($user['User']['id']));
		if($this->Auth->loggedIn() && $this->Auth->user('roleId') == 2) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($this->Auth->user('id'),$user['User']['id']));
		}
	}
}
?>
