<?php
App::uses('AppModel', 'Model');

Class ApplicantPersonalityAnswer extends AppModel {
	public $belongsTo = array(
		'PersonalityQuestion',
		'Applicant',
		'PersonalityQuestionAnswer');

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;	
	}
}
?>
