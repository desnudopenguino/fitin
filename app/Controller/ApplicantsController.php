<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
		$this->Applicant->read(null,$this->Auth->user('id'));
		$this->Applicant->checkDisplayName();	//check the display name for the applicant
		$this->set('applicant', $this->Applicant->data);
	}

	function profile() {
		$this->Applicant->read(null,$this->Auth->user('id'));
		$this->Applicant->checkDisplayName();	

		$this->set('applicant', $this->Applicant->data);

debug($this->Applicant->find('first', array(
	'conditions' => array(
		'Applicant.id' => $this->Auth->user('id')))));

	}

	function culture() {

	}

	function search() {

	}
 }
?>
