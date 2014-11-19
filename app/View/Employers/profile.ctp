<?php debug($employer);
	$this->set('positions', $employer['Position']);?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php 
				echo $employer['User']['email']; ?><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array(
					'controller' => 'employers', 'action' => 'edit', $employer['User']['id']),
					array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</h2>
		<p>Phone:
			<?php echo $employer['User']['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $employer['User']['Address']['street']; ?><br>
			<?php echo $employer['User']['Address']['city']; ?>, <?php echo $employer['User']['Address']['State']['short_name']; ?> <?php echo $employer['User']['Address']['zip']; ?>
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
