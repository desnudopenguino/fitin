<div class="modal fade" id="createCertificationModal" tabindex="-1" role="dialog" arial-labelledby="createCertificationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Create Certification</h4>
      </div>
			<?php 
				echo $this->Form->create('Certification',array(
					'action' => 'add',
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'createCertificationForm'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('certification_name', array(
							'type' => 'text',
							'label' => 'Name'));
						echo $this->Form->input('Organization.organization_name', array(
							'type' => 'text'));
						echo $this->Form->input('earned_date', array(
							'placeholder' => 'ex: 2000-01-01',
							'type' => 'text'));
						echo $this->Form->input('expiration_date', array(
							'placeholder' => 'ex: 2000-01-01',
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
