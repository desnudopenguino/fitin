<div id="project_<?php echo $project['id']; ?>" class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<?php echo $project['title']; ?> at
			<?php echo $project['Organization']['organization_name']; ?>
			<span class="smaller pull-right">
				<?php echo $project['start_date']; ?> - 
				<?php echo $project['end_date']; ?>
				
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProjectModal_<?php echo $project['id']; ?>" style="margin-left: 1em;"><i class="glyphicon glyphicon-edit"></i></button>
				<?php echo $this->Form->create('Project', array(
						'url' => '/projects/delete/'. $project['id'],
						'method' => 'post',
						'id' => 'deleteProject_'. $project['id'],
						'style' => 'display: inline;'
					));
					echo $this->Form->button('<i class="glyphicon glyphicon-trash"></i>', array(
						'class' => 'btn btn-warning btn-sm',
						'type' => 'submit'));
					echo $this->Form->end(); ?>
			</span>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h3>Responsibilities</h3>
				<p><?php echo $project['responsibilities']; ?></p>
				<?php if(!empty($project['website'])) {?>
					 <p><a href="<?php echo $project['website']; ?>">Website</a></p>
				<?php } ?>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<h3>Industry</h3>
				<?php foreach($project['ProjectIndustry'] as $projectIndustry) { 
					if(!empty($projectIndustry['industry_id'])) {?>
						 <p><?php echo $projectIndustry['Industry']['industry_type']; ?></p>
				<?php }
					} ?>
				<h3>Functions</h3>
				<?php foreach($project['ProjectFunction'] as $projectFunction) {
					if(!empty($projectFunction['work_function_id'])) {?>
					 <p><?php echo $projectFunction['WorkFunction']['function_type']; ?></p>
				<?php } 
					} ?>
				<h3>Skills</h3>
				<?php $end = count($project['ProjectSkill']) - 1;
					foreach($project['ProjectSkill'] as $sKey => $projectSkill) {
					echo $projectSkill['Skill']['skill_type'];
					if($sKey != $end) {
						echo ", ";
					}
				} ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('Projects/edit'); ?>
</div>
