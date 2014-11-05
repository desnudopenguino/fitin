<div class="modal fade" id="editEducationModal_<?php echo $education['Education']['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editEducationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Education</h4>
      </div>
			<?php 
				echo $this->Form->create('Education',array(
					'url' => '/educations/edit/'. $education['Education']['id'],
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'editEducationForm_'. $education['Education']['id']
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('degree_id', array(
							'type' => 'select',
							'label' => 'Degree',
							'options' => $degrees,
							'value' => $education['Education']['degree_id']));
						echo $this->Form->input('concentration_id', array(
							'type' => 'select',
							'label' => 'Concentration',
							'options' => $concentrations,
							'value' => $education['Education']['concentration_id']));
						echo $this->Form->input('School.school_name', array(
							'type' => 'text',
							'label' => 'School',
							'value' => $education['School']['school_name']));
						echo $this->Form->input('graduation_date', array(
							'type' => 'text',
							'value' => $education['Education']['graduation_date'])); 
						echo $this->Form->input('gpa', array(
							'type' => 'text',
							'value' => $education['Education']['gpa'])); ?>
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
