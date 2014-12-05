<?php
App::uses('AppModel', 'Model');

Class ApplicantPersonalityAnswer extends AppModel {
	public $belongsTo = array(
		'PersonalityQuestion',
		'Applicant',
		'PersonalityQuestionAnswer');

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		}
		return true;	
	}
}
?>
