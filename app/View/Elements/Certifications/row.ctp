<tr>
	<td><?php echo $certification['Certification']['certification_name']; ?></td>
	<td><?php echo $certification['Certification']['organization']; ?></td>
	<td><?php echo $certification['Certification']['earned_date']; ?></td>
	<td><?php echo $certification['Certification']['expiration_date']; ?></td>
	<td>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCertificationModal_<?php echo $certification['Certification']['id']; ?>">Edit</button>
		<?php echo $this->element('Certifications/edit'); ?>
	</td>
	<td><?php echo $this->Form->create('Certification', array(
		'url' => '/certifications/delete/'. $certification['Certification']['id'],
		'method' => 'post',
		'id' => 'deleteCertification_'. $certification['Certification']['id']
		));
		echo $this->Form->button('<i class="glyphicon glyphicon-trash"></i>', array(
			'class' => 'btn btn-warning',
			'type' => 'submit'));
		echo $this->Form->end(); ?>
	</td>
</tr>
