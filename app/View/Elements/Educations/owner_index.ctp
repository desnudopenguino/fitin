<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Certifications
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createCertificationModal">Create Certification</button>
		</h2>
			<?php echo $this->element('Certifications/owner_table'); ?>
	</div>
</div>
<?php echo $this->element('Certifications/add'); ?>
