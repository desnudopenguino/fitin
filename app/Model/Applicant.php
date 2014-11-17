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
		$data = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'Certification' => array(
					'fields' => array(
						'Certification.certification_name')),
				'Education' => array(
					'fields' => array(
						'degree_id',
						'industry_id'),
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
		
		$dataCard = array();
		$dataCard['Certification'] = array();
		$dataCard['Education'] = array();
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();
//certification stuff
		foreach($data['Certification'] as $cKey => $certification) {
			$dataCard['Certification'][$cKey] = $certification['certification_name'];
		}

//education stuff
		foreach($data['Education'] as $eKey => $education) {
			$dataCard['Education'][$eKey]['industry_id'] = $education['industry_id'];
			$dataCard['Education'][$eKey]['degree'] = $education['Degree']['degree_type'];
			$dataCard['Education'][$eKey]['degree_id'] = $education['degree_id'];
			$dataCard['Education'][$eKey]['industry'] = $education['Industry']['industry_type'];
		}

//project stuff - split the functions and experiences into different bits. 
		foreach($data['Project'] as $pKey => $project) {
			foreach($project['ProjectIndustry'] as $industry) {
				if(!empty($industry['Industry'])) {
					$dataCard['Industry'][] = array(
						'id' => $industry['industry_id'],
						'industry' => $industry['Industry']['industry_type']);
				}
			}
			foreach($project['ProjectFunction'] as $function) {
				if(!empty($function['WorkFunction'])) {
					$dataCard['Function'][] = array(
						'id' => $function['work_function_id'],
						'function' => $function['WorkFunction']['function_type']);
				}
			}
			foreach($project['ProjectSkill'] as $skill) {
				if(!empty($industry['Skill'])) {
					$dataCard['Skill'][] = array(
						'id' => $skill['skill_id'],
						'skill' => $skill['Skill']['skill_type']);
				}
			}
		}
		return array('Data' => $data, 'DataCard' => $dataCard);	
	}
}
?>
