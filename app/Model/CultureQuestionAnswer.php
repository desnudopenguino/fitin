<?php
App::uses('AppModel', 'Model');

Class CultureQuestionAnswer extends AppModel {
	public $belongsTo = array(
		'CultureQuestion');

	public $hasMany = array(
		'UserCultureAnswer');
}
?>
