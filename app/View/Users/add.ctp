<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<?php
		echo $this->Form->create('User',
			array('action' => 'register',
				'method' => 'post',
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
			<?php echo $this->Form->input('User.email');
				echo $this->Form->input('role_id', array(
					'options' => array('1' => 'Employer','2' => 'Applicant'),
					'label' => "Role"
				));
				echo $this->Form->submit('Submit',array(
					'div' => 'form-group',
					'class' => 'btn btn-default')
				); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
