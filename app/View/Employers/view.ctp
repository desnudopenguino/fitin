<?php
	$this->set('positions', $employer['Position']); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2><?php
				if(!empty($employer['Organization'])) {
					echo $employer['Organization']['organization_name']; 
				} else {
					echo $employer['User']['email'];
				} ?></h2>
			<p>Phone:
				<?php if(!empty($employer['User']['PhoneNumber'])) {
					echo $employer['User']['PhoneNumber']['phone_number']; 
				}?>
			</p>
			<p>Location:
				<?php if(!empty($employer['User']['Address'])) { ?>
					<?php echo $employer['User']['Address']['city']; ?>,
					<?php echo $employer['User']['Address']['State']['short_name']; ?>
					<?php echo $employer['User']['Address']['zip']; 
				}?>
			</p>
			<p><?php echo $employer['User']['email']; ?></p>
		</div>
		<?php if(isset($culture)) { ?>
			<?php echo $this->element('Culture/profile'); ?>
		<?php } ?>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<div class="panel-group" id="resume" role="tablist" aria-multiselectable="true">
			<?php 
				$this->set('degrees', $degrees);
				echo $this->element('Positions/index'); ?>
		</div>
	</div>
</div>
