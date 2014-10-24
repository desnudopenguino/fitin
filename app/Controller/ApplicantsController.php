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
		//get address

		//get phone number(s)
		$this->set('phone_numbers', $this->Applicant->User->PhoneNumber->find('list'));

		//get projects

		//get educations

		//get certifications
		$this->set('applicant', $this->Applicant->data);

	}

	function culture() {

	}

	function search() {

	}
 }
?>
