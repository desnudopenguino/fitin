<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingCertifications">
		<a class="collapsed" data-toggle="collapse" data-parent="#resume" href="#collapseCertifications" aria-expanded="false" aria-controls="collapseCertifications">Certifications</a>
	</div>
	<div id="collapseCertifications" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCertifications">
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
					<td><?php echo $certification['certification_name']; ?></td>
					<td><?php echo $certification['Organization']['organization_name']; ?></td>
					<td><?php echo $certification['earned_date']; ?></td>
					<td><?php echo $certification['expiration_date']; ?></td>
				</tr> 
				<?php } ?>
			</table>
		</div>
	</div>
</div>
