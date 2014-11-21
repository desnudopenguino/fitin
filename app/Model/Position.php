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

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['employer_id'] = AuthComponent::user('id');
		return true;
	}

	public function loadDataCard($id = null) {
		$data = $this->find('first', array(
			'conditions' => array(
				'Position.id' => $id),
			'contain' => array(
				'Employer',
				'PositionIndustry' => array(
					'Industry'),
				'PositionFunction' => array(
					'WorkFunction'),
				'PositionSkill' => array(
					'Skill'))
		));
		
		$dataCard = array();
		$dataCard['Certification'] = array();
		$dataCard['Education'] = array();
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();
		$dataCard['MinimumExperience'] = $data['Position']['min_work_experience'];
		$dataCard['MaximumExperience'] = $data['Position']['max_work_experience'];

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
}
?>
