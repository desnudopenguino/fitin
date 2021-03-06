<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Please login</h3>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('User', array(
			'action' => 'login',
			'method' => 'post',
			'inputDefaults' => array(
				'dev' => 'form-group',
				'label' => false,
				'wrapInput' => false,
				'class' => 'form-control'))); ?>
		<fieldset>
			<?php
				echo $this->Form->input('User.email', array('placeholder' => 'Email'));
				echo $this->Form->input('User.password', array('placeholder' => 'Password'));
				echo $this->Form->button('<i class="glyphicon glyphicon-log-in"></i> Login', array(
					'div' => 'form-group',
					'type' => 'submit',
					'class' => 'btn btn-lg btn-success btn-block'));
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
		<p>
			<?php echo $this->Html->link('Forgot Password?', array(
				'controller' => 'users',
				'action' => 'passwordReset')); ?>
			or
			<?php echo $this->Html->link('Register', array(
				'controller' => 'pages',
				'action' => 'display', 'home')); ?>
		</p>
	</div>
</div>
