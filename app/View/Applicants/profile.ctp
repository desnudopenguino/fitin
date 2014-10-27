<?php debug($applicant); ?>
<?php debug($phone); ?>
<?php debug($address); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php echo $display_name; ?></h2>
		<p>Phone:
			<?php echo $phone['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $address['Address']['street']; ?><br>
			<?php echo $address['Address']['city']; ?>, <?php echo $address['Address']['short_name']; ?> <?php echo $address['Address']['zip']; ?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
	</div>
</div>
