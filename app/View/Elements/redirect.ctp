<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>Are you <?php echo $url; ?>?</h2>

		<p>FitIn Today is the best way of eliminating new hire turnover, reducing recruitment costs, and making more informed hiring decisions. Sign up for free today to see how FitIn.Today can help you!</p>

		<?php echo $this->Html->link('Sign up now!', array(
			'controller' => 'pages',
			'action' => 'display', 'home'), array(
			'class' => 'btn btn-lg btn-primary')); ?>
	</div>
</div>
