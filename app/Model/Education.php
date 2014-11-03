<?php
App::uses('AppModel', 'Model');

Class Education extends AppModel {
	public $belongsTo = array(
		'Applicant','Degree','School','Concentration'
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}

}
?>
