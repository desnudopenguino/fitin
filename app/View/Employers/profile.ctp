<?php $this->set('positions', $employer['Position']); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
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
				<?php if(!empty($employer['User']['PhoneNumber'])) {
					echo $employer['User']['PhoneNumber']['phone_number']; 
				}?>
			</p>
			<p>Location:
				<?php if(!empty($employer['User']['Address'])) {
					echo $employer['User']['Address']['street']; ?><br>
					<?php echo $employer['User']['Address']['city']; ?>,
					<?php echo $employer['User']['Address']['state']; ?>
					<?php echo $employer['User']['Address']['zip']; ?><br>
					<?php echo $employer['User']['Address']['country']; 
				}?>
			</p>
			<p><?php echo $employer['User']['email']; ?></p>
			<script language="JavaScript">
			  function selectText(textField) 
			  {
			    textField.focus();
			    textField.select();
			  }
			</script>
			<?php echo $this->Form->input('My URL', array(
				'label' => 'My URL '.$this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip',
					'title' => 'Click in the textbox below and copy your url to share with others')),
				'type' => 'text',
				'size' => '30',
				'onClick' => 'selectText(this)',
				'value' => Router::fullbaseUrl() ."/with/". $employer['User']['url'])); ?>
			<h3>Description: </h3>
			<p>
				<?php echo $employer['Employer']['department_description']; ?>
			</p>
		</div>
		<div class="well">
<?php debug($employer); ?>
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>Edit Company', array(
				'controller' => 'companies', 'action' => 'edit', $employer['User']['id']),
				array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php echo $this->element('Positions/owner_index'); ?>
	</div>
</div>
<?php echo $this->Html->script('general'); ?>
