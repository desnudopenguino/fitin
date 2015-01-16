<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {

	public $belongsTo = array(
		'User');

	public $primaryKey = 'user_id';

	public $hasMany = array(
		'Certification',
		'Education',
		'Project',
		'Application');

	public $virtualFields = array(
		'display_name' => "CONCAT(Applicant.first_name, ' ', Applicant.mi, ' ' , Applicant.last_name)"
	);

	public $validate = array(
		'first_name' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'last_name' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
	);

	public function loadDataCard($id = null) {
		$data = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'User',
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
		$dataCard['Info'] = array();
		$dataCard['Certification'] = array();
		$dataCard['Education'] = array();
		$dataCard['Function'] = array();
		$dataCard['Industry'] = array();
		$dataCard['Skill'] = array();

//info
		$dataCard['Info'] = $data['Applicant'];
		$dataCard['Info']['url'] = $data['User']['url'];
		$dataCard['Info']['id'] = $data['User']['id'];
//certification stuff
		foreach($data['Certification'] as $cKey => $certification) {
			$dataCard['Certification'][$cKey] = $certification['certification_name'];
		}

//education stuff
		foreach($data['Education'] as $eKey => $education) {
			$dataCard['Education'][$eKey]['degree'] = $education['Degree']['degree_type'];
			$dataCard['Education'][$eKey]['degree_id'] = $education['degree_id'];
			$dataCard['Education'][$eKey]['industry_id'] = $education['industry_id'];
			if(!empty($education['Industry'])) {
				$dataCard['Education'][$eKey]['industry'] = $education['Industry']['industry_type'];
			}
		}

//project stuff - split the functions and experiences into different bits. 
		foreach($data['Project'] as $pKey => $project) {
			if($project['end_date'] == 'Current') {
				$project['end_date'] = date('Y-m-d');
			}
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
						$dataCard['Function'][$function['work_function_id']]['duration'][] = array(
							'start' => $project['start_date'],
							'end' => $project['end_date']);
				}
			}
			foreach($project['ProjectSkill'] as $skill) {
				if(!empty($skill['Skill'])) {
					if(empty($dataCard['Skill'][$skill['skill_id']])) {
						$dataCard['Skill'][$skill['skill_id']] = array(
						'id' => $skill['skill_id'],
						'skill' => $skill['Skill']['skill_type']);
					}
					$dataCard['Skill'][$skill['skill_id']]['duration'][] = array(
						'start' => $project['start_date'],
						'end' => $project['end_date']);
				}
			}
		}

		//now calculate durations for each item
		foreach($dataCard['Industry'] as $iKey => $industry) {
			$dataCard['Industry'][$iKey]['totalDuration'] = $this->calculateDuration($industry['duration']);
		}
		foreach($dataCard['Function'] as $fKey => $function) {
			$dataCard['Function'][$fKey]['totalDuration'] = $this->calculateDuration($function['duration']);
		}
		foreach($dataCard['Skill'] as $sKey => $skill) {
			$dataCard['Skill'][$sKey]['totalDuration'] = $this->calculateDuration($skill['duration']);
		}

		return array('DataCard' => $dataCard);	
	}

	private function calculateDuration($duration_array) {
		$start = 0;
		$end = 0;
		$total = 0.0;
		foreach( $duration_array as $index => $time) {
			$time['start'] = strtotime($time['start']);
			$time['end'] = strtotime($time['end']);
			if($start == 0 AND $end == 0) {
				$start = $time['start'];
				$end = $time['end'];
			} elseif($time['start'] > $start AND
				$time['start'] < $end AND 
				$time['end'] > $end) {
					$end = $time['end'];
			} elseif($time['start'] > $end) {
				$total += ($end - $start);
				$start = $time['start'];
				$end = $time['end'];
			}
			if($index == count($duration_array) - 1) {
				$total += ($end - $start);
			}
		}

		$total = round($total / 60 / 60 / 24 / 365, 2);
		return $total;
	}

	public function afterFind($results, $primayr = false) {
		foreach($results as $key => $result) {
			if(empty($result['Applicant']['display_name'])&& !empty($result['User'])) {
				$results[$key]['Applicant']['display_name'] = $result['User']['email'];
			}
		}
		return $results;
	}

	public function findDashboard($id = null) {
		$dashboard_data = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'User')));
		return $dashboard_data;
	}


	public function findProfile($id = null) {
		$profile_data = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'User' => array(
					'Address' =>array(
						'State'),
					'PhoneNumber'),
				'Project' => array(
					'Organization',
					'ProjectIndustry' => array(
						'Industry'),
					'ProjectFunction' => array(
						'WorkFunction'),
					'ProjectSkill' => array(
						'Skill'),
					'order' => array(
						'Project.end_date IS NULL DESC', 'Project.end_date DESC')),
				'Certification' => array(
					'Organization'),
				'Education' => array(
					'Degree',
					'Organization',
					'Industry',
					'order' => array(
							'degree_id desc')))));
		return $profile_data;
	}

	public function findEdit($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'User' => array(
					'Address' =>array(
						'State'),
					'PhoneNumber'
						))));
	}

	public function findAllIds() {
		return $this->find('all', array(
			'fields' => array(
				'Applicant.user_id')));
	}
	
	public function findAllPremiumIds() {
		return $this->find('all', array(
			'fields' => array(
				'Applicant.user_id'),
			'contain' => array(
				'User' => array(
					'conditions' => array(
						'User.user_level_id > ' => 20)))));
	}
}
?>
