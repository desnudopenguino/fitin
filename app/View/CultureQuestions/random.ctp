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

</fieldset>
<?php
	echo $this->Form->submit('submit', array(
		'div' => 'form-group',
		'class' => 'btn btn-primary'));
	echo $this->Form->end(); ?>
</div>

