<?php
App::uses('AppModel', 'Model');

Class DataCard extends AppModel {

	public $useTable = false;

	public function compare($applicant_card, $position_card) {
		debug(array('ApplicantCard' => $applicant_card,
			'PositionCard' => $position_card));
	}
}
?>
