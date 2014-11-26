<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2>Search</h2>
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
					'options' => $positions)); ?>
			</fieldset>	
			<?php echo $this->Form->submit('submit', array(
				'div' => 'form-group',
				'class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
		<div id="position-data" class="well">
			<?php if(!empty($position_card)) {
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
