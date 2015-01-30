<?php
App::uses('AppModel', 'Model');

Class Address extends AppModel {

	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		),
		'State' => array(
			'className' => 'State'
		)
	);

	public $validate = array(
		'street' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'city' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'state' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'country' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'zip' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
			);

	public function beforeSave($options = array()) {
		return true;
	}
}
?>
