<?php
 App::uses('AppController', 'Controller');

class EmployersController extends AppController {
	function creat($userArray) {
		$this->Employer->create();
		debug($userArray);
	}
 }
?>
