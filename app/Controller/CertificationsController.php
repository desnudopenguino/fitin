<?php
 App::uses('AppController', 'Controller');

class CertificationsController extends AppController {

	public function add() {
		if($this->request->is('post')) {
			$this->Certification->create();
			if($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved'));
			}
			else {
				$this->Session->setFlash(__('The certification could not be saved, please try again'));
			}
		}
	}

	public function index() {

	}
 }
?>
