<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	public $primaryKey = 'user_id';

	public $hasMany = array(
		'Certification' => array(
			'className' => 'Certification'
	));

	public $virtualFields = array(
		'display_name' => "CONCAT(Applicant.first_name, ' ', Applicant.mi, ' ' , Applicant.last_name)"
	);

	public function checkDisplayName() {
		if(empty($this->data['Applicant']['display_name'])) {
			$this->data['Applicant']['display_name'] = $this->data['User']['email'];
		} 
	}
}
?>
