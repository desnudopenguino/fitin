<?php
App::uses('AppModel', 'Model');

Class Degree extends AppModel {
	public $hasMany = array(
		'Education',
		'Project' => array(
			'foreignKey' => 'min_degree'),
		'Project' => array(
			'foreignKey' => 'max_degree')
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Degree.id', 'Degree.degree_type')));
	}
}
?>
