<?php
App::uses('AppModel', 'Model');

Class Degree extends AppModel {
	public $hasMany = array(
		'Education' => array(
			'className' => 'Education'
		)
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type'),
			'order' => array(
				'Degree.id desc')));
	}
}
?>
