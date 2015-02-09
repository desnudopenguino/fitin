<?php
 App::uses('AppController', 'Controller');

class AddressesController extends AppController {

	public $components = array(
		'Geocoder.Geocoder');

//remove actions, not needed
	public function add() {
		$this->set('states',$this->Address->State->find('list', array('fields' => array('State.id','State.short_name'))));
		if($this->request->is('post')) {
			$this->Address->create();
			if($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
			}
			else {
				$this->Session->setFlash(__('The address could not be saved, please try again'));
			}
		}
	}

	public function edit() {

	}
 }
?>
