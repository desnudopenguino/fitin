<div class="row">
	<?php foreach($applications as $application) {
		$this->set('application', $application);
		echo $this->element('Applications/applicant');
	}?>
</div>
