<h1>Add Project</h1>
<?php
	echo $this->Form->create('Project', array(
		'action' => 'add',
		'method' => 'post',
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well',
		'id' => 'createProjectForm'
	)); 

	echo $this->Form->input('title', array(
		'type' => 'text'));

	echo $this->Form->input('Organization.organization_name', array(
		'type' => 'text'));

	echo $this->Form->input('start_date', array(
		'type' => 'text'));

	echo $this->Form->input('end_date', array(
		'type' => 'text'));

	echo $this->Form->input('responsibilities', array(
		'type' => 'textarea'));

	echo $this->Form->button('Submit', array(
		'type' => 'submit'));

	echo $this->Form->end();
?>
