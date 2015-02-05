<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2><?php echo $company['Organization']['organization_name']; ?></h2>
		<?php echo $this->Form->create('Company', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapinput' => false,
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			));
				echo $this->Form->input('Company.id', array(
					'type' => 'hidden',
					'value' => $company['Company']['id']));
			
				if($company['Employer']['User']['user_level_id'] > 10) {
					echo $this->Form->input('Company.url', array(
						'title' => 'URL',
						'value' => $company['Company']['url']));
				}
				
				echo $this->Form->input('Company.description', array(
					'type' => 'textarea',
					'value' => $company['Company']['description']));
				echo $this->Form->end('Save');
			?>
		<hr>
		<h3>Manage Departments</h3>
<?php debug($company); ?>
	</div>
</div>
