<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php 
			//load validation resources
			//echo $this->Html->script('jquery.validate.min'); //load validation plugin.
			//echo $this->Html->script('register'); //load registration jquery script.
			//create form
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
			<legend> Login info</legend>
			<?php
				echo $this->Form->input('User.email', array(
					'placeholder' => 'e.g. mail@domain.com'));
				echo $this->Form->input('User.email_confirmation', array(
					'placeholder' => 'e.g. mail@domain.com'));
				echo $this->Form->input('User.password');
				echo $this->Form->input('User.password_confirmation', array(
					'type' => 'password'));
				echo $this->Form->input('User.coupon');
				echo $this->Form->Input('User.user_level_id', array(
					'type' => 'hidden',
					'value' => '20')); 
				
			?>
			<legend>Name</legend>
			<?php 
				echo $this->Form->Input('Applicant.first_name', array(
					'label' => 'First Name',
					'placeholder' => 'First Name')); 

				echo $this->Form->Input('Applicant.mi', array(
					'label' => 'Middle Initial',
					'placeholder' => 'Middle Initial (if applicable)')); 

				echo $this->Form->Input('Applicant.last_name', array(
					'label' => 'Last Name',
					'placeholder' => 'Last Name')); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types
					));
		
				echo $this->Form->Input('PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'placeholder' => 'Phone Number (123) 456 7890'
					));
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
				echo $this->Form->input('Address.state_id', array(
					'type' => 'text',
					'label' => 'State/Province/Region',
					'placeholder' => 'e.g. New York'));
				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
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
