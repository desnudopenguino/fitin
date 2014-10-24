<?php
 App::uses('AppController', 'Controller');

class PhoneNumbersController extends AppController {

	public function add() {

		$this->set('phone_types',$this->PhoneNumber->PhoneType->find('list', array('fields' => array('PhoneType.id','PhoneType.phone_type'))));

	}

	public function edit() {

	}
 }
?>
