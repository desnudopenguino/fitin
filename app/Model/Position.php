<?php
App::uses('AppModel', 'Model');

Class Position extends AppModel {

	public $actsAs = array('Containable');

	public $recursive = 2;//this will go away soon

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

		foreach($data['PositionFunction'] as $fKey => $function) {
			$dataCard['Function'][] = array(
				'id' => $function['work_function_id'],
				'function' => $function['WorkFunction']['function_type']);
		}

		foreach($data['PositionIndustry'] as $iKey => $industry) {
			$dataCard['Industry'][] = array(
				'id' => $industry['industry_id'],
				'industry' => $industry['Industry']['industry_type']);
		}

		foreach($data['PositionSkill'] as $sKey => $skill) {
			$dataCard['Skill'][] = array(
				'id' => $skill['skill_id'],
				'skill' => $skill['Skill']['skill_type']);
		}

		return array('Data' => $data, 'DataCard' => $dataCard);
	}
}
?>
