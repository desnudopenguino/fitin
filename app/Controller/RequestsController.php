<?php
 App::uses('AppController', 'Controller');

class RequestsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('confirm','reset');
	}

	public function confirm($url = null) {
		//load the request & it's user
		$request = $this->Request->findConfirm($url);
		$this->Request->id = $request['Request']['id'];
		if(!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['request_type'] != 1) {
			throw new NotFoundException(__('Invalid Request'));
		}
		//update the user with status_id + 1
		$request['User']['status_id'] = $request['User']['status_id'] + 1;
		$this->Request->User->save($request);
	}

	public function passwordReset($url = null) {
		$request = $this->Request->findReset($url);
		$this->Request->id = $request['Request']['id'];
		if(!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($request['Request']['request_type'] != 2) {
			throw new NotFoundException(__('Invalid Request'));
		}

		if($this->request->is('post')) {
			$this->Request->User->id = $request['User']['id'];

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
