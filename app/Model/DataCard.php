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
					if($position_card['DataCard']['MinimumExperience'] <= $applicant_function['totalDuration'] &&
						$position_card['DataCard']['MaximumExperience'] >= $applicant_function['totalDuration']) {
						$match++;
					}
				}
			}
		}
		foreach($position_card['DataCard']['Industry'] as $position_industry) {
			$total++;
			foreach($applicant_card['DataCard']['Industry'] as $applicant_industry) {
				if($position_industry['id'] == $applicant_industry['id']) {
					$match++;
					$total++;
					if($position_card['DataCard']['MinimumExperience'] <= $applicant_industry['totalDuration'] &&
						$position_card['DataCard']['MaximumExperience'] >= $applicant_industry['totalDuration']) {
						$match++;
					}
				}
			}
		}
		foreach($position_card['DataCard']['Skill'] as $position_skill) {
			$total++;
			foreach($applicant_card['DataCard']['Skill'] as $applicant_skill) {
				if($position_skill['id'] == $applicant_skill['id']) {
					$match++;
					$total++;
					if($position_card['DataCard']['MinimumExperience'] <= $applicant_skill['totalDuration'] &&
						$position_card['DataCard']['MaximumExperience'] >= $applicant_skill['totalDuration']) {
						$match++;
					}
				}
			}
		}

		$percent = round($match / $total, 2) * 100;

		return array('total' => $total, 'match' => $match, 'percent' => $percent);
	}

	public function sortByJobMatch($data_cards) {
		$sort_array = array();
		
		foreach($data_cards as $data_card) {
			$sort_array[$data_card['Info']['id']] = $data_card['Results']['percent'];
		}

		asort($sort_array);

		$return_array = array();

		foreach($sort_array as $sKey => $value) {
			foreach($data_cards as $dKey => $data_card) {
				if($sKey == $data_card['Info']['id']) {
					$return_array[] = $data_card;
					unset($data_cards[$dKey];
				}
			}
		}

debug($return_array);
//		return $return_array;
	}
}
?>
