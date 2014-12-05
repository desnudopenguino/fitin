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

	public function findDashboard($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'User' => array(
					'Message' => array(
						'conditions' => array(
							'Message.receiver_id' => $id))))));
	}

	public function findProfile($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'User' => array(
					'Address' => array(
						'State'),
					'PhoneNumber'),
				'Position' => array(
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
