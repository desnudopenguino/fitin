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
				echo $this->Form->Input('Applicant.first_name', array(
					'label' => 'First Name'
					)); 
				echo $this->Form->Input('Applicant.mi', array(
					'label' => 'Middle Initial'
					)); 
				echo $this->Form->Input('Applicant.last_name', array(
					'label' => 'Last Name'
					)); ?>
		</fieldset>
		<fieldset>
			<legend>Phone Number</legend>
			<?php 
				echo $this->Form->input('Applicant.User.PhoneNumber.phone_type_id', array(
					'type' => 'select',
					'label' => 'Phone Type',
					'options' => $phone_types
					));
		
				echo $this->Form->Input('Applicant.User.PhoneNumber.phone_number', array(
					'type' => 'text',
					'label' => 'Phone Number'
					));
			?>
		</fieldset>
		<fieldset>
			<legend>Address</legend>
			<?php
				echo $this->Form->input('Applicant.User.Address.street', array(
					'type' => 'text',
					'label' => 'Street'
					));
				echo $this->Form->input('Applicant.User.Address.city', array(
					'type' => 'text',
					'label' => 'City'
					));
				echo $this->Form->input('Applicant.User.Address.state_id', array(
					'type' => 'select',
					'label' => 'State',
					'options' => $states
					));
				echo $this->Form->input('Applicant.User.Address.zip', array(
					'type' => 'text'
					));
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
