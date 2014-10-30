<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Certifications
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createCertification">Create Certification</button>				
		</h2>
		<div class="certifications">
			<?php echo $this->element('Certifications/owner_table'); ?>
		</div>
	</div>
</div>
<?php echo $this->element('Certifications/add'); ?>
