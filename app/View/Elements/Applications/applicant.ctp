<?php debug($application); ?>
<div class="col-md-12 well" id="application_<?php echo $application['Application']['id']; ?>">
	<h3><?php echo $application['Application']['Applicant']['display_name']; ?></h3>
	<p>Job Match: <?php echo $application['Results']['percent']; ?>% 
Culture Match: <?php echo $application['Culture']['Total']['percent']; ?>%</p>
	<div class="row">
		<div class="col-md-4">
			<?php echo $this->Html->link('View Profile',
				'/with/'.$application['Application']['Applicant']['user_id'], array(
				'class' => 'btn btn-primary',
				'escape' => false));
			?>
		</div>
		<div class="col-md-4">
			<?php
				echo $this->Form->create('Message', array(
					'action' => 'compose',
					'class' => 'form-inline'));

				echo $this->Form->input('receiver_id', array(
					'type' => 'hidden',
					'value' => $application['Application']['applicant_id']));

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
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-remove"></i>Decline', array('controller' => 'applications', 'action' => 'decline', $application['Application']['id']),array(
				'class' => 'btn btn-warning cancel',
				'id' => 'cancel_'. $application['Application']['id'],
				'escape' => false)); ?>
		</div>
	</div>
</div>
