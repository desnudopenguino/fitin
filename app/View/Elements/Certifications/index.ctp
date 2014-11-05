<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingCertifications">
		<a data-toggle="collapse" data-parent="#resume" href="#collapseCertifications" aria-expanded="true" aria-controls="collapseCertifications">Certifications</a>
	</div>
	<div id="collapseCertifications" class="panel-collapse collapse-in" role="tabpanel" aria-labelledby="headingCertifications">
		<div class="panel-body">
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
		</div>
	</div>
</div>
