<?php
App::uses('AppModel', 'Model');

Class Organization extends AppModel {
	public $belongsTo = array('OrganizationType');

	public $hasMany = array('Project');
}
?>
