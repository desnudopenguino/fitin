<tr>
	<td><?php echo $certification['Certification']['certification_name']; ?></td>
	<td><?php echo $certification['Certification']['organization']; ?></td>
	<td><?php echo $certification['Certification']['earned_date']; ?></td>
	<td><?php echo $certification['Certification']['expiration_date']; ?></td>
	<td><button type="button" class="btn btn-primaly" data-toggle="modal" data-target="#editCertificationModal_<?php echo $certification['Certification']['id']; ?>">Edit</button></td>
	<td><?php echo $this->Form->create('Certification', array(
		'url' => '/certifications/delete/'. $certification['Certification']['id'],
		'method' => 'post',
		'id' => 'deleteCertification_'. $certification['Certification']['id']
		));
		echo $this->Form->submit('X', array(
			'class' => 'btn btn-warning'));
		echo $this->Form->end(); ?>
	</td>
</tr>
