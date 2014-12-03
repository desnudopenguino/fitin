<?php debug($applications); ?>
<div class="row">
	<?php foreach($applications as $application) {
		$this->set('application', $application);
		echo $this->elements('Applications/applicant');
	}?>
</div>
<?php echo $this->Html->script('employer_applications'); ?>
