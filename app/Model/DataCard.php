<?php
App::uses('AppModel', 'Model');

Class DataCard extends AppModel {

	public $useTable = false;

	public function compare($applicant_card, $position_card) {
		//compare function stuff
		$total = $match = $percent = 0.0;

		foreach($position_card['DataCard']['Function'] as $function) {
			$total++;
			
		}
		foreach($position_card['DataCard']['Industry'] as $industry) {
			$total++;
		}
		foreach($position_card['DataCard']['Skill'] as $skill) {
			$total++;
		
		}

		return array('total' => $total, 'match' => $match, 'percent' => $percent);
	}
}
?>
