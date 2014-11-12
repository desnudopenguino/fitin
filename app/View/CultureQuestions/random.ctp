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
	foreach($question['CultureQuestionAnswer'] as $answer) {
		echo $this->Form->button($answer['answer_text'], array(
			'value' => $answer['id']));
	} ?>
</fieldset>
<?php	echo $this->Form->end(); ?>
</div>

