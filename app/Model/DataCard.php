<?php
App::uses('AppModel', 'Model');

Class DataCard extends AppModel {

	public $useTable = false;

	public function compare($applicant_card, $position_card) {
		//compare function stuff
		$total = $match = $percent = 0.0;

		foreach($position_card['DataCard']['Function'] as $position_function) {
			$total++;
			foreach($applicant_card['DataCard']['Function'] as $applicant_function) {
				if($position_function['id'] == $applicant_function['id']) {
					$match++;
					$total++;
				}
			}
		}
		foreach($position_card['DataCard']['Industry'] as $position_industry) {
			$total++;
			foreach($applicant_card['DataCard']['Industry'] as $applicant_industry) {
				if($position_industry['id'] == $applicant_industry['id']) {
					$match++;
					$total++;
				}
			}
		}
		foreach($position_card['DataCard']['Skill'] as $position_skill) {
			$total++;
			foreach($applicant_card['DataCard']['Skill'] as $applicant_skill) {
				if($position_skill['id'] == $applicant_skill['id']) {
					$match++;
					$total++;
				}
			}
		}

		return array('total' => $total, 'match' => $match, 'percent' => $percent);
	}
}
?>
