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

}
?>
