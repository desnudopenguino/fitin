<?php
	App::uses('AppController', 'Controller');
	App::uses('CakeEmail','Network/Email');

class EmployersController extends AppController {

	public $uses = array('Employer','State','PhoneType','Industry','WorkFunction','UserCultureAnswer','Applicant','DataCard','Organization','CultureQuestion','Degree');

	public function beforeFilter() {
		$this->Auth->allow('view','register');
	}

//add action occurrs after registration/every login after that if the user doesn't have the data filled out.
	public function contact($id = null) {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->Employer->id = $id;
		if(!$this->Employer->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		if($this->Auth->user('id') != $id) {
			throw new ForbiddenException(__('Permission denied'));
		}
		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());

		$this->Employer->User->Address->create();

		$this->Employer->User->PhoneNumber->create();
		$this->Employer->User->id = $id;
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$organization = $this->Organization->checkAndCreate($this->request->data,1);
			$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
			if($this->Employer->save($this->request->data['Employer'])) {
				$this->Employer->User->Address->save($this->request->data['Address']);
				$this->Employer->User->PhoneNumber->save($this->request->data['PhoneNumber']);
				$user_status_id = $this->Employer->User->findStatusId($id);
				$this->request->data['User']['status_id'] = $user_status_id['User']['status_id'] + 2;
				if($this->Employer->User->save($this->request->data['User'])) {
					$this->Employer->User->read(null, $id);
					$this->Auth->login($this->Employer->User->data['User']);
					$this->redirect(array('controller' => 'employers', 'action' => 'dashboard'));
				}
			}
		}
	}

	public function register() {

		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->request->data['User']['role_id'] = 1;
			$this->request->data['User']['status_id'] = 3;
			if($this->Employer->User->save($this->request->data['User'])) {
//create the organization
				$organization = $this->Organization->checkAndCreate($this->request->data,1);
				$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
//get the id of the user just created then login the user
				$user_id = $this->Employer->User->getLastInsertID();
				$this->Auth->login($this->Employer->User->data['User']);
//save the contact info
				$this->Employer->User->Address->save($this->request->data['Address']);
				$this->Employer->User->PhoneNumber->save($this->request->data['PhoneNumber']);
				$this->request->data['Employer']['user_id'] = $user_id;
//save the employer
				if($this->Employer->save($this->request->data['Employer'])) {
//check/create the company
				$this->Employer->Company->checkAndCreate($organization);
//create email validation request
					$this->Employer->User->Request->create();
					$this->Employer->User->Request->save(array('Request' => array('request_type_id' => 1)));	
					$request_id = $this->Employer->User->Request->getInsertId();
					$request = $this->Employer->User->Request->findById($request_id);
//send email validation email
					$Email = new CakeEmail();
					$Email->to($this->Auth->user('email'));
					$Email->subject('FitIn.Today Email Confirmation');
					$Email->config('gmail');
					$Email->send("Welcome to FitIn.Today! Please confirm your email address by clicking the link below. \n\n ". Router::fullbaseUrl() ."/confirm/". $request['Request']['url']);
					$this->redirect(array('controller' => 'employers', 'action' => 'dashboard'));
				}
			}
		}
	}

	function dashboard() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('employer', $this->Employer->findDashboard($this->Auth->user('id')));
	}

	function profile() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('employer', $this->Employer->findProfile($this->Auth->user('id')));

		$this->set('industries', $this->Industry->find('list', array(
			'fields' => array(
				'Industry.id','Industry.industry_type'))));

		$this->set('functions', $this->WorkFunction->find('list', array(
			'fields' => array(
				'WorkFunction.id','WorkFunction.function_type'))));
	
		$this->set('degrees', $this->Degree->findAll());
	}

	function culture() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('match', sizeof($this->UserCultureAnswer->findUserAnswers($this->Auth->user('id'))));
		$this->set('total', sizeof($this->CultureQuestion->findAll()));
	}

	function search() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		if($this->Auth->user('status_id') < 4) {
			throw new ForbiddenException('Please confirm your email to access this page: <a href="/confirm">Email Confirmation</a>');
		}
		$this->set('positions', $this->Employer->Position->find('list', array(
			'conditions' => array(
				'Position.employer_id' => $this->Auth->user('id')),
			'fields' => array(
				'Position.id','Position.title'))));
		$position_id = $this->Session->read('position_id');
		if(!empty($position_id)) {

			$positionCard = $this->Employer->Position->loadDataCard($position_id);
			$applicants = $this->Applicant->findAllIds();

			$applicantCards = array();
			foreach($applicants as $applicant) {
				$applicantCard = $this->Applicant->loadDataCard($applicant['Applicant']['user_id']);
				$applicantCard['Results'] = $this->DataCard->compare($applicantCard,$positionCard);
				$applicantCard['Culture'] = $this->Employer->User->UserCultureAnswer->compareCulture($applicant['Applicant']['user_id'],$this->Auth->user('id'));
				$applicantCards[] = $applicantCard;
			}
			$applicantCards = $this->DataCard->sortByJobMatch($applicantCards);	
			$this->set('position_card', $positionCard);
			$this->set('applicant_cards', $applicantCards);
		}
	}

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
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
			if($this->Employer->save($this->request->data['Employer'])) {
				$this->Employer->User->PhoneNumber->save($this->request->data['User']['PhoneNumber']);
				$this->Employer->User->Address->save($this->request->data['User']['Address']);
				$this->Employer->Company->checkAndCreate($organization);
				$this->redirect(array('controller' => 'employers', 'action' => 'profile'));
				$this->Session->setFlash(__('The Employer Information has been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'));
			} else {
				$this->Session->setFlash(__('The Employer Information has not been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'));
	
			}
		}
	}

// View - public view of employer data
	public function view($url = null) {
		$user = $this->Employer->User->findByUrl($url);
		if(empty($user)) {
			throw new NotFoundException(__('Invalid User'));
		}
		if($user['status_id'] < 4) {
			throw new ForbiddenException(__('Invalid User'));
		}
		$this->set('employer', $this->Employer->findProfile($user['User']['id']));
		$this->set('degrees', $this->Degree->findAll());
		if($this->Auth->loggedIn() && $this->Auth->user('role_id') == 2) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($this->Auth->user('id'),$user['User']['id']));
		}
	}
}
?>
