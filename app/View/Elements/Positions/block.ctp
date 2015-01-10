<div id="position_<?php echo $position['id']; ?>" class="panel panel-default">
<?php debug($position); ?>
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
				<h3>Education</h3>
					<p>
						<?php echo $degrees[$position['min_degree']]['degree_type']; ?> to
						<?php echo $degrees[$position['max_degree']]['degree_type']; ?>
					</p>
				<h3>Industry</h3>
				<?php  foreach($position['PositionIndustry'] as $positionIndustry) {
					if(!empty($positionIndustry['industry_id'])) { ?>
					 <p><?php echo $positionIndustry['Industry']['industry_type']; ?></p>
					<?php }
				} ?>
				<h3>Functions</h3>
				<?php  foreach($position['PositionFunction'] as $positionFunction) {
					if(!empty($positionFunction['work_function_id'])) { ?>
					 <p><?php echo $positionFunction['WorkFunction']['function_type']; ?></p>
					<?php }
				} ?>
				<h3>Skills</h3>
				<?php $end = count($position['PositionSkill']) - 1;
					foreach($position['PositionSkill'] as $sKey => $positionSkill) {
						echo $positionSkill['Skill']['skill_type'];
						if($sKey != $end) {
							echo ", ";
						}
				} ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('Positions/edit'); ?>
</div>
