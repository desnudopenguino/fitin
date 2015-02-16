<div id="settings-email" class="row">
	<h2>Confirm Email</h2>
	<p>Click the button below to send an email confirmation message to your inbox. You need your email confirmed to access
		parts of the site</p>
	<?php
		echo $this->Form->create('Confirm',
			array('method' => 'post',
				'novalidate' => true,
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control',
				'id' => 'ConfirmEmailSettingsForm', array(
					'url' => array(
						'controller' => 'users',	
						'action' => 'confirm'))
			))); ?>
		<fieldset>
			<?php 
				echo $this->Form->button('Send Email Confirmation', array(
					'div' => 'form-group',
					'type' => 'submit',
					'class' => 'btn btn-primary'));
				?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
</div>
<hr>
