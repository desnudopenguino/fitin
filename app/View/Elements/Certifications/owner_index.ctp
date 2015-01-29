<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Certifications 
			<?php //tooltip
				echo $this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip pull-right',
					'style' => 'padding-top: 0.25em; padding-left:0.25em;',
					'title' => 'If your certificate doesn\'t expire, leave that part blank.'
				));
			?>
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createCertificationModal"><i class="glyphicon glyphicon-plus"></i> Create Certification </button>
		</h2>
			<?php echo $this->element('Certifications/owner_table'); ?>
	</div>
</div>
<?php echo $this->element('Certifications/add'); ?>
<?php echo $this->Html->script('certification'); ?>
