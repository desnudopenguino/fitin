<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Projects
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createProjectsModal"><i class="glyphicon glyphicon-plus"></i> Create Project</button>
		</h2>
			<?php echo $this->element('Projects/owner_table'); ?>
	</div>
</div>
<?php echo $this->element('Projects/add'); ?>
