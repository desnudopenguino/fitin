<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<?php echo $this->element('Applicants/dataCard'); ?>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php 
			foreach($position_cards as $position_card) {
				$this->set('position_card', $position_card);
				echo $this->element('Positions/search');
			} ?>
	</div>
</div>
<?php echo $this->Html->script('applicant_search'); ?>
