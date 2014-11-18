<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
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
		<?php if(!empty($position_card)) { ?>
		<div id="position-data">
			<?php debug($position_card); ?>	
		</div>
		<?php } ?>
	</div>
	<div id="results" class="col-md-6 col-md-offset-1">
		<?php if(!empty($applicant_cards)) { ?>
		<?php debug($applicant_cards); ?>	
		<?php } ?>
	</div>
</div>
