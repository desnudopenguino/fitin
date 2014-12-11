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
			<legend>Name</legend>
			<?php 
				echo $this->Form->Input('first_name', array(
					'label' => 'First Name'));
				echo $this->Form->Input('mi', array(
					'label' => 'Middle Initial'));
				echo $this->Form->Input('last_name', array(
					'label' => 'Last Name')); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('User.PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types,
					'value' => $applicant['User']['PhoneNumber']['phone_type_id']));
		
				echo $this->Form->Input('User.PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $applicant['User']['PhoneNumber']['phone_number']));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('User.Address.street', array(
					'type' => 'text',
					'label' => 'Street',
					'value' => $applicant['User']['Address']['street']));
				echo $this->Form->input('User.Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $applicant['User']['Address']['city']));
				echo $this->Form->input('User.Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $applicant['User']['Address']['state_id']));
				echo $this->Form->input('User.Address.zip', array(
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
