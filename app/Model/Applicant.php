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
					'order' => array('Project.start_date'),
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
					if(empty($dataCard['Industry'][$industry['industry_id']])) {
						$dataCard['Industry'][$industry['industry_id']] = array(
							'id' => $industry['industry_id'],
							'industry' => $industry['Industry']['industry_type'],
							'duration' => array());
					}
					$dataCard['Industry'][$industry['industry_id']]['duration'][] = array(
						'start' => $project['start_date'],
						'end' => $project['end_date']);
				}
			}
			foreach($project['ProjectFunction'] as $function) {
				if(!empty($function['WorkFunction'])) {
					if(empty($dataCard['Function'][$function['work_function_id']])) {
						$dataCard['Function'][$function['work_function_id']] = array(
							'id' => $function['work_function_id'],
							'function' => $function['WorkFunction']['function_type'],
							'duration' => array());
						}
						$dataCard['Function'][$function['work_function_id']][] = array(
							'start' => $project['start_date'],
							'end' => $project['end_date']);
				}
			}
			foreach($project['ProjectSkill'] as $skill) {
				if(!empty($industry['Skill'])) {
					$dataCard['Skill'][] = array(
						'id' => $skill['skill_id'],
						'skill' => $skill['Skill']['skill_type'],
						'start' => $project['start_date'],
						'end' => $project['end_date']);
				}
			}
		}

		//now calculate durations for each item
		foreach($dataCard['Industry'] as $iKey => $industry) {
			$dataCard['Industry'][$iKey]['totalDuration'] = $this->calculateDuration($industry['duration']);
		}
		return array('Data' => $data, 'DataCard' => $dataCard);	
	}

	private function calculateDuration($duration_array) {
		$start = 0;
		$end = 0;
		$total = 0;
		foreach( $duration_array as $index => $time) {
			if($start == 0 AND $end == 0) {
				$start = $time['start'];
				$end = $time['end'];
			} elseif($time['start'] > $start AND $time['start'] < $end AND $time['end'] > $end) {
				$end = $time['end'];
			} elseif($time['start'] > $end) {
				$total += ($end - $start);
				$start = $time['start'];
				$end = $time['end'];
			}
			if($index == count($array) - 1) {
				$total += ($end - $start);
			}
		}
		return $total;
	}
}
?>
