<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php echo $applicant['Applicant']['display_name']; ?></h2>
		<p>Phone:
			<?php echo $phone['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $address['Address']['street']; ?><br>
			<?php echo $address['Address']['city']; ?>, <?php echo $address['State']['short_name']; ?> <?php echo $address['Address']['zip']; ?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
		<p><?php echo $this->Html->link("My URL",
			"/with/".$applicant['User']['url']); ?></p>
		<p><?php echo $this->Html->link("edit", array(
			'controller' => 'applicants', 'action' => 'edit', $applicant['User']['id'])); ?></p>
	</div>
	<div class="col-md-6 col-md-offset-1">
			<?php echo $this->element('Certifications/owner_index'); ?>	
			<?php echo $this->element('Educations/owner_index'); ?>	
	</div>
</div>
<?php echo $this->Html->script('certification'); ?>
<?php echo $this->Html->script('education'); ?>
