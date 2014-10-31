<tr>
	<td><?php echo $certification['Certification']['certification_name']; ?></td>
	<td><?php echo $certification['Certification']['organization']; ?></td>
	<td><?php echo $certification['Certification']['earned_date']; ?></td>
	<td><?php echo $certification['Certification']['expiration_date']; ?></td>
	<td><?php echo $this->Form->postLink('X', 
		array(
			'controller' => 'certifications',
			'action' => 'delete', $certification['Certification']['id']),
		array('confirm' => 'Are you sure?')); ?>
	</td>
	<td><?php echo $this->Form->create('Certification', array(
		'url' => '/certifications/delete/'. $certification['Certification']['id'],
		'method' => 'post',
		));
		echo $this->Form->submit('X', array(
			'class' => 'btn btn-warning'));
		echo $this->Form->end(); ?>
	</td>
</tr>
