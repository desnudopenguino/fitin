<tr>
	<td><?php echo $education['Degree']['degree_type']; ?></td>
	<td><?php echo $education['Industry']['industry_type']; ?></td>
	<td><?php echo $education['Organization']['organizationl_name']; ?></td>
	<td><?php echo $education['graduation_date']; ?></td>
	<td><?php echo $education['gpa']; ?></td>
	<td>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEducationModal_<?php echo $education['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
		<?php
			$this->set('concentrations',$concentrations);
			$this->set('degrees',$degrees);
			echo $this->element('Educations/edit'); ?>
	</td>

	<td><?php echo $this->Form->create('Education', array(
		'url' => '/educations/delete/'. $education['id'],
		'method' => 'post',
		'id' => 'deleteEducation_'. $education['id']
		));
		echo $this->Form->button('<i class="glyphicon glyphicon-trash"></i>', array(
			'class' => 'btn btn-warning',
			'type' => 'submit'));
		echo $this->Form->end(); ?>
	</td>
</tr>
