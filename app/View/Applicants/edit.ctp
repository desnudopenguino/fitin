<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php 
			echo $this->Form->create('Applicant', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			)); ?>
		<fieldset>
			<legend>Custom Url</legend>
			<?php 
				echo $this->Form->input('User.url', array(
					'value' => $applicant['User']['url']));
		</fieldset>
		<fieldset>
			<legend>Name</legend>
			<?php 
				echo $this->Form->input('first_name', array(
					'label' => 'First Name',
					'value' => $applicant['Applicant']['first_name']));
				echo $this->Form->input('mi', array(
					'label' => 'Middle Initial',
					'value' => $applicant['Applicant']['mi']));
				echo $this->Form->input('last_name', array(
					'label' => 'Last Name',
					'value' => $applicant['Applicant']['last_name'])); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types,
					'value' => $applicant['User']['PhoneNumber']['phone_type_id']));
		
				echo $this->Form->input('PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $applicant['User']['PhoneNumber']['phone_number']));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('Address.street', array(
					'type' => 'text',
					'label' => 'Street',
					'value' => $applicant['User']['Address']['street']));
				echo $this->Form->input('Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $applicant['User']['Address']['city']));
				echo $this->Form->input('Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $applicant['User']['Address']['state_id']));
				echo $this->Form->input('Address.zip', array(
					'type' => 'text',
					'value' => $applicant['User']['Address']['zip']));
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
