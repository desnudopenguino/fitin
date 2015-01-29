<h2>Resume Snapshot
<?php //tooltip
	echo $this->Html->image('tooltip.png',array(
		'class' => 'masterTooltip',
		'title' => 'Matches are shown based on your profile. More info means better results. Mouse over for Culture Match with each job.'
	));
?>
</h2>
<h3>Education:</h3>
<ul class="list-group">
	<?php foreach($applicant_card['DataCard']['Education'] as $education) { ?>
	<li class="list-group-item"><?php echo $education['degree']; ?> in <?php echo $education['industry']; ?></li>
	<?php } ?>
</ul>
<h3>Certifications:</h3>
<ul class="list-group">
	<?php foreach($applicant_card['DataCard']['Certification'] as $certification) { ?>
	<li class="list-group-item"><?php echo $certification; ?></li>
	<?php } ?>
</ul>
<h3>Experience:
<?php //tooltip
	echo $this->Html->image('tooltip.png',array(
		'class' => 'masterTooltip',
		'title' => 'Profile experience is broken down into an easy to digest experience snapshot.'
	));
?>
</h3>
<table class="table table-striped">
	<tr>
		<th>Type</th>
		<th>Name</th>
		<th>Exp. (years)</th>
	</tr>
	<?php 
		foreach($applicant_card['DataCard']['Function'] as $function) { ?>
	<tr>
		<td>Function</td>
		<td><?php echo $function['function']; ?></td>
		<td><?php echo $function['totalDuration']; ?></td>
	</tr>
	<?php }
		foreach($applicant_card['DataCard']['Industry'] as $industry) { ?>
	<tr>
		<td>Industry</td>
		<td><?php echo $industry['industry']; ?></td>
		<td><?php echo $industry['totalDuration']; ?></td>
	</tr>
	<?php }
		foreach($applicant_card['DataCard']['Skill'] as $skill) { ?>
	<tr>
		<td>Skill</td>
		<td><?php echo $skill['skill']; ?></td>
		<td><?php echo $skill['totalDuration']; ?></td>
	</tr>
	<?php } ?>
</table>
