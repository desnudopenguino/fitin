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

			if($applicant['User']['user_level_id'] > 20) { ?>
		<fieldset>
			<legend>Custom URL</legend>
			<?php 
				echo $this->Form->Input('User.url', array(
					'value' => $applicant['User']['url'])); ?>
		</fieldset>
		<?php } ?>
		<fieldset>
			<legend>Name</legend>
			<?php 
				echo $this->Form->Input('User.id', array(
					'type' => 'hidden',
					'value' => $applicant['Applicant']['user_id']));
				
				echo $this->Form->Input('Applicant.first_name', array(
					'label' => 'First Name',
					'value' => $applicant['Applicant']['first_name'],
					'placeholder' => 'e.g. First Name.'));

				echo $this->Form->Input('Applicant.mi', array(
					'label' => 'Middle Initial',
					'value' => $applicant['Applicant']['mi'],
					'placeholder' => 'e.g. L'));

				echo $this->Form->Input('Applicant.last_name', array(
					'label' => 'Last Name',
					'value' => $applicant['Applicant']['last_name'],
					'placeholder' => 'e.g. Last Name.')); ?>
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
					'value' => $applicant['User']['PhoneNumber']['phone_type_id']));
		
				echo $this->Form->Input('PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $applicant['User']['PhoneNumber']['phone_number'],
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
					'label' => 'Street',
					'value' => $applicant['User']['Address']['street'],
					'placeholder' => 'e.g. 123 Main Street.'));
				echo $this->Form->input('Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $applicant['User']['Address']['city'],
					'placeholder' => 'e.g. New York City.'));
				echo $this->Form->input('Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $applicant['User']['Address']['state_id'],
					'placeholder' => 'e.g. NY.'));
				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
					'value' => $applicant['User']['Address']['zip'],
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
