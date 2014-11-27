<?php
 App::uses('AppController', 'Controller');

class ApplicationsController extends AppController {

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

	public function apply($position_id = null) {
		$this->Application->create();
		$this->Application->save(array('Application' => array('position_id' => $position_id));
	}

	public function edit() {

	}

	public function applicantIndex() {
		$this->set('applications', $this->Application->findApplicant($this->Auth->user('id')));
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
	}
	public function employerIndex() {
		$this->set('applications', $this->Application->findEmployer($this->Auth->user('id')));
	}
 }
?>
