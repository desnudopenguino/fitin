<?php
App::uses('AppModel', 'Model');

Class Education extends AppModel {

	public $belongsTo = array(
		'Applicant','Degree','Organization','Industry'
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}

	public function findApplicantAll($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Education.applicant_id' => $applicant_id),
			'contain' => array(
				'Degree',
				'Organization',
				'Industry')));
	}

}
?>
