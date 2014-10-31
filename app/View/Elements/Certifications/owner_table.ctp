<table class="table table-striped" id="certificationsTable">
	<tbody>
		<tr>
			<th>Certification</th>
			<th>Organization</th>
			<th>Earned</th>
			<th>Expires</th>
			<th>Delete</th>
		</tr>
		<?php foreach($certifications as $certification) {  $certification = $certification['Certification']; ?>
		<?php echo $this->element('Certifications/row'); ?>
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
		</tr> 
		<?php } ?>
	</tbody>
</table>
