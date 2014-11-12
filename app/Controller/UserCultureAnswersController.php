<?php
 App::uses('AppController', 'Controller');

class UserCultureAnswersController extends AppController {

	public function add() {
		if($this->request->is('post')) {
			$this->UserCultureAnswer->create();
			$this->UserCultureAnswer->save($this->request->data);
		}
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}
 }
?>
