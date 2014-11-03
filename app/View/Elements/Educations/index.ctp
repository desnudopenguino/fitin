<div class="row well">
	<div class="col-md-10 col-md-offset-1">
		<h2>Educations</h2>
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
				<td><?php echo $education['Concentration']['concentration_type']; ?></td>
				<td><?php echo $education['School']['school_name']; ?></td>
				<td><?php echo $education['Education']['graduation_date']; ?></td>
				<td><?php echo $education['Education']['gpa']; ?></td>
			</tr> 
			<?php } ?>
		</table>
	</div>
</div>
