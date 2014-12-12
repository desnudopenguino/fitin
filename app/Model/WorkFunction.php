<?php
App::uses('AppModel', 'Model');

Class WorkFunction extends AppModel {
	public $hasMany = array(
		'ProjectFunction',
		'PositionFunction'
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'WorkFunction.id', 'WorkFunction.function_type'),
			'order' => array('WorkFunction.function_type')));
	}
}
?>
