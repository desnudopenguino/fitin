<?php
App::uses('AppModel', 'Model');

Class School extends AppModel {
	public $hasMany = array(
		'Education' => array(
			'className' => 'Education'
		)
	);

// function to check if the school already exists, returns true if the school is unique, or false if it already exists
	public function checkUniqueName($school_name) {
		if($this->hasAny(array('School.school_name' => $this->request->data['School']['school_name']))) {
			return false;
		} else {
			return true;
		}
	}
}
?>
