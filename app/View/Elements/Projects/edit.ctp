<div class="modal fade" id="editProjectModal_<?php echo $project['Project']['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editProjectLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Project</h4>
      </div>
			<?php 
				echo $this->Form->create('Project',array(
					'url' => '/projects/edit/'. $project['Project']['id'],
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'editProjectForm_'. $project['Project']['id']
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('Project.id', array(
							'value' => $project['Project']['id']));
						echo $this->Form->input('title', array(
							'type' => 'text',
							'value' => $project['Project']['title']));
					
						echo $this->Form->input('Organization.organization_name', array(
							'type' => 'text',
							'value' => $project['Organization']['organization_name']));
		
						echo $this->Form->input('start_date', array(
							'type' => 'text',
							'value' => $project['Project']['start_date']));

						echo $this->Form->input('end_date', array(
							'type' => 'text',
							'value' => $project['Project']['end_date']));

						foreach($project['ProjectIndustry'] as $pKey => $industry) {
							echo $this->Form->input('ProjectIndustry.'.$pKey.'.id', array(
								'value' => $project['ProjectIndustry'][$pKey]['id']));
						
							echo $this->Form->input('ProjectIndustry.'.$pKey.'.industry_id', array(
								'type' => 'select',
								'label' => 'Industry',
								'empty' => 'Select an Industry',
								'options' => $industries,
								'value' => $project['ProjectIndustry'][$pKey]['industry_id']));
						}

						foreach($project['ProjectFunction'] as $pKey => $function) {
							echo $this->Form->input('ProjectFunction.'.$pKey.'.id', array(
								'value' => $project['ProjectFunction'][$pKey]['id']));

							echo $this->Form->input('ProjectFunction.'.$pKey.'.work_function_id', array(
								'type' => 'select',
								'label' => 'Function',
								'empty' => 'Select an Function',
								'options' => $functions,
								'value' => $project['ProjectFunction'][$pKey]['work_function_id']));
						}

						echo $this->Form->input('responsibilities', array(
							'type' => 'textarea',
							'value' => $project['Project']['responsibilities']));
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
