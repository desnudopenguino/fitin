<?php

App::uses('AppModel', 'Model');

Class UserLevel extends AppModel {
	
	public $hasMany = array(
		'User');

	public function findPlans() {
		switch(Authcomponent::user('role_id')) {
			case 1:
				return $this->findEmployerPlans();
				break;
			case 2:
				return $this->findApplicantPlans();
				break;
		}
	}

	public function findApplicantPlans() {
		return $this->find('list' array(
			'conditions' => array(
				'id' => '>= 20',
				'id' => '< 30'),
			'fields' => array(
				'UserLevel.stripe_plan',
				'User.description'. ' $'.'User.price')));
	}
	
	public function findEmployerPlans() {
		return $this->find('list' array(
			'conditions' => array(
				'id' => '>= 10',
				'id' => '< 20'),
			'fields' => array(
				'UserLevel.stripe_plan',
				'User.description'. ' $'.'User.price')));
	}
}
?>
