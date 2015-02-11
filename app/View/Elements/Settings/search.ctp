			<?php echo $this->Form->create('Setting', array(
				'action' => 'update',
				'method' => 'post',
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'id' => 'searchApplicantForm'
				)); 
debug($user);?>
			<fieldset>
				<?php
					echo $this->Form->input('user_id', array(
						'type' => 'hidden',
						'value' => $user['User']['id']));

					echo $this->Form->input('search_distance', array(
						'type' => 'number',
						'value' => $user['Setting']['search_distance'],
						'label' => 'Search Distance'));

					echo $this->Form->input('search_scale', array(
						'type' => 'select',
						'label' => 'Scale',
						'value' => $user['Setting']['search_scale'],
						'options' => array('3959' => 'Miles', '6371' => 'Kilometers')));
					
					echo $this->Form->input('search_job', array(
						'type' => 'number',
						'value' => $user['Setting']['search_job'],
						'label' => 'Job Match %'));

					echo $this->Form->input('search_culture', array(
						'type' => 'number',
						'value' => $user['Setting']['search_culture'],
						'label' => 'Culture Match %'));
				?>

			</fieldset>	
			<?php echo $this->Form->submit('submit', array(
				'div' => 'form-group',
				'class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
