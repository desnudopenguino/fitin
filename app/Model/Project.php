<?php
App::uses('AppModel', 'Model');

Class Project extends AppModel {
	public $belongsTo = array(
		'Applicant',
		'Organization'
	);

}
?>
