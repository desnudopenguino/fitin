<div class="modal fade" id="editPositionModal_<?php echo $position['Position']['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editPositionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Position</h4>
      </div>
			<?php 
				echo $this->Form->create('Position',array(
					'url' => '/positions/edit/'. $position['Position']['id'],
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'editPositionForm_'. $position['Position']['id']
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('Position.id', array(
							'value' => $position['Position']['id']));

						echo $this->Form->input('title', array(
							'type' => 'text',
							'value' => $position['Position']['title']));

						echo $this->Form->input('min_work_experience', array(
							'type' => 'text',
							'value' => $position['Position']['min_work_experience'],
							'label' => 'Minimum years of experience'));

						echo $this->Form->input('max_work_experience', array(
							'type' => 'text',
							'value' => $position['Position']['max_work_experience'],
							'label' => 'Maximum years of experience'));

						echo $this->Form->input('PositionIndustry.0.id', array(
							'value' => $position['PositionIndustry'][0]['id']));

						echo $this->Form->input('PositionIndustry.0.industry_id', array(
							'type' => 'select',
							'label' => 'Industry',
							'options' => $industries,
							'value' => $position['PositionIndustry'][0]['industry_id']));

						echo $this->Form->input('PositionIndustry.1.id', array(
							'value' => $position['PositionIndustry'][1]['id']));

						echo $this->Form->input('PositionIndustry.1.industry_id', array(
							'type' => 'select',
							'label' => 'Industry',
							'options' => $industries,
							'value' => $position['PositionIndustry'][1]['industry_id']));

						echo $this->Form->input('PositionIndustry.2.id', array(
							'value' => $position['PositionIndustry'][2]['id']));

						echo $this->Form->input('PositionIndustry.2.industry_id', array(
							'type' => 'select',
							'label' => 'Industry',
							'options' => $industries,
							'value' => $position['PositionIndustry'][2]['industry_id']));

						echo $this->Form->input('PositionFunction.0.id', array(
							'value' => $position['PositionFunction'][0]['id']));

						echo $this->Form->input('PositionFunction.0.work_function_id', array(
							'type' => 'select',
							'label' => 'Function',
							'options' => $functions,
							'value' => $position['PositionFunction'][0]['work_function_id']));

						echo $this->Form->input('PositionFunction.1.id', array(
							'value' => $position['PositionFunction'][1]['id']));

						echo $this->Form->input('PositionFunction.1.work_function_id', array(
							'type' => 'select',
							'label' => 'Function',
							'options' => $functions,
							'value' => $position['PositionFunction'][1]['work_function_id']));

						echo $this->Form->input('PositionFunction.2.id', array(
							'value' => $position['PositionFunction'][2]['id']));

						echo $this->Form->input('PositionFunction.2.work_function_id', array(
							'type' => 'select',
							'label' => 'Function',
							'options' => $functions,
							'value' => $position['PositionFunction'][2]['work_function_id']));

						echo $this->Form->input('responsibilities', array(
							'type' => 'textarea',
							'value' => $position['Position']['responsibilities']));
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
