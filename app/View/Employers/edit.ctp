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
						'label' => "URL (https://fitin.today/with/...)",
						'value' => $employer['User']['url'])); ?>
		</fieldset>
		<?php } ?>
		<fieldset>
			<legend>Company Info</legend>
			<?php 
				echo $this->Form->input('User.id', array(
					'type' => 'hidden',
					'value' => $employer['Employer']['user_id']));
				if($employer['User']['user_level_id'] == 17) {
					echo $this->Form->input('Organization.organization_name', array(
						'type' => 'hidden',
						'value' => $employer['Organization']['organization_name']));  
				} else {
					echo $this->Form->input('Organization.organization_name', array(
						'label' => 'Company Name',
						'value' => $employer['Organization']['organization_name'],
						'placeholder' => 'Company Title'));  
				}
				echo $this->Form->input('Employer.department_name', array(
					'label' => 'Department',
					'value' => $employer['Employer']['department_name'],
					'placeholder' => 'Department Title'));  
				echo $this->Form->input('Employer.department_description', array(
					'type' => 'textarea',
					'label' => 'Description',
					'value' => $employer['Employer']['department_description'],
					'placeholder' => 'Department Description')); ?> 
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('PhoneNumber.id', array(
					'type' => 'hidden',
					'value' => $employer['User']['PhoneNumber']['id']));
				
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
				echo $this->Form->input('Address.id', array(
					'type' => 'hidden',
					'value' => $employer['User']['Address']['id']));

				echo $this->Form->input('Address.street', array(
					'type' => 'text',
					'label' => 'Address',
					'value' => $employer['User']['Address']['street'],
					'placeholder' => 'e.g. 123 Main Street.'));

				echo $this->Form->input('Address.street2', array(
					'type' => 'text',
					'label' => 'Line 2',
					'value' => $employer['User']['Address']['street2'],
					'placeholder' => 'e.g. Apartment 1.'));

				echo $this->Form->input('Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $employer['User']['Address']['city'],
					'placeholder' => 'e.g. New York City.'));

				echo $this->Form->input('Address.state', array(
					'type' => 'text',
					'label' => 'State/Province/Region',
					'value' => $employer['User']['Address']['state'],
					'placeholder' => 'e.g. New York'));

				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
					'label' => 'Zip/Postal code',
					'value' => $employer['User']['Address']['zip'],
					'placeholder' => 'e.g. 10001.'));

				echo $this->Form->input('Address.country', array(
					'type' => 'text',
					'value' => $employer['User']['Address']['country'],
					'placeholder' => 'e.g. USA.'));
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

