<?php debug($employer); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php 
				echo $employer['User']['email']; ?><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array(
					'controller' => 'employers', 'action' => 'edit', $employer['User']['id']),
					array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</h2>
		<p>Phone:
			<?php echo $phone['PhoneNumber']['phone_number']; ?>
		</p>
		<p><?php echo $address['Address']['street']; ?><br>
			<?php echo $address['Address']['city']; ?>, <?php echo $address['State']['short_name']; ?> <?php echo $address['Address']['zip']; ?>
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
