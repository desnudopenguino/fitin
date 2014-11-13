<?php
App::uses('AppModel', 'Model');

Class Application extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Employer'
		);

	public function beforeSave($options = array()) {
		return true;
	}
}
?>
