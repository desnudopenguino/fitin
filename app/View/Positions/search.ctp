<?php
	if(empty($applicant_cards)) {
		echo "<h2>Sorry, no applicants fitting your requirements yet! Check back soon.</h2>";
	} else {
		foreach($applicant_cards as $applicant_card) {
			$this->set('applicant_card', $applicant_card);
			echo $this->element('Applicants/search');
		}
	} ?>
