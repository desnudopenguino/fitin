<div id="position_<?php echo $position['id']; ?>" class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<?php echo $position['title']; ?>
			<span class="smaller pull-right">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPositionModal_<?php echo $position['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
				<?php echo $this->Form->create('Position', array(
						'url' => '/positions/delete/'. $position['id'],
						'method' => 'post',
						'id' => 'deletePosition_'. $position['id'],
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
				<p><?php echo $position['responsibilities']; ?></p>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<h3>Experience</h3>
					<p>
						<?php echo $position['min_work_experience']; ?> to
						<?php echo $position['max_work_experience']; ?> years of experience
					</p>
				<h3>Industry</h3>
				<?php  foreach($position['PositionIndustry'] as $positionIndustry) {
					 echo $positionIndustry['Industry']['industry_type']; 
				} ?>
				<h3>Functions</h3>
				<?php  foreach($position['PositionFunction'] as $positionFunction) {
					 echo $positionFunction['WorkFunction']['function_type']; 
				} ?>
				<h3>Skills</h3>
				<?php foreach($position['PositionSkill'] as $positionSkill) {
					 echo $positionSkill['Skill']['skill_type']; 
				} ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('Positions/edit'); ?>
</div>
