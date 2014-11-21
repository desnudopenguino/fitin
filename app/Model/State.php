<?php
App::uses('AppModel', 'Model');

Class State extends AppModel {
	public $hasMany = array(
		'Address' => array(
			'className' => 'Address'
		)
	);

	public function findAllLongNames() {
		return $this->find('list', array(
			'fields' => array(
				'State.id','State.long_name')));
	}
}
?>
