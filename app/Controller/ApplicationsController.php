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

	public function edit() {

	}

	public function applicantIndex() {
		$this->set('applications', $this->Application->find('all', array(
			'conditions' => array(
				'Application.applicant_id' => $this->Auth->user('id')))));
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
	}
	public function employerIndex() {
		$this->set('applications', $this->Application->Position->find('all', array(
			'conditions' => array(
				'Position.employer_id' => $this->Auth->user('id')),
			'contain' => array(
				'Application'))));
	}
 }
?>
