<?php
App::uses('AppModel', 'Model');

Class ProjectIndustry extends AppModel {
	public $belongsTo = array(
		'Project',
		'Industry' );
}

	public function beforeSave($options = array()) {
		if(empty($this->data['ProjectIndustry']['industry_id'])) {
			return false;
		} else { return true; }
	}
?>
