<?php
App::uses('AppModel', 'Model');

Class ProjectFunction extends AppModel {
	public $belongsTo = array(
		'Project',
		'WorkFunction' );
}
?>
