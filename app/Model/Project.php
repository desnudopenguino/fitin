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

	public $validate = array(
		'title' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'start_date' => array(			
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'responsibilities' => array(			
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
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

	public function afterFind($results, $primary = false) {
		foreach($results as $rKey => $result) {
			if(empty($result['Project']['end_date'])) {
				$results[$rKey]['Project']['end_date'] = date('Y-m-d');
			}
		}
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

	public function findBlock($id = null) {
		$project = $this->find('first', array(
			'conditions' => array(
				'Project.id' => $id),
			'contain' => array(
				'Organization',
				'ProjectIndustry' => array(
					'Industry'),
				'ProjectFunction' => array(
					'WorkFunction'),
				'ProjectSkill' => array(
					'Skill'))));

		$project['Project']['ProjectIndustry'] = $project['ProjectIndustry'];
		unset($project['ProjectIndustry']);	
		$project['Project']['ProjectFunction'] = $project['ProjectFunction'];
		unset($project['ProjectFunction']);	
		$project['Project']['ProjectSkill'] = $project['ProjectSkill'];
		unset($project['ProjectSkill']);	
		$project['Project']['Organization'] = $project['Organization'];
		unset($project['Organization']);	

		return $project['Project'];

	}
}
?>
