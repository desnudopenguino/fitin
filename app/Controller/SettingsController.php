<?php
 App::uses('AppController', 'Controller');

class SettingsController extends AppController {

	public $components = array(
		'Geocoder.Geocoder');

//remove actions, not needed
	public function update() {
		if($this->request->is('post')) {
			$this->Setting->create();
			if($this->Setting->save($this->request->data)) {
			}
		}
		
		$this->layout = false;
		$this->autorender = false;

		$this->Session->setFlash(__('<strong>Success:</strong> Your settings have been updated!'),
			'alert', array(
			'plugin' => 'BoostCake',
			'class' => 'alert-success'));
	}
} ?>
