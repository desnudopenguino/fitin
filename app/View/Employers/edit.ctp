<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php 
			echo $this->Form->create('User', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			));
			if($applicant['User']['user_level_id'] > 10) { ?>
		<legend>Custom Url</legend>
			<?php 
				echo $this->Form->input('User.url', array(
					'value' => $applicant['User']['url'])); ?>
		</fieldset>
		<?php } ?>
		<fieldset>
			<legend>Company Info</legend>
			<?php 
				echo $this->Form->Input('Organization.organization_name', array(
					'label' => 'Company Name',
					'value' => $employer['Organization']['organization_name']));  

				echo $this->Form->Input('Employer.department_name', array(
					'label' => 'Department',
					'value' => $employer['Employer']['department_name'])); ?> 
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('User.PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types,
					'value' => $employer['User']['PhoneNumber']['phone_type_id']));
		
				echo $this->Form->Input('User.PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $employer['User']['PhoneNumber']['phone_number']));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('User.Address.street', array(
					'type' => 'text',
					'label' => 'Street',
					'value' => $employer['User']['Address']['street']));
				echo $this->Form->input('User.Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $employer['User']['Address']['city']));
				echo $this->Form->input('User.Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $employer['User']['Address']['state_id']));
				echo $this->Form->input('User.Address.zip', array(
					'type' => 'text',
					'value' => $employer['User']['Address']['zip']));
			?>
		</fieldset>
		<?php 
			echo $this->Form->submit('Submit', array(
				'div' => 'form-group',
				'class' => 'btn btn-default')
			); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
