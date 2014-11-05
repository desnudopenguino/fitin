<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingProjects">
		<a data-toggle="collapse" data-parent="#resume" href="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">Projects</a>
	</div>
	<div id="collapseProjects" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProjects">
		<div class="panel-body">
			<?php foreach($projects as $project) { 
				$this->set('project', $project); ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<?php echo $project['Project']['title']; ?> at
						<?php echo $project['Organization']['organization_name']; ?>
						<span class="smaller pull-right">
							<?php echo $project['Project']['start_date']; ?> - 
							<?php echo $project['Project']['end_date']; ?>
						</span>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<h3>Responsibilities</h3>
							<p><?php echo $project['Project']['responsibilities']; ?></p>
					</div>
						<div class="col-md-5 col-md-offset-1">
							<h3>Industry</h3>
							<h3>Functions</h3>
							<h3>Skills</h3>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
