<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
		$applicant = $this->Applicant->id = $this->Auth->user('id');
debug($applicant);
	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
