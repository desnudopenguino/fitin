<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $this->Html->link($employer['department_name'], array(
			'controller' => 'employers',
			'action' => 'view', $employer['User']['url'])); ?>
	</div>
	<div class="panel-body">
		<?php echo $employer['department_description']; ?>
	</div>
</div>
