<div class="col-md-12 well" id="application_<?php echo $application['Application']['id']; ?>">
	<h3><?php echo $application['Application']['Position']['title']; ?></h3>
	<p>Job Match: <?php echo $application['Results']['percent']; ?>% 
Culture Match: <?php echo $application['Culture']['Total']['percent']; ?>%</p>
	<div class="row">
		<div class="col-md-4">
			View Position
		</div>
		<div class="col-md-4">
			Contact Employer
			<?php
				echo $this->Form->create('Message', array(
					'action' => 'compose'));

				echo $this->Form->input('receiver_id', array(
					'type' => 'hidden',
					'value' => $application['Application']['Position']['employer_id']));

				echo $this->Form->input('title', array(
					'type' => 'hidden',
					'value' => $application['Application']['Position']['title']));

				echo $this->Form->button('<i class="glyphicon glyphicon-envelope"></i> Message', array(
					'class' => 'btn btn-primary',
					'type' => 'submit'));

				echo $this->Form->end(); 
			?>
		</div>
		<div class="col-md-4">
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-remove"></i>Cancel', array('controller' => 'applications', 'action' => 'cancel', $application['Application']['id']),array(
				'class' => 'btn btn-warning cancel',
				'id' => 'cancel_'. $application['Application']['id'],
				'escape' => false)); ?>
		</div>
	</div>
</div>
