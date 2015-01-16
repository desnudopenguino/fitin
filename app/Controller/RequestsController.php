<?php
 App::uses('AppController', 'Controller');

class RequestsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('confirm','passwordReset');
	}

	/**
		* confirm action sets the user status to +1 
		* this action, with the url, is an email confirmation verification 
		*/
	public function confirm($url = null) {
		//load the request & it's user
		$request = $this->Request->findConfirm($url);
		$this->Request->read(null,$request['Request']['id']);
		if(!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['active'] == 0) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['request_type_id'] != 1) {
			throw new NotFoundException(__('Invalid Request'));
		}

		$this->Request->save(array('Request' => array('active' => 0)));
		//update the user with status_id + 1
debug($request);
		if($request['User']['status_id'] == 1 || $request['User']['status_id'] == 3) {
			$request['User']['status_id'] = $request['User']['status_id'] + 1;
			$this->Request->User->save($request);
		}
	}

	/**
		* passwordReset allows the user to reset their password
		* it checks if the request is valid, then allows the user
		* to change their password.
		*/
	public function passwordReset($url = null) {
		$request = $this->Request->findReset($url);
		$this->Request->read(null,$request['Request']['id']);
		if(!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['active'] == 0) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['request_type_id'] != 2) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($this->request->is('post')) {
			$this->Request->save(array('Request' => array('active' => 0)));
			$this->Request->User->id = $request['Request']['user_id'];

			if($this->Request->User->save($this->request->data)) {
				$this->Session->setFlash(__('<strong>Success:</strong> Password updated!'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
			} else {
				$this->Session->setFlash(__('<strong>Failure:</strong> Please try again.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}
		}
	}
}
?>
