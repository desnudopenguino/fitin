<?php
App::uses('AppModel', 'Model');

Class PositionDataCard extends AppModel {
	public $belongsTo = array(
		'Position');

	public $useTable = false;

}
?>
