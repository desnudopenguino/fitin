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
				'Position.id' => $id)
			
		));

		return array('Data' => $data, 'DataCard' => $dataCard);
	}
}
?>
