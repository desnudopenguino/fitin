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
	<class="panel-body">
		<div class="row">
			<div class="col-md-6">
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
	<?php debug($project); ?>
