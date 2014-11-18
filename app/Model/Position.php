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

		return array('Data' => $data, 'DataCard' => $dataCard);
	}
}
?>
