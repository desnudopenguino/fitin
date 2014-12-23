<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<?php
		echo $this->Form->create('PasswordReset',
			array('method' => 'post',
				'novalidate' => true,
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
	)); ?>
		<fieldset>
			<legend>Register</legend>
			<?php echo $this->Form->input('email');
				echo $this->Form->button('Reset Password', array(
					'div' => 'form-group',
					'type' => 'submit',
					'class' => 'btn btn-lg btn-success btn-block'));
				?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
