<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<h2><?php echo $company['Company']['Organization']['organization_name']; ?></h2>
		<p><?php echo $company['Company']['description']; ?></p>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<h2>Department List</h2>
		<?php foreach($company['Company']['Organization']['Employer'] as $employer) { 
			
		} ?>
	</div>
</div>
<?php debug($company); ?>
