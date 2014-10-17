<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {
	function add($userArray) {
		$this->Employer->create();
		if ($this->Employer->save($userArray)) {

		}
	}

	function dashboard() {

	}
 }
?>
