<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'userId'
		)
	);

	public $primaryKey = 'userId';

	public $virtualFields = array(
		'displayName' => "CONCAT(Applicant.firstName, ' ', Applicant.mi, '. ' , Applicant.lastName)"
	);

	public function checkDisplayName() {
		if(empty($this->data['Applicant']['displayName'])) {
			$this->data['Applicant']['displayName'] = $this->Applicant->data['User']['email'];
		}
	}
}
?>
