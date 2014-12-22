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
 }
?>
