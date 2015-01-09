<table class="table table-striped" id="educationsTable">
	<tbody>
		<tr>
			<th>Degree</th>
			<th>Concentration</th>
			<th>School</th>
			<th>Graduation</th>
			<th>GPA</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		Thing5 </br><?php debug($educations); ?></br>
		<?php foreach($educations as $education) { 
			$this->set('education', $education);
			echo $this->element('Educations/row');
		} ?>
	</tbody>
</table>
