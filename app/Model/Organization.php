<?php
App::uses('AppModel', 'Model');

Class Organization extends AppModel {
	public $belongsTo = array(
		'OrganizationType' => array(
			'className' => 'OrganizationType'
		),
		'Project'
	);
}
?>
