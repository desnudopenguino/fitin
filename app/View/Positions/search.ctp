<?php debug($applicant_cards);
	foreach($applicant_cards as $applicant_card) {
		$this->set('applicant_card', $applicant_card);
		$this->element('Applicants/search');
	} ?>
