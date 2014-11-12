<?php debug($question); ?>
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

	echo $this->Form->input('UserCultureAnswer.culture_question_answer_id', array(
		'value' => 0,
		'type' => 'hidden',
		'id' => 'answer'));

	foreach($question['CultureQuestionAnswer'] as $answer) {
		echo $this->Form->button('UserCultureAnswer.culture_question_answer_id', array(
			'value' => $answer['id'],
//			'type' => 'button',
			'class' => 'btn btn-primary btn-block cultureChoice'));
	} ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>

