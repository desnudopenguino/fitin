<?php
	App::uses('AppController', 'Controller');
	App::uses('CakeEmail','Network/Email');

class EmployersController extends AppController {

	public $uses = array('Employer','State','PhoneType','Industry','WorkFunction','UserCultureAnswer','Applicant','DataCard','Organization','CultureQuestion','Degree','Setting');

	public function beforeFilter() {
		$this->Auth->allow('view','register','under');
	}

	public function under($url = null) {
		//get the company.
		$company = $this->Organization->Company->findByUrl($url);

//if company doesn't exist
		if(empty($company)) {
			throw new NotFoundException(__('Not Found'));
		}

//if company owner account is not Enterprise Employer
		if($company['Employer']['User']['user_level_id'] != 12) {
			throw new NotFoundException(__('Not Found'));
		}

//if # of departments is >= 20
		$departments = $this->Organization->Company->countDepartments($company['Company']['id']);
		if($departments >= 20) {
			throw new ForbiddenException(__('Permission denied'));
		}
		

		$this->set('company_name', $company['Organization']['organization_name']);

		//pass the company name to the form.

		$this->set('phone_types',
			$this->PhoneType->findAll());

		$this->set('states',
			$this->State->findAllLongNames());
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$this->request->data['User']['role_id'] = 1;
			$this->request->data['User']['status_id'] = 3;
			if($this->Employer->User->saveAll($this->request->data, array('validation' => 'only'))) {
				$organization = $this->Organization->checkAndCreate($this->request->data,1);
				unset($this->request->data['Organization']);
				$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
				$employer = $this->request->data['Employer'];
				unset($this->request->data['Employer']);
				$this->Employer->User->saveAll($this->request->data, array('validation' => false));
				$employer['user_id'] = $this->Employer->User->getLastInsertID();
				$this->Employer->save($employer);
				$this->Auth->login();
				$this->Employer->Company->checkAndCreate($organization);
				$this->Employer->User->Request->create();
				$this->Employer->User->Request->save(array('Request' => array('request_type_id' => 1)));	
				$request_id = $this->Employer->User->Request->getInsertId();
				$request = $this->Employer->User->Request->findById($request_id);
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

				$applicant_url = $this->Session->read('applicant_url');
				$this->Session->delete('applicant_url');
				if(!empty($applicant_url)) {
					$this->redirect(array(
						'controller' => 'applicants',
						'action' => 'view', $applicant_url));
				}
				
				$this->redirect(array('controller' => 'employers', 'action' => 'profile'));
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
			if($this->Employer->User->saveAll($this->request->data, array('validation' => 'only'))) {
				$organization = $this->Organization->checkAndCreate($this->request->data,1);
				unset($this->request->data['Organization']);
				$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
				$employer = $this->request->data['Employer'];
				unset($this->request->data['Employer']);
				$this->Employer->User->saveAll($this->request->data, array('validation' => false));
				$employer['user_id'] = $this->Employer->User->getLastInsertID();
				$this->Employer->save($employer);
				$this->Auth->login();
				$this->Employer->Company->checkAndCreate($organization);
				$this->Employer->User->Request->create();
				$this->Employer->User->Request->save(array('Request' => array('request_type_id' => 1)));	
				$request_id = $this->Employer->User->Request->getInsertId();
				$request = $this->Employer->User->Request->findById($request_id);
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

				$applicant_url = $this->Session->read('applicant_url');
				$this->Session->delete('applicant_url');
				if(!empty($applicant_url)) {
					$this->redirect(array(
						'controller' => 'applicants',
						'action' => 'view', $applicant_url));
				}
				
				$this->redirect(array('controller' => 'employers', 'action' => 'profile'));
			}
		}
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

		$this->set('user_id', $id);
		
		if($this->request->is('post') || $this->request->is('put')) { 
			$user_status_id = $this->Employer->User->findStatusId($id);
			$this->request->data['User']['status_id'] = $user_status_id['User']['status_id'] + 2;
			if($this->Employer->User->saveAll($this->request->data, array('validation' => 'only'))) {
				$organization = $this->Organization->checkAndCreate($this->request->data,1);
				unset($this->request->data['Organization']);
				$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
				$employer = $this->request->data['Employer'];
				unset($this->request->data['Employer']);
				$this->Employer->User->saveAll($this->request->data, array('validation' => false));
				$employer['user_id'] = $id;
				$this->Employer->save($employer);
				$this->Employer->User->read(null, $id);
				$this->Auth->login($this->Employer->User->data['User']);
				$this->Employer->Company->checkAndCreate($organization);
				$this->redirect(array('controller' => 'employers', 'action' => 'profile'));
			}
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
		if($this->Auth->user('id') != $id) {
			throw new ForbiddenException(__('Permission denied'));
		}
		$this->set('phone_types', $this->PhoneType->findAll());

		$this->set('states', $this->State->findAllLongNames());

		$employer = $this->Employer->findEdit($id);
		$this->set('employer', $employer);

		if($this->request->is('post') || $this->request->is('put')) { 
			if($this->Employer->User->saveAll($this->request->data, array('validation' => 'only'))) {
				$organization = $this->Organization->checkAndCreate($this->request->data,1);
				$this->request->data['Employer']['organization_id'] = $organization['Organization']['id'];
				unset($this->request->data['Organization']);
				$employer = $this->request->data['Employer'];
				unset($this->request->data['Employer']);
				$this->Employer->User->saveAll($this->request->data, array('validation' => false));
				$employer['user_id'] = $id;
				$this->Employer->save($employer);
				$this->Employer->Company->checkAndCreate($organization);
				$this->redirect(array('controller' => 'employers', 'action' => 'profile'));
			} else {
				$this->Session->setFlash(__('The Employer Information has not been saved'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'));
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
		$employer = $this->Employer->findProfile($this->Auth->user('id'));

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

		$this->set('question', $this->CultureQuestion->findNext($this->Auth->user('id'))); 
	}

	function search() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}
		if($this->Auth->user('status_id') < 4) {
			throw new ForbiddenException('Please confirm your email to access this page.');
		}
		
		$user_id = $this->Auth->user('id');
		$positions = $this->Employer->Position->find('list', array(
			'conditions' => array(
				'Position.employer_id' => $this->Auth->user('id')),
			'fields' => array(
				'Position.id','Position.title')));
			if(empty($positions)) {
				throw new ForbiddenException('You must create a position (on your Profile page) to be able to search applicants.');
			}
			$this->set('positions', $positions);
		
		$position_id = $this->Session->read('position_id');
		if(!empty($position_id)) {

			$positionCard = $this->Employer->Position->loadDataCard($position_id);

			$search = $this->Setting->findSearch($user_id);

			if($this->Auth->user('user_level_id') == 10) {
        $applicants = $this->Applicant->findPremiumIds($user_id, array('distance' => $search['distance'], 'scale' => $search['scale']));
			} else {
        $applicants = $this->Applicant->findAllIds($user_id, array('distance' => $search['distance'], 'scale' => $search['scale']));
			}
		
			$applicantCards = array();
			foreach($applicants as $applicant) {
				$applicantCard = $this->Applicant->loadDataCard($applicant['Applicant']['user_id']);
				$applicantCard['Results'] = $this->DataCard->compare($applicantCard,$positionCard);
				if($applicantCard['Results']['percent'] >= $search['job']) {
					$applicantCard['Culture'] = $this->UserCultureAnswer->compareCulture($applicant['Applicant']['user_id'],$this->Auth->user('id'));
					if($applicantCard['Culture']['Total']['percent'] >= $search['culture']) {
						$applicantCards[] = $applicantCard;
					}
				}
			}
			$applicantCards = $this->DataCard->sortByJobMatch($applicantCards);	
			$this->set('position_card', $positionCard);
			$this->set('applicant_cards', $applicantCards);
			$this->set('settings', $search);
		}
	}

// View - public view of employer data
	public function view($url = null) {
		$user = $this->Employer->User->findByUrl($url);
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

		$employer = $this->Employer->findProfile($user['User']['id']);
		$company_id = $employer['Organization']['Company']['id'];
		if($this->referer() == '/') {
			$this->Session->write('company', $company_id);
		}

		$this->set('employer', $employer);
		$this->set('degrees', $this->Degree->findAll());
		if($this->Auth->loggedIn() && $this->Auth->user('role_id') == 2) {
			$this->set('culture', $this->UserCultureAnswer->compareCulture($this->Auth->user('id'),$user['User']['id']));
		}
	}

	public function checkout() {
		if($this->Auth->user('role_id') != 1) {
			throw new ForbiddenException("Not Allowed");
		}

		if($this->request->is('ajax')) {
			$this->layout = false;
		}
		$this->set('email', $this->Auth->user('email'));
	}
}
?>
