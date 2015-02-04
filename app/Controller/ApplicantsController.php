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
		$company_id = $this->Session->read('company');
		if($company_id != null) {
			$positions = $this->Position->findCompanyIds($company_id);
		} else if($this->Auth->user('user_level_id') == 20) {
			$positions = $this->Position->findAllPremiumIds();
		} else {
			$positions = $this->Position->findAllIds();
		}
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


// register will replace contact. user goes here from the splash page if they are registering for applicant
	public function register() {

		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->request->data['User']['role_id'] = 2;
			$this->request->data['User']['status_id'] = 3;
			if($this->Applicant->User->saveAll($this->request->data, array('validate' => 'only'))) {
				$this->Applicant->User->saveAll($this->request->data, array('validate' => false));
				$user_id = $this->Applicant->User->getLastInsertID();
				$this->Auth->login($this->Applicant->User->data['User']);
				$this->Applicant->User->Request->create();
				$this->Applicant->User->Request->save(array('Request' => array('request_type_id' => 1)));	
				$request_id = $this->Applicant->User->Request->getInsertId();
				$request = $this->Applicant->User->Request->findById($request_id);
				$Email = new CakeEmail();
				$Email->config('gmail');
				$Email->to($this->Auth->user('email'));
				$Email->template('welcome','welcome');
				$Email->emailFormat('html');
				$confirm_url = Router::fullbaseUrl() ."/confirm/". $request['Request']['url'];
				$Email->subject('Welcome To FitIn.Today!');
				$Email->viewVars(array('confirm_email' => $confirm_url));
				$Email->send();
				$this->Session->setFlash(__('Welcome! Please check your email to confirm your address'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'));

				$company = $this->Session->read('company');
				if(!empty($company)) {
					$this->redirect(array(
						'controller' => 'companies',
						'action' => 'view', $company));
				}

				$this->redirect(array('controller' => 'applicants', 'action' => 'dashboard'));
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

		$this->set('user_id', $id);
		if($this->request->is('post') || $this->request->is('put')) { 
			$user_status_id = $this->Applicant->User->findStatusId($id);
			$this->request->data['User']['status_id'] = $user_status_id['User']['status_id'] + 2;
			if($this->Applicant->saveAll($this->request->data, array('validate' => 'only'))) {
				$this->Applicant->User->saveAll($this->request->data, array('validate' => false));
				$this->Applicant->User->read(null,$id);
				$this->Auth->login($this->Applicant->User->data['User']);
				$this->redirect(array('controller' => 'applicants', 'action' => 'dashboard'));
			}
		}
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
		if($this->Auth->user('id') != $id) {
			throw new ForbiddenException(__('Permission denied'));
		}
		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());

		$applicant = $this->Applicant->findEdit($id);
		$this->set('applicant', $applicant);

		if($this->request->is('post') || $this->request->is('put')) { 
			if($this->Applicant->User->saveAll($this->request->data, array('validate' => 'only'))) {
				$this->Applicant->User->saveAll($this->request->data, array('validate' => false));
				$this->redirect(array('controller' => 'applicants', 'action' => 'profile'));
			} else {
				$this->Session->setFlash(__('The Applicant Information has not been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'));
			}
		}
	}

// View - public view of applicant data
	public function view($url = null) {
		$user = $this->Applicant->User->findByUrl($url);
		if(empty($user) && $this->Auth->loggedIn()) {
			throw new NotFoundException(__('Not Found'));
		} else if(empty($user)) {
			$this->set('url',$url);
			echo $this->render('/Elements/redirect');
			exit;
		}
		if($user['User']['id'] == $this->Auth->user('id') && $user['User']['status_id'] < 4 ) {
			throw new ForbiddenException("You must validate your email address before users can view this page");
		} else if($user['User']['status_id'] < 4) {
			throw new ForbiddenException(__('Invalid User'));
		}

		$applicant = $this->Applicant->findProfile($user['User']['id']);

		if($this->referer() == '/' && !$this->Auth->loggedIn()) {
			$this->Session->write('applicant_url', $url);
		}

		$this->set('applicant',$applicant);  

		if($this->Auth->loggedIn() && $this->Auth->user('role_id') == 1) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($user['User']['id'],$this->Auth->user('id')));
		}
	}
// checkout view - shows all the different user levels
	public function checkout() {
		if($this->Auth->user('role_id') != 2) {
			throw new ForbiddenException("Not Allowed");
		}

		$this->set('email', $this->Auth->user('email'));
	}
 }
?>
