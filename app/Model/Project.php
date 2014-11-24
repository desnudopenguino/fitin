<?php
App::uses('AppModel', 'Model');

Class Project extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Organization'
	);

	public $hasMany = array(
		'ProjectIndustry',
		'ProjectFunction',
		'ProjectSkill'
	);

	public $validation = array(
		'title' => array(
			'rule' => 'title_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'start_date' => array(			
			'rule' => 'start_date_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'end_date' => array(			
			'rule' => 'end_date_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'responsibilities' => array(			
			'rule' => 'responsibilities_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
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
				'Project.applicant_id' => $applicant_id),
			'contain' => array(
				'Project',
				'Organization',
				'ProjectIndustry',
				'ProjectFunction',
				'ProjectSkill')));
			
	}
}
?>
