<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<?php debug($applicant_card); ?>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php 
			foreach($position_cards as $position_card) {
				$this->set('position_card', $position_card);
				echo $this->element('Employers/search');
			} ?>
	</div>
</div>
