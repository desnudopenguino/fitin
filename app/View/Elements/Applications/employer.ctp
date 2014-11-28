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
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-remove"></i>Cancel', array('controller' => 'applications', 'action' => 'cancel', $application['Application']['id']),array(
				'class' => 'btn btn-warning cancel',
				'id' => 'cancel_'. $application['Application']['id'],
				'escape' => false)); ?>
		</div>
		<div class="col-md-4">
			Contact Employer
		</div>
	</div>
</div>
