<?php
App::uses('AppModel', 'Model');

Class PersonalityQuestion extends AppModel {
	public $hasMany = array(
		'PersonalityQuestionAnswer'
	);
}
?>
