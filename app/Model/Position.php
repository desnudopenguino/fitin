<?php
App::uses('AppModel', 'Model');

Class Position extends AppModel {

	public $recursive = 2;
	public $belongsTo = array(
		'Employer'
	);

	public $hasMany = array(
		'PositionIndustry',
		'PositionFunction',
		'PositionSkill'
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['employer_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
