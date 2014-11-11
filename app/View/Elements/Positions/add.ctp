<div class="modal fade" id="createPositionModal" tabindex="-1" role="dialog" arial-labelledby="createPositionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Create Position</h4>
      </div>
			<?php 
				echo $this->Form->create('Position',array(
					'action' => 'add',
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'createPositionForm'
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('title', array(
							'type' => 'text',
							'label' => 'Title of Position'));
					
						echo $this->Form->input('min_work_experience', array(
							'type' => 'text',
							'label' => 'Minimum years of experience'));

						echo $this->Form->input('max_work_experience', array(
							'type' => 'text',
							'label' => 'Maximum years of experience'));

/*						echo $this->Form->input('PositionIndustry.0.industry_id', array(
							'type' => 'select',
							'label' => 'Industry <button type="button" class="btn btn-success btn-sm addPositionIndustry"><i class="glyphicon glyphicon-plus"></i></button>',
							'options' => $industries));

						echo $this->Form->input('PositionIndustry.1.industry_id', array(
							'type' => 'select',
							'label' => false,
							'style' => 'display: none;',
							'empty' => 'Select an Industry',
							'options' => $industries));

						echo $this->Form->input('PositionIndustry.2.industry_id', array(
							'type' => 'select',
							'label' => false,
							'style' => 'display: none;',
							'empty' => 'Select an Industry',
							'options' => $industries));
*/
/*
						echo $this->Form->input('PositionFunction.0.work_function_id', array(
							'type' => 'select',
							'label' => 'Function',
							'options' => $functions));
*/
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
