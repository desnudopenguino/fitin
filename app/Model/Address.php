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

	public $validate = array(
		'state_id' => array(
			'rule' => 'state_id_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'street' => array(
			'rule' => 'street_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'city' => array(
			'rule' => 'city_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'zip' => array(
			'rule' => 'zip_required',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
			);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
