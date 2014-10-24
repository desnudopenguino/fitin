<?php
	echo $this->Form->create('User',
		array('action' => 'register', 'method' => 'post',
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	)
); ?>
<fieldset>
	<legend>Register</legend>
	<?php echo $this->Form->input('User.email');
		echo $this->Form->input('User.password');
		echo $this->Form->input('roleId', array(
			'options' => array('1' => 'Employer','2' => 'Applicant'),
			'label' => "Role"
			)
		);
		echo $this->Form->submit('Submit',array(
			'div' => 'form-group',
			'class' => 'btn btn-default')
		); ?>
</fieldset>
<?php echo $this->Form->end(); ?>
