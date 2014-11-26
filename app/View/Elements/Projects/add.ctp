<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" arial-labelledby="createProjectLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Create Project</h4>
      </div>
			<?php 
				echo $this->Form->create('Project',array(
					'action' => 'add',
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'createProjectForm'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('title', array(
							'type' => 'text',
							'label' => 'Title of Position'));
					
						echo $this->Form->input('Organization.organization_name', array(
							'type' => 'text',
							'label' => 'Company'));
		
						echo $this->Form->input('start_date', array(
							'placeholder' => 'ex: 2000-01-01',
							'type' => 'text'));

						echo $this->Form->input('end_date', array(
							'placeholder' => 'ex: 2000-01-01',
							'type' => 'text'));

						echo $this->Form->input('ProjectIndustry.0.industry_id', array(
							'type' => 'select',
							'label' => 'Industry',
							'options' => $industries));

						echo $this->Form->input('ProjectIndustry.1.industry_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select an Industry',
							'options' => $industries));

						echo $this->Form->input('ProjectIndustry.2.industry_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select an Industry',
							'options' => $industries));

						echo $this->Form->input('ProjectFunction.0.work_function_id', array(
							'type' => 'select',
							'label' => 'Function',
							'options' => $functions));

						echo $this->Form->input('ProjectFunction.1.work_function_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select a Function',
							'options' => $functions));

						echo $this->Form->input('ProjectFunction.2.work_function_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select a Function',
							'options' => $functions));

						echo $this->Form->input('responsibilities', array(
							'type' => 'textarea'));

						echo $this->Form->input('skills', array(
							'type' => 'textarea'));
						?>
				</fieldset>
      </div>
      <div class="modal-footer">
				<?php 
					echo $this->Form->submit('submit', array(
						'div' => 'form-group',
						'class' => 'btn btn-primary')
						); ?>
      </div>
			<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
