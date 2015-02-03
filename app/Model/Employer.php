<?php
App::uses('AppModel', 'Model');

Class Employer extends AppModel {

	public $belongsTo = array(
		'User','Organization' );

	public $primaryKey = 'user_id';

	public $hasMany = array(
		'Position'
		);

	public $hasOne = array(
		'Company'
		);

	public $validate = array(
		'department_name' => array(
			'rule' => array('notEmpty'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'This field cannot be empty'));

	public function findDashboard($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'User' => array(
					'UserLevel',
					'Message' => array(
						'conditions' => array(
							'Message.receiver_id' => $id))))));
	}

	public function findProfile($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'Organization' => array(
					'Company'),
				'User' => array(
					'Address' => array(
						'State'),
					'PhoneNumber'),
				'Position' => array(
					'MinDegree',
					'MaxDegree',
					'PositionIndustry' => array(
						'Industry'),
					'PositionFunction' => array(
						'WorkFunction'),
					'PositionSkill' => array(
						'Skill')))));
	}

	public function findEdit($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'Organization',
				'User' => array(
					'PhoneNumber',
					'Address' => array(
						'State')))));
	}

	public function findCompanyDepartments($id = null) {
		$departments = $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'Company' => array(
					'Organization' => array(
						'Employer' => array(
							'User' => array(
								'conditions' => array(
									'User.user_level_id' => 17))))))));

		$return_departments = $departments['Company']['Organization']['Employer'];

		foreach($return_departments as $dKey => $dept) {
			if(empty($dept['User']) || $dept['User']['id'] == $id) {
				unset($return_departments[$dKey]);
			}
		}

		return $return_departments;
	}
}
?>
