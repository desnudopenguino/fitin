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

		$this->Form->unlockField('ApplicantPersonalityAnswer.personality_question_answer_id');
	echo $this->Form->input('ApplicantPersonalityAnswer.personality_question_answer_id', array(
		'value' => 0,
		'type' => 'hidden',
		'id' => 'answer'));

	foreach($question['PersonalityQuestionAnswer'] as $answer) {
		echo $this->Form->button($answer['answer_text'], array(
			'value' => $answer['id'],
			'class' => 'btn btn-primary btn-block personality-choice'));
	} ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>

