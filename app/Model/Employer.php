<?php
App::uses('AppModel', 'Model');

Class Employer extends AppModel {

	public $belongsTo = array(
		'User','Organization' );

	public $primaryKey = 'user_id';

	public $hasOne = array(
		);

	public $hasMany = array(
		);

	public $virtualFields = array(
		'display_name' => 'Organization.organization_name');

	public function checkDisplayName() {
		if(empty($this->data[$this->alias]['display_name'])) {
			$this->data[$this->alias]['display_name'] = $this->data['User']['email'];
		} 
	}

}
?>
