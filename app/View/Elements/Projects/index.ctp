<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingProjects">
		<a data-toggle="collapse" data-parent="#resume" href="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">Projects</a>
	</div>
	<div id="collapseProjects" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProjects">
		<div class="panel-body">
			<?php foreach($projects as $project) { 
				$this->set('project', $project); ?>
			<div class="well">
				<?php echo $project['title']; ?> at
				<?php echo $project['Organization']['organization_name']; ?>
				<span class="smaller pull-right">
					<?php echo $project['start_date']; ?> - 
					<?php echo $project['end_date']; ?>
				</span>
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<h3>Responsibilities</h3>
						<p><?php echo $project['responsibilities']; ?></p>
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
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
