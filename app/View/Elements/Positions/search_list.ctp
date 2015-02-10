<?php 
	if(empty($position_cards)) {
		echo "<h2>Sorry, no positions fitting your requirements yet! Check back soon.</h2>";
	} else {
		foreach($position_cards as $position_card) {
			$this->set('position_card', $position_card);
			echo $this->element('Positions/search');
		}
	} ?>
