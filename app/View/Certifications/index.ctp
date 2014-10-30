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
