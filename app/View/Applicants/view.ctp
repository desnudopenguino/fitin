<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php echo $applicant['Applicant']['display_name']; ?></h2>
		<p>Phone:
			<?php echo $applicant['PhoneNumber']['phone_number']; ?>
		</p>
		<p>
			<?php echo $applicant['Address']['city']; ?>, <?php echo $applicant['Address']['state']; ?> <?php echo $applicant['Address']['zip']; ?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php echo $this->element('Projects/index'); ?>
		<?php echo $this->element('Educations/index'); ?>
		<?php echo $this->element('Certifications/index'); ?>
	</div>
</div>
