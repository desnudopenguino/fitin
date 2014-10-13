<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout','register');
    }

		public function beforeSave() {
				parent::beforeSave();
				$this->data['User']['url'] = md5($this->data['User']['email']);
				return true;
		}

//index
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

//view
	public function view($url = null) {
				$user = $this->User->findByUrl($url);
				if(empty($user)) {
  	    	throw new NotFoundException(__('Invalid user'));
				}
				$this->set('user',$user);
	}

//register replaces add
    public function register() {
        if ($this->request->is('post')) {
						$this->User->create();

						//request takes the request in and adds the url md5 hash move to beforeSave
						$request = $this->request->data;
						$request['User']['url'] = md5($request['User']['email']);
						//beforeSave

						if ($this->User->save($request)) {
								$userId = $this->User->getLastInsertId();
								switch($request['User']['roleId']) { //create usertype in case here
									case 1: //Employer
													App::import('Controller', 'Employers');
													$Employer = new EmployersController;
													$Employer->constructClasses();
													$employerData = array('Employer'=> array(
																	'userId' => $userId));
													$Employer->add($employerData);
													break;
									case 2: //Applicant
													App::import('Controller', 'Applicants');
													$Applicant = new ApplicantsController;
													$Applicant->constructClasses();
													$applicantData = array('Applicant'=> array(
																	'userId' => $userId));
													$Applicant->add($applicantData);
													break;
									case 3: //Recruiter
													break;
									default://default, other action (if someone tries to hack it)
													$this->delete($userId);
													break;
								}
                $this->Session->setFlash(__('The user has been saved'));

/*								//send user an email
								$Email = new CakeEmail();
								$Email->from(array('webmaster@fitin.today' => 'FitIn'));
								$Email->to('claxbucky@yahoo.com'); //change this to the real email, just testing right now
								$Email->subject('FitIn Confirmation Email');
								$Email->send('Thank you for joining. Here is your confirmation link:');
 */
//								return $this->redirect(array('controller' => 'users', 'action' => 'index'));
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
		return $this->redirect($this->Auth->logout());
	}

//dashboard
	//doesn't do much, just redirects to dash depending on user role
	public function dashboard() {
		$User = $this->getCurrentUser();
debug($User);

	}
}
?>
