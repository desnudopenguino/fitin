<?php
App::uses('AppModel', 'Model');

Class PersonalityQuestionType extends AppModel {
	public $hasMany = array(
		'PersonalityQuestion'
	);
}
?>
