<?php
App::uses('AppModel', 'Model');

Class Position extends AppModel {

	public $belongsTo = array(
		'Employer',
		'MinDegree' => array(
			'className' => 'Degree',
			'foreignKey' => 'min_degree'),
		'MaxDegree' => array(
			'className' => 'Degree',
			'foreignKey' => 'max_degree')
	);

	public $hasMany = array(
		'PositionIndustry',
		'PositionFunction',
		'PositionSkill',
		'Application'
	);

	public $validate = array(
		'min_work_experience' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'max_work_experience' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'title' => array(
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
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['employer_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function loadDataCard($id = null) {
		$data = $this->find('first', array(
			'conditions' => array(
				'Position.id' => $id),
			'contain' => array(
				'Employer' => array(
					'User'),
				'PositionIndustry' => array(
					'Industry'),
				'PositionFunction' => array(
					'WorkFunction'),
				'PositionSkill' => array(
					'Skill'))
		));

		$data = $this->cleanRequirements($data);
		
		$dataCard = array();
		$dataCard['Info'] = array();
		$dataCard['Certification'] = array();
		$dataCard['Education'] = array();
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();
		$dataCard['MinimumExperience'] = $data['Position']['min_work_experience'];
		$dataCard['MaximumExperience'] = $data['Position']['max_work_experience'];
		$dataCard['MinDegree'] = $data['Position']['min_degree'];
		$dataCard['MaxDegree'] = $data['Position']['max_degree'];

		$dataCard['Info'] = $data['Position'];
		$dataCard['Info']['url'] = $data['Employer']['User']['url'];

		foreach($data['PositionFunction'] as $fKey => $function) {
			if(!empty($function['WorkFunction'])) {
				$dataCard['Function'][] = array(
					'id' => $function['work_function_id'],
					'function' => $function['WorkFunction']['function_type']);
			}
		}

		foreach($data['PositionIndustry'] as $iKey => $industry) {
			if(!empty($industry['Industry'])) {
				$dataCard['Industry'][] = array(
					'id' => $industry['industry_id'],
					'industry' => $industry['Industry']['industry_type']);
			}
		}

		foreach($data['PositionSkill'] as $sKey => $skill) {
			if(!empty($skill['Skill'])) {
				$dataCard['Skill'][] = array(
					'id' => $skill['skill_id'],
					'skill' => $skill['Skill']['skill_type']);
			}
		}

		return array('DataCard' => $dataCard);
	}

	public function findAllIds() {
		App::uses('CakeSession', 'Model/Datasource');
		$company_id = CakeSession::read('company');
		if(!empty($company_id)) {
			$ids = $this->Employer->Organization->Company->findPositions($company_id);
		} else {
			$ids = $this->find('all', array(
				'fields' => array(
					'Position.id', 'Position.employer_id')));
		}
		return $ids;
	}

	public function findAllPremiumIds() {
		App::uses('CakeSession', 'Model/Datasource');
		$company_id = CakeSession::read('company');
		if(!empty($company_id)) {
			$ids = $this->Employer->Organization->Company->findPositions($company_id);
		} else {
			$ids = $this->find('all', array(
				'contain' => array(
					'Employer' => array(
						'User'
					)
				),
				'conditions' => array(
					'User.user_level_id > ' => 10
				)
			));
		}
		return $ids;
	}

	public function findBlock($id = null) {
		$position = $this->find('first', array(
			'conditions' => array(
				'Position.id' => $id),
			'contain' => array(
				'PositionIndustry' => array(
					'Industry'),
				'PositionFunction' => array(
					'WorkFunction'),
				'PositionSkill' => array(
					'Skill'))));

		$position = $this->cleanRequirements($position);

		$position['Position']['PositionIndustry'] = $position['PositionIndustry'];
		unset($position['PositionIndustry']);	
		$position['Position']['PositionFunction'] = $position['PositionFunction'];
		unset($position['PositionFunction']);	
		$position['Position']['PositionSkill'] = $position['PositionSkill'];
		unset($position['PositionSkill']);	

		return $position['Position'];
	}

	public function findById($id = null) {
		$position = $this->find('first', array(
			'conditions' => array(
				'Position.id' => $id),
			'contain' => array(
				'PositionIndustry' => array(
					'Industry'),
				'PositionFunction' => array(
					'WorkFunction'),
				'PositionSkill' => array(
					'Skill'),
				'Employer' => array(
					'User',
					'Organization' => array(
						'Company')))));

		$position = $this->cleanRequirements($position);
	
		$position['Position']['Employer'] = $position['Employer'];
		unset($position['Employer']);
		$position['Position']['PositionIndustry'] = $position['PositionIndustry'];
		unset($position['PositionIndustry']);
		$position['Position']['PositionFunction'] = $position['PositionFunction'];
		unset($position['PositionFunction']);
		$position['Position']['PositionSkill'] = $position['PositionSkill'];
		unset($position['PositionSkill']);

		return $position;
	}	

// removes null position industries and position functions from the list.
	private function cleanRequirements($data) {
		foreach($data['PositionIndustry'] as $key => $industry) {
			if($industry['industry_id'] == null) {
				unset($data['PositionIndustry'][$key]);
			}
		}
		foreach($data['PositionFunction'] as $key => $function) {
			if($function['work_function_id'] == null) {
				unset($data['PositionFunction'][$key]);
			}
		}
		return $data;
	}

	public function findAll() {
		$positions = $this->find('all', array(
			'contain' => array(
				'PositionIndustry' => array(
					'Industry'),
				'PositionFunction' => array(
					'WorkFunction'),
				'PositionSkill' => array(
					'Skill'),
				'Employer' => array(
					'User',
					'Organization' => array(
						'Company')))));
		
		foreach($positions as $pKey => $position) {

			$positions[$pKey] = $this->cleanRequirements($position);
	
			$positions[$pKey]['Position']['Employer'] = $position['Employer'];
			unset($positions[$pKey]['Employer']);
			$positions[$pKey]['Position']['PositionIndustry'] = $position['PositionIndustry'];
			unset($positions[$pKey]['PositionIndustry']);
			$positions[$pKey]['Position']['PositionFunction'] = $position['PositionFunction'];
			unset($positions[$pKey]['PositionFunction']);
			$positions[$pKey]['Position']['PositionSkill'] = $position['PositionSkill'];
			unset($positions[$pKey]['PositionSkill']);
		}
		return $positions;
	}
}
?>
