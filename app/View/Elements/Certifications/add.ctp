<div class="modal fade" id="createCertification" tabindex="-1" role="dialog" arial-labelledby="createCertificationLabel" aria-hidden="true">
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
					'class' => 'well'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<legend>Add Certification</legend>
					<?php 
						echo $this->Form->input('certification_name', array(
							'type' => 'text',
							'label' => 'Name'));
						echo $this->Form->input('organization', array(
							'type' => 'text'));
						echo $this->Form->input('earned_date', array(
							'type' => 'text'));
						echo $this->Form->input('expiration_date', array(
							'type' => 'text')); ?>
				</fieldset>
      </div>
      <div class="modal-footer">
				<?php 
					echo $this->Form->submit('submit', array(
						'div' => 'form-group',
						'class' => 'btn btn-primary')
						); ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
			<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
