<tr>
	<td><?php echo $education['Degree']['degree_type']; ?></td>
	<td><?php echo $education['Concentration']['concentration_type']; ?></td>
	<td><?php echo $education['School']['school_name']; ?></td>
	<td><?php echo $education['Education']['graduation_date']; ?></td>
	<td><?php echo $education['Education']['gpa']; ?></td>
	<td><?php echo $this->Form->create('Education', array(
		'url' => '/educations/delete/'. $education['Education']['id'],
		'method' => 'post',
		'id' => 'deleteEducation_'. $education['Education']['id']
		));
		echo $this->Form->submit('X', array(
			'class' => 'btn btn-warning'));
		echo $this->Form->end(); ?>
	</td>
</tr>
