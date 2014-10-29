<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Certifications
			<?php echo $this->Html->link('Create Certification', array(
				'controller' => 'certifications', 'action' => 'add'),
				array( 'class' => 'btn btn-primary pull-right', 'role' => 'button')); ?>
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createCertification">Create Certification</button>				
			</h2>
		<table class="table table-striped">
			<tr>
				<th>Certification</th>
				<th>Organization</th>
				<th>Earned</th>
				<th>Expires</th>
			</tr>
			<?php foreach($certifications as $certification) { ?>
			<tr>
				<td><?php echo $certification['Certification']['certification_name']; ?></td>
				<td><?php echo $certification['Certification']['organization']; ?></td>
				<td><?php echo $certification['Certification']['earned_date']; ?></td>
				<td><?php echo $certification['Certification']['expiration_date']; ?></td>
			</tr> 
			<?php } ?>
		</table>
	</div>
</div>
<?php echo $this->element('Certifications/add'); ?>
