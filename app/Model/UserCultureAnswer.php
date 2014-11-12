<?php
App::uses('AppModel', 'Model');

Class UserCultureAnswer extends AppModel {
	public $belongsTo = array(
		'CultureQuestion',
		'User',
		'CultureQuestionAnswer');

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		return true;	
	}
}
?>
