<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<?php
		echo $this->Form->create('User', array(
			'method' => 'post',
			'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'),
			'class' => 'well')); ?>

		<fieldset>
			<legend>Reset Password</legend>
			<?php
				echo $this->Form->input('password');
				echo $this->Form->input('reset_password'); 
				echo $this->Form->button('Reset Password', array(
					'div' => 'form-group',
					'type' => 'submit',
					'class' => 'btn btn-lg btn-success btn-block'));
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
