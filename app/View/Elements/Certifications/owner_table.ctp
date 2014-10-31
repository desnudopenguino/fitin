<table class="table table-striped" id="certificationsTable">
	<tbody>
		<tr>
			<th>Certification</th>
			<th>Organization</th>
			<th>Earned</th>
			<th>Expires</th>
			<th>Delete</th>
		</tr>
		<?php foreach($certifications as $certification) { 
			$this->set('certification', $certification);
			echo $this->element('Certifications/row');
		} ?>
	</tbody>
</table>
