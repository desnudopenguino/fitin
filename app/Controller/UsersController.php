<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');

class UsersController extends AppController {

    public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('login','register','view');
    }

//index
    public function index() {
			if($this->Auth->user('role_id') == 0) {
				$this->set('users', $this->User->find('all'));
			} else {
				throw new NotFoundException("Not Found");
			}
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
				if($this->Auth->user['role_id'] != 0) {
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
								$Email = new CakeEmail('gmail');
								$Email->to('atownsend@unluckysandpiper.com');
								$Email->subject('Test Add User to Fitin.Today');
								$Email->send('It worked!');
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
    	    $this->Session->setFlash(__('Invalid email or password, try again'));
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
				$this->redirect(array("controller" => "users", 
					"action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", 
					"action" => "contact", $user_id));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", 
					"action" => "contact", $user_id));
				break;
		}
	}

//dashboard
	//doesn't do much, just redirects to dash depending on user role
	public function dashboard() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", 
					"action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", 
					"action" => "dashboard"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", 
					"action" => "dashboard"));
				break;
		}
	}

//profile
	public function profile() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", 
					"action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", 
					"action" => "profile"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", 
					"action" => "profile"));
				break;
		}
	}

//culture
	public function culture() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", 
					"action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", 
					"action" => "culture"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", 
					"action" => "culture"));
				break;
		}
	}

//search
	public function search() {
		$User = $this->Auth->user();
		switch($User['role_id']) {
			case 0: //Admin
				$this->redirect(array("controller" => "users", 
					"action" => "index"));
				break;

			case 1: //Employer
				$this->redirect(array("controller" => "employers", 
					"action" => "search"));
				break;

			case 2: //Applicant
				$this->redirect(array("controller" => "applicants", 
					"action" => "search"));
				break;
		}
	}

//settings
	public function settings() {

	}

//privacy
	public function privacy() {

	}
}
?>
