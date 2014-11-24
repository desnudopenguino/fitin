<?php
App::uses('AppModel', 'Model');

Class Certification extends AppModel {

	public $belongsTo = array(
		'Applicant'
		);

	public $validation = array(
		'name' => array(
			'rule' => 'name_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'earned_date' => array(			
			'rule' => 'earned_date_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		);


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
