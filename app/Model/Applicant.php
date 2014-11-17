<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {

	public $actsAs = array('Containable');

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);

	public $primaryKey = 'user_id';

	public $hasMany = array(
		'Certification' => array(
			'className' => 'Certification'
		),
		'Education',
		'Project',
		'Application');

	public $virtualFields = array(
		'display_name' => "CONCAT(Applicant.first_name, ' ', Applicant.mi, ' ' , Applicant.last_name)"
	);

	public function checkDisplayName() {
		if(empty($this->data[$this->alias]['display_name'])) {
			$this->data[$this->alias]['display_name'] = $this->data['User']['email'];
		} 
	}

	public function loadDataCard($id = null) {
		$dataCard = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'Certification' => array(
					'fields' => array(
						'Certification.certification_name')),
				'Education' => array(
					'Degree',
					'Industry'),
				'Project' => array(
					'Organization',
					'ProjectIndustry' => array(
						'Industry'),
					'ProjectFunction' => array(
						'WorkFunction'),
					'ProjectSkill' => array(
						'Skill')))
		));

//certification stuff
		foreach($dataCard['Certification'] as $cKey => $certification) {
			$dataCard['Certification'][$cKey] = $certification['certification_name'];
		}

//education stuff
		foreach($dataCard['Education'] as $eKey => $education) {
			$dataCard['Education'][$eKey]['degree_id'] = $education['Degree']['id'];
			$dataCard['Education'][$eKey]['degree'] = $education['Degree']['degree_type'];
			$dataCard['Education'][$eKey]['industry_id'] = $education['Industry']['id'];
			$dataCard['Education'][$eKey]['industry'] = $education['Industry']['industry_type'];
		}

//project stuff - split the functions and experiences into different bits. 
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();
		foreach($dataCard['Project'] as $pKey => $project) {

		}
		return $dataCard;	
	}
}
?>
