<?php debug($education); ?>
<tr>
	<td><?php echo $education['Certification']['education_name']; ?></td>
	<td><?php echo $education['Certification']['organization']; ?></td>
	<td><?php echo $education['Certification']['earned_date']; ?></td>
	<td><?php echo $education['Certification']['expiration_date']; ?></td>
	<td><?php echo $this->Form->create('Certification', array(
		'url' => '/educations/delete/'. $education['Certification']['id'],
		'method' => 'post',
		'id' => 'deleteCertification_'. $education['Certification']['id']
		));
		echo $this->Form->submit('X', array(
			'class' => 'btn btn-warning'));
		echo $this->Form->end(); ?>
	</td>
</tr>
