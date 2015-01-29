<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php 
			echo $this->Form->create('User', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapinput' => false,
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			));

			if($employer['User']['user_level_id'] > 10) { ?>
		<fieldset>
			<legend>Custom URL</legend>
				<?php
					echo $this->Form->input('User.url', array(
						'value' => $employer['User']['url'])); ?>
		</fieldset>
		<fieldset>
			<legend>Company Info</legend>
			<?php 
				echo $this->Form->input('User.id', array(
					'type' => 'hidden',
					'value' => $employer['Employer']['user_id']));

				echo $this->Form->input('Organization.organization_name', array(
					'label' => 'Company Name',
					'value' => $employer['Organization']['organization_name'],
					'placeholder' => 'Company Title'));  

				echo $this->Form->input('Employer.department_name', array(
					'label' => 'Department',
					'value' => $employer['Employer']['department_name'],
					'placeholder' => 'Department Title')); ?> 
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types,
					'value' => $employer['User']['PhoneNumber']['phone_type_id']));
		
				echo $this->Form->input('PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $employer['User']['PhoneNumber']['phone_number'],
					'placeholder' => 'Phone Number (123) 456 7890'));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('Address.street', array(
					'type' => 'text',
					'label' => 'Street',
					'value' => $employer['User']['Address']['street'],
					'placeholder' => 'e.g. 123 Main Street.'));
				echo $this->Form->input('Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $employer['User']['Address']['city'],
					'placeholder' => 'e.g. New York City.'));
				echo $this->Form->input('Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $employer['User']['Address']['state_id']));
				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
					'value' => $employer['User']['Address']['zip'],
					'placeholder' => 'e.g. 10001.'));
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
