<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
		$this->Applicant->userId = $this->Auth->user('id');
		$this->Applicant->read();
debug($this->Applicant);
	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
