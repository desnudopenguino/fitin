<?php
App::uses('AppModel','Model');

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
		$OBJECT = $this->alias;
		if(empty($this->data[$OBJECT]['id'])) {
			$this->data[$OBJECT]['applicant_id'] = AuthComponent::user('id');
		}

		if($this->data[$OBJECT]['end_date'] == 'Current') {
			$this->data[$OBJECT]['end_date'] = null;
		}
		//parse and check url.
		if(!empty($this->data[$OBJECT]['website'])) {
			$proto_scheme = parse_url($this->data[$OBJECT]['website'],PHP_URL_SCHEME);
			if(!stristr($proto_scheme,'http')){
				$this->data[$OBJECT]['website'] = 'http://'.$this->data['Project']['website'];
			}
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach($results as $rKey => $result) {
			if(empty($result['Project']['end_date'])) {
				$results[$rKey]['Project']['end_date'] = 'Current';
			}
		}
		return $results;
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
