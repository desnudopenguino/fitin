<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2><?php echo $employer['User']['email']; ?></h2>
			<p>Phone:
				<?php echo $employer['PhoneNumber']['phone_number']; ?>
			</p>
			<p>
				<?php echo $employer['Address']['city']; ?>, <?php echo $employer['Address']['state']; ?> <?php echo $employer['Address']['zip']; ?>
			</p>
			<p><?php echo $employer['User']['email']; ?></p>
		</div>
		<div class="well">
			<?php echo $this->element('Culture/index'); ?>
		</div>	
	</div>
	<div class="col-md-6 col-md-offset-1">
		<div class="panel-group" id="resume" role="tablist" aria-multiselectable="true">
			<?php echo $this->element('Positions/index'); ?>
		</div>
	</div>
</div>
