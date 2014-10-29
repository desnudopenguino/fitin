<?php
App::uses('AppModel', 'Model');

Class Certificate extends AppModel {

	public $belongsTo = array(
		'Applicant' => array(
			'className' => 'Applicant'
		)
	);
}
?>
