<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
debug($this->Applicant->id = $userData['id']);

	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
