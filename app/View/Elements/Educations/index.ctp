<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingEducation">
		<a class="collapsed" data-toggle="collapse" data-parent="#resume" href="#collapseEducation" aria-expanded="false" aria-controls="collapseEducation">Education</a>
	</div>
	<div id="collapseEducation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEducation">
		<div class="panel-body">
			<table class="table table-striped">
				<tr>
					<th>Degree</th>
					<th>Concentration</th>
					<th>School</th>
					<th>Graduation</th>
					<th>GPA</th>
				</tr>
				<?php foreach($educations as $education) { ?>
				<tr>
					<td><?php echo $education['Degree']['degree_type']; ?></td>
					<td><?php echo $education['Industry']['industry_type']; ?></td>
					<td><?php echo $education['Organization']['organization_name']; ?></td>
					<td><?php echo $education['graduation_date']; ?></td>
					<td><?php echo $education['gpa']; ?></td>
				</tr> 
				<?php } ?>
			</table>
		</div>
	</div>
</div>
