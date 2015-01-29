<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Education 
			<?php //tooltip
				echo $this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip pull-right',
					'style' => 'padding-top: 0.25em; padding-left:0.25em;',
					'title' => 'High School? Some College?'
				));
			?>
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEducationModal"><i class="glyphicon glyphicon-plus"></i> Create Education </button>
		</h2>
			<?php echo $this->element('Educations/owner_table'); ?>
	</div>
</div>
<?php echo $this->element('Educations/add'); ?>
<?php echo $this->Html->script('education'); ?>
