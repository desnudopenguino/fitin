<?php
App::uses('AppModel', 'Model');

Class ApplicantDataCard extends AppModel {
	public $belongsTo = array(
		'Applicant');

	public $useTable = false;

}
?>
