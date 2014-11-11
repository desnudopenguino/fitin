<?php
App::uses('AppModel', 'Model');

Class PositionIndustry extends AppModel {
	public $belongsTo = array(
		'Position',
		'Industry' );
}
?>
