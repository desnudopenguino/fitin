<?php 
	foreach($position_cards as $position_card) {
		$this->set('position_card', $position_card);
		echo $this->element('Positions/search');
	} ?>
