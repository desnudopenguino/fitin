<?php
 App::uses('AppController', 'Controller');

class ApplicantsController extends AppController {
	function add($userArray) {
		$this->Applicant->create();
		if ($this->Applicant->save($userArray)) {
		}
	}

	function dashboard() {
debug($this->Auth->user('id'));
//debug($this->Applicant->id = $this->Auth->user['id']);

	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
