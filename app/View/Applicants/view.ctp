<?php debug($applicant); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2><?php echo $applicant['display_name']; ?></h2>
			<p>Phone:
				<?php echo $applicant['User']['PhoneNumber']['phone_number']; ?>
			</p>
			<p>
				<?php echo $applicant['User']['Address']['city']; ?>, <?php echo $applicant['User']['Address']['State']['short_name']; ?> <?php echo $applicant['User']['Address']['zip']; ?>
			</p>
			<p><?php echo $applicant['User']['email']; ?></p>
		</div>
		<?php if(isset($culture)) { ?>
		<div class="well">
			<?php echo $this->element('Culture/index'); ?>
		</div>	
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
