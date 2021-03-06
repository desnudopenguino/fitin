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
			)); ?>
		<h2>Please Fill out these fields before continuing</h2>
		<fieldset>
			<legend>Company Info</legend>
			<?php
				echo $this->Form->input('User.id', array(
					'type' => 'hidden',
					'value' => $user_id));

				echo $this->Form->input('Organization.organization_name', array(
					'label' => 'Company Name',
					'placeholder' => 'Company Title'));

				echo $this->Form->input('Employer.department_name', array(
					'label' => 'Department',
					'placeholder' => 'Department Title')); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types));
		
				echo $this->Form->input('PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'placeholder' => 'Phone Number (123) 456 7890'));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('Address.street', array(
					'type' => 'text',
					'label' => 'Address',
					'placeholder' => 'e.g. 123 Main Street.'));
				echo $this->Form->input('Address.street2', array(
					'type' => 'text',
					'label' => 'Line 2',
					'placeholder' => 'e.g. Apartment 1.'));
				echo $this->Form->input('Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'placeholder' => 'e.g. New York City.'));
				echo $this->Form->input('Address.state', array(
					'type' => 'text',
					'label' => 'State/Province/Region',
					'placeholder' => 'e.g. New York'));
				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
					'label' => 'Zip/Postal code',
					'placeholder' => 'e.g. 10001.'));
				echo $this->Form->input('Address.country', array(
					'type' => 'text',
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
