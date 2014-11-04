<?php 
	echo $this->Form->create('Education',array(
		'action' => 'add',
		'method' => 'post',
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well',
		'id' => 'createEducationForm'
	)); ?>
	<fieldset>
		<?php 
			echo $this->Form->input('degree_id', array(
				'type' => 'select',
				'label' => 'Degree',
				'options' => $degrees));
			echo $this->Form->input('concentration_id', array(
				'type' => 'select',
				'label' => 'Concentration',
				'options' => $concentrations));
			echo $this->Form->input('Education.School.school_name', array(
				'type' => 'text',
				'label' => 'School'));
			echo $this->Form->input('graduation_date', array(
				'type' => 'text')); 
			echo $this->Form->input('gpa', array(
				'type' => 'text')); ?>
	</fieldset>
	<?php 
		echo $this->Form->submit('submit', array(
			'div' => 'form-group',
			'class' => 'btn btn-primary')
			); ?>
<?php echo $this->Form->end(); ?>
