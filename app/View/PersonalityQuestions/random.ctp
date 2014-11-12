<div class="well">
<?php echo $this->Form->create('ApplicantPersonalityAnswer', array(
	'action' => 'add',
	'method' => 'post',
	'inputDefaults' =>array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'),
	'id' => 'saveApplicantPersonalityAnswerForm' )); ?>
<fieldset>
<h2><?php echo $question['PersonalityQuestion']['question_text']; ?></h2>

<?php
	echo $this->Form->input('ApplicantPersonalityAnswer.personality_question_id', array(
		'value' => $question['PersonalityQuestion']['id'],
		'type' => 'hidden'));

		$this->Form->unlockField('ApplicantPersonalityAnswer.answer');
	echo $this->Form->input('ApplicantPersonalityAnswer.answer', array(
		'value' => 0,
		'type' => 'hidden',
		'id' => 'answer'));

		echo $this->Form->button('Very True', array(
			'value' => '2',
			'class' => 'btn btn-primary btn-block personality-choice'));

		echo $this->Form->button('Somewhat True', array(
			'value' => '1',
			'class' => 'btn btn-primary btn-block personality-choice'));

		echo $this->Form->button('Neutral', array(
			'value' => '0',
			'class' => 'btn btn-primary btn-block personality-choice'));

		echo $this->Form->button('Somewhat False', array(
			'value' => '-1',
			'class' => 'btn btn-primary btn-block personality-choice'));

		echo $this->Form->button('Very False', array(
			'value' => '-2',
			'class' => 'btn btn-primary btn-block personality-choice'));
	 ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>

