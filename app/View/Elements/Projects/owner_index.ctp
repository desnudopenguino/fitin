<div class="row panel panel-default">
	<div class="panel-heading">
		<h2>Work Experience &amp; Projects
			<?php //tooltip
				echo $this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip pull-right',
					'style' => 'padding-top: 0.25em; padding-left:0.25em;',
					'title' => 'Build your resume. Work experience, internships, Co-ops, and school projects go here.'
				));
			?>
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createProjectModal"><i class="glyphicon glyphicon-plus"></i> Create Project </button>
		</h2>
	</div>
	<div class="panel-body" id="projects">
			<?php foreach($projects as $project) { 
				$this->set('project', $project);
 				echo $this->element('Projects/block'); 
				} ?>
	</div>
</div>
<?php echo $this->element('Projects/add'); ?>
<?php echo $this->Html->script('project'); ?>
