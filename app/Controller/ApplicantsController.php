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
		$this->Applicant->checkDisplayName($this);	//check the display name for the applicant
		$this->set('applicant',$this->Applicant->data);
	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
