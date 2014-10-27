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
		<p>My URL: <?php echo $this->Html->link("My Link",
			"/with/".$applicant['User']['url'])); ?></p>
	</div>
</div>
