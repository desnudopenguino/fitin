<?php
 App::uses('AppController', 'Controller');

class RequestsController extends AppController {

	public function confirm($url = null) {
		//load the request & it's user
		$request = $this->Request->findConfirm($url);
		//update the user with status_id + 1
		$request['User']['status_id'] = $request['User']['status_id'] + 1;
		$this->Request->User->save($request);
	}

	public function reset($url = null) {
		$request = $this->Request->findReset($url);
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
