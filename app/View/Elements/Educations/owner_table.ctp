<table class="table table-striped" id="educationsTable">
	<tbody>
		<tr>
			<th>Certification</th>
			<th>Organization</th>
			<th>Earned</th>
			<th>Expires</th>
			<th>Delete</th>
		</tr>
		<?php foreach($educations as $education) { 
			$this->set('education', $education);
			echo $this->element('Educations/row');
		} ?>
	</tbody>
</table>
