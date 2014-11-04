<div class="modal fade" id="editCertificationModal_<?php echo $certification['Certification']['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editCertificationLabel_<?php echo $certification['Certification']['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Certification</h4>
      </div>
			<?php 
				echo $this->Form->create('Certification',array(
					'action' => 'edit',
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'class' => 'well',
					'id' => 'editCertificationForm'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('certification_name', array(
							'type' => 'text',
							'label' => 'Name',
							'value' => $certification['Certification']['certification_name']));
						echo $this->Form->input('organization', array(
							'type' => 'text',
							'value' => $certification['Certification']['organization']));
						echo $this->Form->input('earned_date', array(
							'type' => 'text',
							'value' => $certification['Certification']['earned_date']));
						echo $this->Form->input('expiration_date', array(
							'type' => 'text',
							'value' => $certification['Certification']['expiration_date'])); ?>
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
