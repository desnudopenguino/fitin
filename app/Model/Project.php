<?php
App::uses('AppModel', 'Model');

Class Project extends AppModel {
	public $belongsTo = array(
		'Applicant',
		'Organization'
	);

	public $hasMany = array(
		'ProjectIndustry'
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
