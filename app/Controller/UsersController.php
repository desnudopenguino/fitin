<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('login','register','view');
    }

//index
    public function index() {
			if($this->Auth->user('roleId') == 0) {
        $this->User->recursive = 0;
				$this->set('users', $this->paginate());
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
				switch($user['User']['roleId']) {
					case 1: // Employer
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
							switch($this->request->data['User']['roleId']) { //create usertype in case here
								case 1: //Employer
												$this->User->Employer->save();
//												App::import('Controller', 'Employers');
//												$Employer = new EmployersController;
//												$Employer->constructClasses();
//												$employerData = array('Employer'=> array(
//																'userId' => $userId));
//												$Employer->add($employerData);
												break;
								case 2: //Applicant
												$this->User->Applicant->save();
//											App::import('Controller', 'Applicants');
//												$Applicant = new ApplicantsController;
//												$Applicant->constructClasses();
//												$applicantData = array('Applicant'=> array(
//																'userId' => $userId));
//												$Applicant->add($applicantData);
												break;
								case 3: //Recruiter
												break;
								default://default, other action (if someone tries to hack it)
												$this->delete($userId);
												$validUser = false;
												break;
							}
							if($validUser) {
								$this->Session->setFlash(__('The user has been saved'));
								$this->Auth->login();
								return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
							}
            } else {
	            $this->Session->setFlash(
  	              __('The user could not be saved. Please, try again.')
    	        );
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

//dashboard
	//doesn't do much, just redirects to dash depending on user role
	public function dashboard() {
		$User = $this->Auth->user();
		switch($User['roleId']) {
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
		switch($User['roleId']) {
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
		switch($User['roleId']) {
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
		switch($User['roleId']) {
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
