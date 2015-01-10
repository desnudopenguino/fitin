<?php
App::uses('AppModel', 'Model');

Class Degree extends AppModel {
	public $hasMany = array(
		'Education',
		'Position' => array(
			'foreignKey' => 'min_degree'),
		'Position' => array(
			'foreignKey' => 'max_degree')
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type')));
	}
}
?>
