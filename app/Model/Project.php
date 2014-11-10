<?php
App::uses('AppModel', 'Model');

Class Project extends AppModel {

	public $recursive = 2;
	public $belongsTo = array(
		'Applicant',
		'Organization'
	);

	public $hasMany = array(
		'ProjectIndustry',
		'ProjectFunction',
		'ProjectSkill'
	);

	public function beforeSave($options = array()) {

		foreach($this->data[$this->alias]['ProjectIndustry'] as $key => $industry) {
			if($industry['industry_id'] == '' || $industry['industry_id'] == NULL) {
				unset($this->data[$this->alias]['ProjectIndustry'][$key]);
			}
		}
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
