<?php
App::uses('AppModel', 'Model');

Class PersonalityQuestionAnswer extends AppModel {
	public $belongsTo = array(
		'PersonalityQuestion');

	public $hasMany = array(
		'ApplicantPersonalityAnswer');
}
?>
