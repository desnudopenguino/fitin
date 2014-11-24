<?php
App::uses('AppModel', 'Model');

Class Certification extends AppModel {

	public $belongsTo = array(
		'Applicant'
		);

	public $validate = array(
		'certification_name' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'earned_date' => array(			
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
		);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		return true;
	}

	public function afterFind(array $results, boolean $primary = false) {
		debug($results);
	}


	public function findApplicantActive($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Certification.applicant_id' => $applicant_id,
				'OR' => array(
					'Certification.expiration_date IS NULL',
					'Certification.expiration_date >' => date('Y-m-d'))),
			'fields' => array(
				'Certification.certification_name'
			)));
	}

	public function findApplicantAll($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Certification.applicant_id' => $applicant_id),
			'contain' => false));
	}
}
?>
