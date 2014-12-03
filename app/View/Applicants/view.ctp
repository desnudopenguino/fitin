<?php
	$this->set('projects', $applicant['Project']);
	$this->set('educations', $applicant['Education']);
	$this->set('certifications', $applicant['Certification']);?>
<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2><?php echo $applicant['Applicant']['display_name']; ?></h2>
			<p>Phone:
				<?php echo $applicant['User']['PhoneNumber']['phone_number']; ?>
			</p>
			<p>
				<?php echo $applicant['User']['Address']['city']; ?>, <?php echo $applicant['User']['Address']['State']['short_name']; ?> <?php echo $applicant['User']['Address']['zip']; ?>
			</p>
			<p><?php echo $applicant['User']['email']; ?></p>
		</div>
		<?php if(isset($culture)) { ?>
			<?php echo $this->element('Culture/profile'); ?>
		<?php } ?>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<div class="panel-group" id="resume" role="tablist" aria-multiselectable="true">
			<?php echo $this->element('Projects/index'); ?>
			<?php echo $this->element('Educations/index'); ?>
			<?php echo $this->element('Certifications/index'); ?>
		</div>
	</div>
</div>
