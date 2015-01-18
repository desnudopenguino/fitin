<?php
	App::uses('AppController', 'Controller');
	App::uses('CakeEmail','Network/Email');

class ApplicantsController extends AppController {

	public $uses = array('Applicant', 'State', 'PhoneType','Degree','Industry','WorkFunction','Skill','UserCultureAnswer','DataCard','Position','CultureQuestion');

	public function beforeFilter() {
		$this->Auth->allow('view','register');
	}

// Dashboard - logged in page
	public function dashboard() {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('applicant', $this->Applicant->findDashboard($this->Auth->user('id')));
	}

// Profile - contains profile data for user, logged in page
	public function profile() {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('applicant', $this->Applicant->findProfile($this->Auth->user('id')));
		$this->set('degrees', $this->Degree->findAll());
		$this->set('concentrations', $this->Industry->findAll());
		$this->set('industries', $this->Industry->findAll());
		$this->set('functions', $this->WorkFunction->findAll());
		$this->set('skills', $this->Skill->findAll());
	}

// Culture - allows user to answer corporate culture questions
	public function culture() {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->set('match', sizeof($this->UserCultureAnswer->findUserAnswers($this->Auth->user('id'))));
		$this->set('total', sizeof($this->CultureQuestion->findAll()));
	}

// Search - search page, applicant gets matched up with open positions based on skills & culture match
	public function search() {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		if($this->Auth->user('status_id') < 4) {
			throw new ForbiddenException(__('Please confirm your email to access this page'));
		}
		$auth_id = $this->Auth->user('id');
		$applications = $this->Applicant->Application->findApplicantIds($auth_id);
		$applicantCard = $this->Applicant->loadDataCard($auth_id);
		$positions = $this->Position->findAllIds();
		$positionCards = array();
		foreach($positions as $position) {
			$positionCard = $this->Position->loadDataCard($position['Position']['id']);
			$positionCard['Results'] = $this->DataCard->compare($applicantCard, $positionCard);
			$positionCard['Culture'] = $this->Applicant->User->UserCultureAnswer->compareCulture($auth_id,$position['Position']['employer_id']);
			if(in_array($position['Position']['id'], $applications)) {
				$positionCard['Applied'] = true;
			}
			$positionCards[] = $positionCard;
		}
		$positionCards = $this->DataCard->sortByJobMatch($positionCards);
		$this->set('applicant_card', $applicantCard);
		$this->set('position_cards', $positionCards);
	}

// Edit - edit the contact/personal info for the user (address, phone, name)
	public function edit($id = null) {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->Applicant->id = $id;
		if(!$this->Applicant->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());

		$applicant = $this->Applicant->findEdit($id);
		$this->set('applicant', $applicant);

		$this->Applicant->User->Address->read(null,$applicant['User']['Address']['id']);

		$this->Applicant->User->PhoneNumber->read(null,$applicant['User']['PhoneNumber']['id']);
		
		if($this->request->is('post') || $this->request->is('put')) { 
			if($this->Applicant->save($this->request->data['Applicant'])) {
				$this->Applicant->User->Address->save($this->request->data['Address']);
				$this->Applicant->User->PhoneNumber->save($this->request->data['PhoneNumber']);
				$this->redirect(array('controller' => 'applicants', 'action' => 'profile'));
				$this->Session->setFlash(__('The Applicant Information has been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'));
			} else {
				$this->Session->setFlash(__('The Applicant Information has not been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'));
			}
		}
	}

//contact action occurrs after registration/every login after that if the user doesn't have the data filled out
	public function contact($id = null) {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}
		$this->Applicant->id = $id;
		if(!$this->Applicant->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		if($this->Auth->user('id') != $id) {
			throw new ForbiddenException(__('Permission denied'));
		}
		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());

		$this->Applicant->User->Address->create();

		$this->Applicant->User->PhoneNumber->create();
		$this->Applicant->User->id = $id;
		
		if($this->request->is('post') || $this->request->is('put')) { 
			if($this->Applicant->save($this->request->data['Applicant'])) {
				$this->Applicant->User->Address->save($this->request->data['Address']);
				$this->Applicant->User->PhoneNumber->save($this->request->data['PhoneNumber']);
				$user_status_id = $this->Applicant->User->findStatusId($id);
				$this->request->data['User']['status_id'] = $user_status_id['User']['status_id'] + 2;
				if($this->Applicant->User->save($this->request->data['User'])) {
					$this->Applicant->User->read(null, $id);
					$this->Auth->login($this->Applicant->User->data['User']);
					$this->redirect(array('controller' => 'applicants', 'action' => 'dashboard'));
				}
			}
		}
	}

// register will replace contact. user goes here from the splash page if they are registering for applicant
	public function register() {

		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->request->data['User']['role_id'] = 2;
			$this->request->data['User']['status_id'] = 3;
			if($this->Applicant->User->save($this->request->data['User'])) {
				$user_id = $this->Applicant->User->getLastInsertID();
				$this->Auth->login($this->Applicant->User->data['User']);
				$this->Applicant->User->Address->save($this->request->data['Address']);
				$this->Applicant->User->PhoneNumber->save($this->request->data['PhoneNumber']);
				$this->request->data['Applicant']['user_id'] = $user_id;
				if($this->Applicant->save($this->request->data['Applicant'])) {
					$this->Applicant->User->Request->create();
					$this->Applicant->User->Request->save(array('Request' => array('request_type_id' => 1)));	
					$request_id = $this->Applicant->User->Request->getInsertId();
					$request = $this->Applicant->User->Request->findById($request_id);
					$Email = new CakeEmail();
					$Email->to($this->Auth->user('email'));
					$Email->subject('FitIn.Today Email Confirmation');
					$Email->config('gmail');
					$Email->send("Welcome to FitIn.Today! Please confirm your email address by clicking the link below. \n\n ". Router::fullbaseUrl() ."/confirm/". $request['Request']['url']);
					$this->redirect(array('controller' => 'applicants', 'action' => 'dashboard'));
				}
			}
		}
	}

// View - public view of applicant data
	public function view($url = null) {
		$user = $this->Applicant->User->findByUrl($url);
		if(empty($user)) {
			throw new NotFoundException(__('Invalid User'));
		}
		if($user['User']['status_id'] < 4) {
			if($this->Auth->user() && $this->Auth->user('role_id') != 0	) {
					throw new ForbiddenException(__('Invalid User'));
				}
			}
		}
		$this->set('applicant', $this->Applicant->findProfile($user['User']['id']));

		if($this->Auth->loggedIn() && $this->Auth->user('role_id') == 1) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($user['User']['id'],$this->Auth->user('id')));
		}
	}
 }
?>
