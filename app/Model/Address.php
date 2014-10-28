<?php
App::uses('AppModel', 'Model');

Class Address extends AppModel {

	public $useTable = 'addresses';// for some reason it's trying to access addersses
	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		),
		'State' => array(
			'className' => 'State'
		)
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
