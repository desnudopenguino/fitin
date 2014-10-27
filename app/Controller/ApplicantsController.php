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
		//$this->Applicant->read(null,$this->Auth->user('id'));
		$applicant = $this->Applicant->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $this->Auth->user('id')
		)));
		$applicant->checkDisplayName();

		$this->set('applicant', $applicant);
	}

	function culture() {

	}

	function search() {

	}
 }
?>
