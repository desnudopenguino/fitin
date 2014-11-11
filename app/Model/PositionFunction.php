<?php
App::uses('AppModel', 'Model');

Class PositionFunction extends AppModel {
	public $belongsTo = array(
		'Position',
		'WorkFunction' );
}
?>
