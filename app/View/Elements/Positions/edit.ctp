<div class="modal fade" id="editPositionModal_<?php echo $position['id']; ?>" tabindex="-1" role="dialog" arial-labelledby="editPositionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Position</h4>
      </div>
			<?php 
				echo $this->Form->create('Position',array(
					'url' => '/positions/edit/'. $position['id'],
					'method' => 'post',
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'id' => 'editPositionForm_'. $position['id']
				)); ?>
      <div class="modal-body">
				<fieldset>
					<?php 
						echo $this->Form->input('Position.id', array(
							'value' => $position['id']));

						echo $this->Form->input('title', array(
							'type' => 'text',
							'value' => $position['title']));

						echo $this->Form->input('min_work_experience', array(
							'type' => 'text',
							'value' => $position['min_work_experience'],
							'label' => 'Minimum years of experience'));

						echo $this->Form->input('max_work_experience', array(
							'type' => 'text',
							'value' => $position['max_work_experience'],
							'label' => 'Maximum years of experience'));

						echo $this->Form->input('min_degree', array(
							'type' => 'select',
							'label' => 'Minimum Degree',
							'options' => $degrees,
							'value' => $position['min_degree']));

						echo $this->Form->input('max_degree', array(
							'type' => 'select',
							'label' => 'Maximum Degree',
							'options' => $degrees,
							'value' => $position['max_degree']));

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
							'label' => false,
							'empty' => 'Select an Industry',
							'options' => $industries,
							'value' => $position['PositionIndustry'][1]['industry_id']));

						echo $this->Form->input('PositionIndustry.2.id', array(
							'value' => $position['PositionIndustry'][2]['id']));

						echo $this->Form->input('PositionIndustry.2.industry_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select an Industry',
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
							'label' => false,
							'empty' => 'Select a Function',
							'options' => $functions,
							'value' => $position['PositionFunction'][1]['work_function_id']));

						echo $this->Form->input('PositionFunction.2.id', array(
							'value' => $position['PositionFunction'][2]['id']));

						echo $this->Form->input('PositionFunction.2.work_function_id', array(
							'type' => 'select',
							'label' => false,
							'empty' => 'Select a Function',
							'options' => $functions,
							'value' => $position['PositionFunction'][2]['work_function_id']));

						echo $this->Form->input('responsibilities', array(
							'type' => 'textarea',
							'value' => $position['responsibilities']));
						
						$skill_end = end($position['PositionSkill']);
						foreach($position['PositionSkill'] as $sKey => $skill) {
							$skill_names .= $skill['skill_name'];
							if($sKey != $skill_end) {
								$skill_names .= ', ';
							}
						}

						echo $this->Form->input('PositionSkill.skill_names', array(
							'type' => 'textarea',
							'label' => 'Skills',
							'value' => $skill_names));
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
