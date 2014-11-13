<div class="well">
<?php echo $this->Form->create('UserCultureAnswer', array(
	'action' => 'add',
	'method' => 'post',
	'inputDefaults' =>array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'),
	'id' => 'saveUserCultureAnswerForm' )); ?>
<fieldset>
<h2><?php echo $question['CultureQuestion']['question_text']; ?></h2>

<?php
	echo $this->Form->input('UserCultureAnswer.culture_question_id', array(
		'value' => $question['CultureQuestion']['id'],
		'type' => 'hidden'));

		$this->Form->unlockField('UserCultureAnswer.culture_question_answer_id');
	echo $this->Form->input('UserCultureAnswer.culture_question_answer_id', array(
		'value' => 0,
		'type' => 'hidden',
		'id' => 'answer'));

	foreach($question['CultureQuestionAnswer'] as $answer) {
		echo $this->Form->button($answer['answer_text'], array(
			'value' => $answer['id'],
			'class' => 'btn btn-primary btn-block culture-choice'));
	} ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>
