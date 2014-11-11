<?php
App::uses('AppModel', 'Model');

Class ApplicantPersonalityAnswer extends AppModel {
	public $belongsTo = array(
		'PersonalityQuestion',
		'Applicant',
		'PersonalityQuestionAnswer');
}
?>
