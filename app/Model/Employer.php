<?php
App::uses('AppModel', 'Model');

Class Employer extends AppModel {


	public $belongsTo = array(
		'User','Organization' );

	public $primaryKey = 'user_id';

	public $hasOne = array(
		);

	public $hasMany = array(
		'Position'
		);

	public function findDashboard($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'Employer.user_id' => $id),
			'contain' => array(
				'User' => array(
					'Message'))));
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
}
?>
