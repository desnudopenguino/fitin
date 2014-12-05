<?php
App::uses('AppModel', 'Model');

Class Position extends AppModel {

	public $belongsTo = array(
		'Employer'
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
		
		$dataCard = array();
		$dataCard['Info'] = array();
		$dataCard['Certification'] = array();
		$dataCard['Education'] = array();
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();
		$dataCard['MinimumExperience'] = $data['Position']['min_work_experience'];
		$dataCard['MaximumExperience'] = $data['Position']['max_work_experience'];

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
		return $this->find('all', array(
			'fields' => array(
				'Position.id', 'Position.employer_id')));
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

		$position['Position']['PositionIndustry'] = $position['PositionIndustry'];
		unset($position['PositionIndustry']);	
		$position['Position']['PositionFunction'] = $position['PositionFunction'];
		unset($position['PositionFunction']);	
		$position['Position']['PositionSkill'] = $position['PositionSkill'];
		unset($position['PositionSkill']);	

		return $position['Position'];
	}

	public function findById($id = null) {
		return $this->find('first', array(
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
					'User'))));
	
	}
}
?>
