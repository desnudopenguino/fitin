<?php
App::uses('AppModel', 'Model');

Class PhoneType extends AppModel {
	public $hasMany = array(
		'PhoneNumber' => array(
			'className' => 'PhoneNumber'
		)
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'PhoneType.id','PhoneType.phone_type')));
	}
}
?>
