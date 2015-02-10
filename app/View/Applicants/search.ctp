<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<?php echo $this->Form->create('Applicant', array(
				'action' => 'search',
				'method' => 'post',
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'id' => 'searchApplicantForm'
				)); ?>
			<fieldset>
				<?php echo $this->Form->input('Search.distance', array(
						'type' => 'number',
						'value' => $search['distance'],
						'label' => 'Search Distance'));

					echo $this->Form->input('Search.scale', array(
						'type' => 'select',
						'label' => 'Scale',
						'value' => $search['scale'],
						'options' => array('3959' => 'Miles', '6371' => 'Kilometers')));
					
					echo $this->Form->input('Search.job', array(
						'type' => 'number',
						'value' => $search['job'],
						'label' => 'Job Match %'));

					echo $this->Form->input('Search.culture', array(
						'type' => 'number',
						'value' => $search['culture'],
						'label' => 'Culture Match %'));
				?>

			</fieldset>	
			<?php echo $this->Form->submit('submit', array(
				'div' => 'form-group',
				'class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="well">
			<?php echo $this->element('Applicants/dataCard'); ?>
		</div>
	</div>
	<div id="results" class="col-md-6 col-md-offset-1">
		<?php 
			foreach($position_cards as $position_card) {
				$this->set('position_card', $position_card);
				echo $this->element('Positions/search');
			} ?>
	</div>
</div>
<?php echo $this->Html->script('applicant_search'); ?>
