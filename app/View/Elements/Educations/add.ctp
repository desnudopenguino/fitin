<div class="modal fade" id="createEducationModal" tabindex="-1" role="dialog" arial-labelledby="createEducationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Create Education</h4>
      </div>
			<?php 
				echo $this->Form->create('Education',array(
					'action' => 'add',
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'class' => 'well',
					'id' => 'createEducationForm'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('degree_id', array(
							'type' => 'select',
							'label' => 'Degree',
							'options' => $degrees));
						echo $this->Form->input('concentration_id', array(
							'type' => 'select',
							'label' => 'Concentration',
							'options' => $concentrations));
						echo $this->Form->input('School.school_name', array(
							'type' => 'text',
							'label' => 'School'));
						echo $this->Form->input('graduation_date', array(
							'type' => 'text')); 
						echo $this->Form->input('gpa', array(
							'type' => 'text')); ?>
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
