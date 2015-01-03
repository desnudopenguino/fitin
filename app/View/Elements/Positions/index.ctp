<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingPositions">
		<a data-toggle="collapse" data-parent="#resume" href="#collapsePositions" aria-expanded="true" aria-controls="collapsePositions">Positions</a>
	</div>
	<div id="collapsePositions" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPositions">
		<div class="panel-body">
			<?php foreach($positions as $position) { 
				$this->set('position', $position); ?>
			<div id="position_<?php echo $position['id']; ?>" class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<?php echo $position['title']; ?>
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
			</div>
		<?php } ?>
		</div>
	</div>
</div>
