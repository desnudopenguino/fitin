<?php
App::uses('AppModel', 'Model');

Class CultureQuestionType extends AppModel {
	public $hasMany = array(
		'CultureQuestion'
	);
}
?>
