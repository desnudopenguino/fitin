<?php
App::uses('AppModel', 'Model');

Class Project extends AppModel {

	public $recursive = 2;
	public $actsAs = array('Containable');
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

		foreach($this->data['ProjectIndustry'] as $key => $industry) {
			if($industry['ProjectIndustry']['industry_id'] == '' || $industry['ProjectIndustry']['industry_id'] == NULL) {
				unset($this->data['ProjectIndustry'][$key]);
			}
		}
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}

	public function findApplicantAll($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Position.applicant_id' => $applicant_id)));
			
	}
}
?>
