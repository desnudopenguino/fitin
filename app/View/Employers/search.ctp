<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2>Search
			<?php //tooltip
				echo $this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip',
					'title' => 'Matches are shown based on your different job listings. Select your position and search for your best matches. Matches are based off of job listings and culture preferences.'
				));
			?>
			</h2>
			<?php echo $this->Form->create('Position', array(
				'action' => 'search',
				'method' => 'post',
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'id' => 'searchPositionForm'
				)); ?>
			<fieldset>
				<?php echo $this->Form->input('Position.id', array(
					'type' => 'select',
					'label' => 'Position',
					'options' => $positions)); 

					echo $this->Form->input('Search.distance', array(
						'type' => 'number',
						'label' => 'Search Distance'));

					echo $this->Form->input('Search.scale', array(
						'type' => 'select',
						'label' => 'Scale',
						'options' => array('3959' => 'Miles', '6371' => 'Kilometers')));
					
					echo $this->Form->input('Search.job', array(
						'type' => 'number',
						'label' => 'Job Match %'));

					echo $this->Form->input('Search.culture', array(
						'type' => 'number',
						'label' => 'Culture Match %'));
				?>

			</fieldset>	
			<?php echo $this->Form->submit('submit', array(
				'div' => 'form-group',
				'class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
		<div id="position-data" class="well">
			<?php if(!empty($position_card)) {
				$this->set('position_card', $position_card);
				echo $this->element('Positions/dataCard');
			} else { echo "Select a position"; } ?>
		</div>
	</div>
	<div id="results" class="col-md-6 col-md-offset-1">
		<?php if(!empty($applicant_cards)) {
				foreach($applicant_cards as $applicant_card) {
					$this->set('applicant_card', $applicant_card);
					echo $this->element('Applicants/search');
				}
		} ?>
	</div>
</div>
<?php echo $this->Html->script('employer_search'); ?>
