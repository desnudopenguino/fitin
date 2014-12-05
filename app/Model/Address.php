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
		'state_id' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
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
		'zip' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
			);

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		}
		return true;
	}
}
?>
