<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {
	function add($userArray) {
		$this->Employer->create();
		if ($this->Employer->save($userArray)) {

		}
	}

	function dashboard() {
		$this->Employer->read(null,$this->Auth->user('id'));
debug($this->Employer->data);
		$this->set('employer', $this->Employer->data);
	}

	function profile() {

	}

	function culture() {

	}

	function search() {

	}
 }
?>
