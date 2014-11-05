<?php
App::uses('AppModel', 'Model');

Class OrganizationType extends AppModel {
	public $hasMany = array(
		'Organization' => array(
			'className' => 'Organization'
		)
	);
}
?>
