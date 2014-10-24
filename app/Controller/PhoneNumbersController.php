<?php
 App::uses('AppController', 'Controller');

class PhoneNumbersController extends AppController {

	public function add() {
		$this->set('phone_types',$this->PhoneType->find('list'));

	}

	public function edit() {

	}
 }
?>
