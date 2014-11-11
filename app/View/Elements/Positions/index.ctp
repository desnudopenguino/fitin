<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingPositions">
		<a data-toggle="collapse" data-parent="#resume" href="#collapsePositions" aria-expanded="true" aria-controls="collapsePositions">Positions</a>
	</div>
	<div id="collapsePositions" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPositions">
		<div class="panel-body">
			<?php foreach($positions as $position) { 
				$this->set('position', $position); ?>
			<div class="well">
				<?php echo $position['Position']['title']; ?> at
				<?php echo $position['Organization']['organization_name']; ?>
				<span class="smaller pull-right">
					<?php echo $position['Position']['start_date']; ?> - 
					<?php echo $position['Position']['end_date']; ?>
				</span>
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<h3>Responsibilities</h3>
						<p><?php echo $position['Position']['responsibilities']; ?></p>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<h3>Industry</h3>
						<h3>Functions</h3>
						<h3>Skills</h3>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
