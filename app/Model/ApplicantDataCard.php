<?php
App::uses('AppModel', 'Model');

Class ApplicantDataCard extends AppModel {
	public $belongsTo = array(
		'Applicant');

	public $useTable = NULL;
//	public $useTable = false;

	public $education = array(); //list of educations

	public $certification = array(); //list of certifications;

	public $work_experience = array( 
		'industries' => array(),
		'functions' => array(),
		'skills' => array()); //framework for measurable job experience

	public $_schema = array(

	);

}
?>
