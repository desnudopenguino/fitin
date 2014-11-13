<?php
App::uses('AppModel', 'Model');

Class Application extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Position'
		);

	public function beforeSave($options = array()) {
		return true;
	}
}
?>
