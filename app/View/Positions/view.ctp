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
