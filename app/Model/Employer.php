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
			'notEmpty' => array(
				'required' => true,
				'allowEmpty' => false)));

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
}
?>
