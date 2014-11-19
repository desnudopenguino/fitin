<?php
App::uses('AppModel', 'Model');

Class Industry extends AppModel {
	public $hasMany = array(
		'Education',
		'ProjectIndustry'
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Industry.id', 'Industry.industry_type')));
	}
}
?>
