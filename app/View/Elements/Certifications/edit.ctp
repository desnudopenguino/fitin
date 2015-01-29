<div class="modal fade" id="editCertificationModal_<?php echo $certification['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editCertificationLabel_<?php echo $certification['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Certification</h4>
      </div>
			<?php 
				echo $this->Form->create('Certification',array(
					'url' => '/certifications/edit/'. $certification['id'],
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'editCertificationForm_'. $certification['id']
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('certification_name', array(
							'type' => 'text',
							'label' => 'Name',
							'value' => $certification['certification_name'],
							'placeholder' => 'e.g. Certificate Name'));
						echo $this->Form->input('Organization.organization_name', array(
							'type' => 'text',
							'value' => $certification['Organization']['organization_name'],
							'placeholder' => 'e.g. Certifying Organization'));
						echo $this->Form->input('earned_date', array(
							'type' => 'text',
							'placeholder' => 'ex: 2000-01-01',
							'value' => $certification['earned_date']));
						echo $this->Form->input('expiration_date', array(
							'type' => 'text',
							'placeholder' => 'ex: 2000-01-01',
							'label' => 'expiration_date '.$this->Html->image('tooltip.png',array(
								'class' => 'masterTooltip',
								'title' => 'If your certificate doesn\'t expire, leave this blank.')),
							'value' => $certification['expiration_date'])); ?>
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
