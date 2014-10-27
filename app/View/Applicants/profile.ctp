<?php debug($applicant); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php echo $display_name; ?></h2>
		<p>Phone:
			<?php echo $applicant['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $applicant['Address']['street']; ?><br>
			<?php echo $applicant['Address']['city']; ?>, <?php echo $applicant['State']['short_name']; ?> <?php echo $applicant['Address']['zip']; ?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
	</div>
</div>
