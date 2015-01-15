<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');

class UsersController extends AppController {

	public $components = array(
		'Stripe.Stripe' );	
	
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('login','register','view','passwordReset','join');
  }

//index
    public function index() {
			if($this->Auth->user('role_id') != 0) {
				throw new ForbiddenException("Permission Denied");
			}
			$this->set('users', $this->User->find('all'));
    }

//view
	public function view($url = null) {
				$user = $this->User->findByUrl($url);
				if(empty($user)) {
  	    	throw new NotFoundException(__('Invalid user'));
				}
				switch($user['User']['role_id']) {
					case 1: // Employer
						$this->redirect(array('controller' => 'employers', 'action' => 'view',$url));
						break;
					case 2: // Applicant
						$this->redirect(array('controller' => 'applicants', 'action' => 'view',$url));
						break;
					case 3: // Recruiter
						break;
					default: // All Others
  	    		throw new NotFoundException(__('Invalid user'));
						break;
				}
	}

//register replaces add
	public function register() {
        if ($this->request->is('post')) {
						$this->User->create();
						if ($this->User->save($this->request->data)) {
							$userId = $this->User->getLastInsertId();
							$validUser = true;
							switch($this->request->data['User']['role_id']) { //create usertype in case here
								case 1: //Employer
												$this->User->Employer->create();
												$this->User->Employer->save(array('Employer' => array('user_id' => $userId)));
												break;
								case 2: //Applicant
												$this->User->Applicant->create();
												$this->User->Applicant->save(array('Applicant' => array(
													'user_id' => $userId,
													'first_name' => 'New',
													'last_name' => 'User'
													)));
												break;
								case 3: //Recruiter
												break;
								default://default, other action (if someone tries to hack it)
												$this->delete($userId);
												$validUser = false;
												break;
							}
							if($validUser) {
								$this->Auth->login();
								$this->User->Request->create();
								$this->User->Request->save(array('Request' => array('request_type_id' => 1)));	
								$request_id = $this->User->Request->getInsertId();
								$request = $this->User->Request->findById($request_id);
								$Email = new CakeEmail();
								$Email->to($this->Auth->user('email'));
								$Email->subject('FitIn.Today Email Confirmation');
								$Email->config('gmail');
								$Email->send("Welcome to FitIn.Today! Please confirm your email address by clicking the link below. \n\n ". Router::fullbaseUrl() ."/confirm/". $request['Request']['url']);
								$this->autoRender = false;

								return $this->redirect(array('controller' => 'users', 'action' => 'contact'));
							}
            } else {
	            $this->Session->setFlash(
  	              __('The user could not be saved. Please, try again.')
    	        );
						}
        }
    }

//add is admin created account
    public function add() {
				if($this->Auth->user('role_id') != 0) {
  	    	throw new ForbiddenException(__('Permission Denied'));
				}
        if ($this->request->is('post')) {
						$this->User->create();
						if ($this->User->save($this->request->data)) {
							$userId = $this->User->getLastInsertId();
							$validUser = true;
							switch($this->request->data['User']['role_id']) { //create usertype in case here
								case 1: //Employer
												$this->User->Employer->create();
												$this->User->Employer->save(array('Employer' => array('user_id' => $userId)));
												break;
								case 2: //Applicant
												$this->User->Applicant->create();
												$this->User->Applicant->save(array('Applicant' => array(
													'user_id' => $userId,
													'first_name' => 'New',
													'last_name' => 'User'
													)));
												break;
								case 3: //Recruiter
												break;
								default://default, other action (if someone tries to hack it)
												$this->User->delete($userId);
												$validUser = false;
												break;
							}
							if($validUser) {
		            $this->Session->setFlash(__('User Created'));
							} else {
		            $this->Session->setFlash(__('User Created, but the $validUser was set to false for some reason'));
							}
            } else {
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
						}
        }
    }

//edit
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

//delete
    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

//login
	public function login() {
		if ($this->request->is('post')) {
    		if ($this->Auth->login()) {
            	return $this->redirect($this->Auth->redirect());
	        }
					$this->Session->setFlash(__('Invalid Email or Password. Please try again'),
					'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'));

	    }
	}

//logout
	public function logout() {
		$this->Auth->logout();
		$this->redirect(array("controller" => "pages", "action" => "display","home")); 
	}

//contact - add contact data form after registration
	public function contact() {
		$user_id = $this->Auth->user('id');
		switch($this->Auth->user('role_id')) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", "action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", "action" => "contact", $user_id));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", "action" => "contact", $user_id));
				break;
		}
	}

//dashboard
	//doesn't do much, just redirects to dash depending on user role
	public function dashboard() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", "action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", "action" => "dashboard"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", "action" => "dashboard"));
				break;
		}
	}

//profile
	public function profile() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", "action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", "action" => "profile"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", "action" => "profile"));
				break;
		}
	}

//culture
	public function culture() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", "action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", "action" => "culture"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", "action" => "culture"));
				break;
		}
	}

//search
	public function search() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", "action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", "action" => "search"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", "action" => "search"));
				break;
		}
	}

//settings
	public function settings() {
		if(empty($this->Auth->user())) {
			throw new ForbiddenException('Please Login to access this page');
		}
		$settings = $this->User->findSettings($this->Auth->user('id'));
		$this->set('settings', $settings);
		$this->set('plans', $this->User->UserLevel->findPlans($this->Auth->user('role_id')));
	}

//privacy
	public function privacy() {

	}

	public function passwordReset() {

		if($this->request->is('post')) {
			$user = $this->User->findByEmail($this->request->data['PasswordReset']['email']);
			if(!empty($user)) {
				$this->User->Request->create();
				$this->User->Request->save(array(
					'Request' => array(
						'request_type_id' => 2,
						'user_id' => $user['User']['id'])));	
				$request_id = $this->User->Request->getInsertId();
				$request = $this->User->Request->findById($request_id);
				$Email = new CakeEmail();
				$Email->to($user['User']['email']);
				$Email->subject('FitIn.Today Password Reset');
				$Email->config('gmail');
				$Email->send("Follow the URL below to reset your password. If you did not request a password change, please delete this email. \n\n ". Router::fullbaseUrl() ."/passwordReset/".$request['Request']['url']."");
			}
			$this->Session->setFlash(__('An email with directions to reset your password has been sent'),
				'alert', array( 'plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
	}

	public function join($url = null) {
		$user = $this->User->findIdByUrl($url);
		if(!empty($user)) {
			$this->Session->write('referral',$user['User']['id']);
		}
		$this->redirect(array("controller" => "pages", "action" => "display", "home"));
	}

// the checkout function, that loads the account types and levels and stuff.
	public function checkout() {
		if($this->User->findCustomer($this->Auth->user('id'))) {
			throw new ForbiddenException("You already have a subscription with Fitin.today, Go to your settings to change it");
		}	
		if($this->request->is('post') && $this->Auth->user('id')) {
			$stripe_customer_data = array(
				'stripeToken' => $this->request->data['stripeToken'],
				'email' => $this->request->data['stripeEmail'],
				'description' => 'Test',
				'plan' => $this->request->data['User']['stripePlan']);
			$result = $this->Stripe->customerCreate($stripe_customer_data);
			$this->User->Customer->create();
			if($this->User->Customer->save(array('Customer' => array('customer_id' => $result['stripe_id'])))) {
				//update the user
				if($this->User->updateUserLevel($this->Auth->user('id'),$this->request->data['User']['stripePlan'])) {
					$this->Session->setFlash(__('Your Payment has been received, and your account upgraded. Thank you'),
						'alert', array( 'plugin' => 'BoostCake', 'class' => 'alert-success'));
				}
			}
		} else if($this->Auth->user('id')) {
			$User = $this->Auth->user();
			switch($User['role_id']) {
				case 1: //Employer
					$this->redirect(array("controller" => "employers", "action" => "checkout"));
					break;

				case 2: //Applicant
					$this->redirect(array("controller" => "applicants", "action" => "checkout"));
					break;
			}
		}
	}
	
	public function updateSubscription() {
		if(empty($this->Auth->user())) {
			throw new NotFoundException("User does not exist");
		}

		if($this->request->is('post')) {
			$this->render(false);
			$customer = $this->Stripe->customerRetrieve($this->User->findCustomerId($this->Auth->user('id')));
			$subscription_id = $customer->subscriptions->data[0]->id;
			$subscription = $customer->subscriptions->retrieve($subscription_id);
			$subscription->plan = $this->request->data['User']['stripe_plan'];
			if($subscription->save()) {
				$this->User->updateUserLevel($this->Auth->user('id'), "AppPass");
				$this->Session->setFlash(__('Your account has been upgraded. Thank you'),
					'alert', array( 'plugin' => 'BoostCake', 'class' => 'alert-success'));
				$this->redirect(array("controller" => "users", "action" => "settings"));
			}
		}
	}
}
?>
