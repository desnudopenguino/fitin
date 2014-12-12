<div class="row">
	<div class="col-md-12">
		<h2>
			<?php echo $position['Position']['title'] ." in ". $position['Position']['Employer']['department_name'] ." department at ". $position['Position']['Employer']['Company']['Organization']['organization_name']; ?>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		Position Info
		Department Info
		Company Info
	</div>
</div>
<?php debug($position); ?>
