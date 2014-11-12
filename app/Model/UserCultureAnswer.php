<?php
App::uses('AppModel', 'Model');

Class UserCultureAnswer extends AppModel {
	public $belongsTo = array(
		'CultureQuestion',
		'User',
		'CultureQuestionAnswer');
}
?>
