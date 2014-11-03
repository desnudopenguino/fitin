<?php
App::uses('AppModel', 'Model');

Class Education extends AppModel {
	public $belongsTo = array(
		'Applicant','Degree','School','Concentration'
	);
}
?>
