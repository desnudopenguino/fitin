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

debug($this->data);
		foreach($this->data['ProjectIndustry'] as $key => $industry) {
			if($industry['ProjectIndustry']['industry_id'] == '' || $industry['ProjectIndustry']['industry_id'] == NULL) {
				unset($this->data['ProjectIndustry'][$key]);
			}
		}
debug($this->data);
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
