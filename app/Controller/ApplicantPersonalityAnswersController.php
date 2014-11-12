<?php
 App::uses('AppController', 'Controller');

class ApplicantPersonalityAnswersController extends AppController {

	public function add() {
		if($this->request->is('post')) {
			$this->ApplicantPersonalityAnswer->create();
			$this->ApplicantPersonalityAnswer->save($this->request->data);
		}
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}
 }
?>
