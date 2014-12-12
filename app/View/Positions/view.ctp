<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>
			<?php echo $position['Position']['title'] ." in ". $position['Position']['Employer']['department_name'] ." department at ". $position['Position']['Employer']['Company']['Organization']['organization_name']; ?>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h3>Position Info:</h3>
		<p><strong>Responsibilities</strong> <?php echo $position['responsibilities']; ?></p>
		<div class="row">
			<div class="col-md-4">
				<h4>Industries:</h4>
			</div>
			<div class="col-md-4">
				<h4>Functions:</h4>
			</div>
			<div class="col-md-4">
				<h4>Skills:</h4>
			</div>
		</div>	
		<h3>Department Info:</h3>
		<p>
			<?php echo $position['Position']['Employer']['department_name']; ?>
		</p>
		<h3>Company Info:</h3>
		<p>
			<?php echo $position['Position']['Employer']['Company']['description']; ?>
		</p>
	</div>
</div>
<?php debug($position); ?>
