<?php debug($application); ?>
<div class="col-md-12 well">
	<h3><?php echo $application['Application']['Position']['title']; ?></h3>
	<p>Job Match: <?php echo $application['Results']['percent']; ?>% 
Culture Match: <?php echo $application['Culture']['Total']['percent']; ?>%</p>
	<div class="row">
		<div class="col-md-4">
			View Position
		</div>
		<div class="col-md-4">
			Cancel Application
		</div>
		<div class="col-md-4">
			Contact Employer
		</div>
	</div>
</div>
