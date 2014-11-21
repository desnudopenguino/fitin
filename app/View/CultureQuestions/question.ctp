<div class="well">
<?php echo debug($question); ?>
	<div class="row"style="margin-top:10px;">
		<div class="col-md-6">
			<button type="button" id="undoCultureQuestion" class="btn btn-danger btn-block">Undo Last Question</button>
		</div>
		<div class="col-md-6">
			<button type="button" id="skipCultureQuestion" class="btn btn-warning btn-block">Skip Question</button>
		</div>
	</div>
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
	if(!empty($user_answer)) {
		echo $this->Form->input('UserCultureAnswer.id', array(
			'value' => $user_answer['UserCultureAnswer']['id'],
			'type' => 'hidden'));
	}

		$this->Form->unlockField('UserCultureAnswer.culture_question_answer_id');
	echo $this->Form->input('UserCultureAnswer.culture_question_answer_id', array(
		'value' => 0,
		'type' => 'hidden',
		'id' => 'answer'));

	foreach($question['CultureQuestionAnswer'] as $answer) {
		if(!empty($user_answer) && 
			$user_answer['UserCultureAnswer']['culture_question_answer_id'] == $answer['id']) {
				$class = 'btn btn-success btn-block culture-choice';
		} else { $class = 'btn btn-primary btn-block culture-choice'; }
		echo $this->Form->button($answer['answer_text'], array(
			'value' => $answer['id'],
			'class' => $class));
	} ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>

