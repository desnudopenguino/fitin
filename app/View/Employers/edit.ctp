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
		<fieldset>
			<legend>Name</legend>
			<?php 
				echo $this->Form->Input('User.Applicant.first_name', array(
					'label' => 'First Name',
					'value' => $employer['first_name'])); 
				echo $this->Form->Input('User.Applicant.mi', array(
					'label' => 'Middle Initial',
					'value' => $employer['mi'])); 
				echo $this->Form->Input('User.Applicant.last_name', array(
					'label' => 'Last Name',
					'value' => $employer['last_name'])); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('User.PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types,
					'value' => $phone_number['phone_type_id']));
		
				echo $this->Form->Input('User.PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number',
					'value' => $phone_number['phone_number']));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('User.Address.street', array(
					'type' => 'text',
					'label' => 'Street',
					'value' => $address['street']));
				echo $this->Form->input('User.Address.city', array(
					'type' => 'text',
					'label' => 'City',
					'value' => $address['city']));
				echo $this->Form->input('User.Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states,
					'value' => $address['state_id']));
				echo $this->Form->input('User.Address.zip', array(
					'type' => 'text',
					'value' => $address['zip']));
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
