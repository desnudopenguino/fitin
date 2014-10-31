<tr>
	<td><?php echo $certification['certification_name']; ?></td>
	<td><?php echo $certification['organization']; ?></td>
	<td><?php echo $certification['earned_date']; ?></td>
	<td><?php echo $certification['expiration_date']; ?></td>
	<td><?php echo $this->Form->postLink('X', 
		array(
			'controller' => 'certifications',
			'action' => 'delete', $certification['Certification']['id']),
		array('confirm' => 'Are you sure?')); ?>
	</td>
</tr>
