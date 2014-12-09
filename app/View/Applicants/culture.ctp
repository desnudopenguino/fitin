<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2>Culture</h2>
		<button type="button" class="btn btn-primary" id="cultureQuestions">Answer Culture Questions</button>
		<p><span id="match"><?php echo $match; ?></span> of <span id="total"><?php echo $total; ?> Questions Answered (<?php echo round($match / $total, 2) * 100; ?>% complete)</p>
		<h2>Personality</h2>
		<button type="button" class="btn btn-primary" id="personalityQuestions">Answer Personality Questions</button>
		<p>Personality Stats</p>
	</div>
	<div class="col-md-6 col-md-offset-1" id="cultureContent">
		<p>Choose a set of questions to answer on the left</p>
		<p><strong>Disclaimer:</strong> There are no right or wrong answers. No one will see your answers. Be honest, choose the answer closest to your feelings.</p>
	</div>
</div>
<?php echo $this->Html->script('culture_question'); ?>
<?php echo $this->Html->script('personality_question'); ?>
