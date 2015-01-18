<?php
	$this->set('positions', $employer['Position']);?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php
				if(!empty($employer['Organization'])) {
					echo $employer['Organization']['organization_name']; 
				} else {
					echo $employer['User']['email'];
				} ?>
				
				<?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array(
					'controller' => 'employers', 'action' => 'edit', $employer['User']['id']),
					array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</h2>
		<p>Phone:
			<?php if(!empty($applicant['User']['PhoneNumber'])) {
				echo $applicant['User']['PhoneNumber']['phone_number']; 
			}?>
		</p>
		<p>Address:
			<?php if(!empty($applicant['User']['Address'])) {
				echo $applicant['User']['Address']['street']; ?><br>
				<?php echo $applicant['User']['Address']['city']; ?>,
				<?php echo $applicant['User']['Address']['State']['short_name']; ?>
				<?php echo $applicant['User']['Address']['zip']; 
			}?>
		</p>
		<p><?php echo $employer['User']['email']; ?></p>
		<p><?php echo $this->Html->link("My URL",
			"/with/".$employer['User']['url']); ?></p>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php echo $this->element('Positions/owner_index'); ?>
	</div>
</div>
<?php echo $this->Html->script('general'); ?>
