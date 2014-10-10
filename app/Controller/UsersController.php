<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout','register');
    }

//index
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

//view
	public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
	}

//register replaces add
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
						$request = $this->request->data;
						$request['User']['url'] = md5($request['User']['email']);

            if ($this->User->save($request)) {
                $this->Session->setFlash(__('The user has been saved'));

/*								//send user an email
								$Email = new CakeEmail();
								$Email->from(array('webmaster@fitin.today' => 'FitIn'));
								$Email->to('claxbucky@yahoo.com'); //change this to the real email, just testing right now
								$Email->subject('FitIn Confirmation Email');
								$Email->send('Thank you for joining. Here is your confirmation link:');
 */
//								return $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
						debug($this->User->validationErrors);
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
}
?>
