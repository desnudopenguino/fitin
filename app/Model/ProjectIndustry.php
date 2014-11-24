<?php
App::uses('AppModel', 'Model');

Class ProjectIndustry extends AppModel {
	public $belongsTo = array(
		'Project',
		'Industry' );
}
?>
