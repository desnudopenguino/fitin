<?php debug($applicant); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php echo $display_name; ?></h2>
		<?php foreach($phone_numbers as $phone_number) { ?>
			<p><?php echo $phone_number['PhoneType']['phone_type']; ?> Phone:
				<?php echo $phone_number['PhoneNumber']['phone_number']; ?>
			</p>
			<p><?php echo $address['Address']['street']; ?><br>
				<?php echo $address['Address']['city']; ?>, <?php echo $address['State']['short_name']; ?> <?php echo $address['Address']['zip']; ?>
			</p>
			<p><?php echo $applicant['User']['email']; ?></p>
		<?php } ?>
	</div>
</div>
