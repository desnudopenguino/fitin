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
						echo $this->Form->input('title', array(
							'type' => 'text'));
					
						echo $this->Form->input('Organization.organization_name', array(
							'type' => 'text'));
		
						echo $this->Form->input('start_date', array(
							'type' => 'text'));

						echo $this->Form->input('end_date', array(
							'type' => 'text'));

						echo $this->Form->input('responsibilities', array(
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
