<?php debug($applicant); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php 
				echo $applicant['Applicant']['display_name']; ?><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array(
					'controller' => 'applicants', 'action' => 'edit', $applicant['User']['id']),
					array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</h2>
		<p>Phone:
			<?php echo $applicant['User']['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $applicant['User']['Address']['street']; ?><br>
			<?php echo $applicant['User']['Address']['city']; ?>, <?php echo $applicant['User']['Address']['State']['short_name']; ?> <?php echo $applicant['User']['Address']['zip']; ?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
		<p><?php echo $this->Html->link("My URL",
			"/with/".$applicant['User']['url']); ?></p>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php echo $this->element('Projects/owner_index'); ?>	
		<?php echo $this->element('Educations/owner_index'); ?>	
		<?php echo $this->element('Certifications/owner_index'); ?>	
	</div>
</div>
<?php echo $this->Html->script('general'); ?>
