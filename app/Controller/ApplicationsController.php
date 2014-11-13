<?php
 App::uses('AppController', 'Controller');

class ApplicationsController extends AppController {:

	public function add() {
		if($this->request->is('post')) {
			$this->Application->create();
			if($this->Application->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
			}
			else {
				$this->Session->setFlash(__('The address could not be saved, please try again'));
			}
		}
	}

	public function edit() {

	}

	public function index() {
	}
 }
?>
