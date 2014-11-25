<tr>
<?php debug($certification); ?>
	<td><?php echo $certification['certification_name']; ?></td>
	<td><?php echo $certification['Organization.organization_name']; ?></td>
	<td><?php echo $certification['earned_date']; ?></td>
	<td><?php echo $certification['expiration_date']; ?></td>
	<td>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCertificationModal_<?php echo $certification['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
		<?php echo $this->element('Certifications/edit'); ?>
	</td>
	<td><?php echo $this->Form->create('Certification', array(
		'url' => '/certifications/delete/'. $certification['id'],
		'method' => 'post',
		'id' => 'deleteCertification_'. $certification['id']
		));
		echo $this->Form->button('<i class="glyphicon glyphicon-trash"></i>', array(
			'class' => 'btn btn-warning',
			'type' => 'submit'));
		echo $this->Form->end(); ?>
	</td>
</tr>
