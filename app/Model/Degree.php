<?php
App::uses('AppModel', 'Model');

Class Degree extends AppModel {
	public $hasMany = array(
		'Education',
		'MinDegree' => array(
			'className' => 'Position',
			'foreignKey' => 'min_degree'),
		'MaxDegree' => array(
			'className' => 'Position',
			'foreignKey' => 'max_degree')
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type')));
	}
}
?>
