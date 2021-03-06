<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		FitIn.Today 
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"));
		echo $this->Html->css('splash.css');
		echo $this->Html->script(array("https://code.jquery.com/jquery-2.1.1.min.js"));
		echo $this->Html->script(array("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"));
	?>
</head>
<body>
	<div class="site-wrapper bodysplash">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">FitIn.Today</h3>
						<ul class="nav masthead-nav">
							<li>
								<a href="http://pr.fitin.today/about.html" target="_blank">About Us</a>
							</li>
							<li>
								<a href="http://pr.fitin.today" target="_blank">Blog</a>
							</li>
							<li>
								<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
							</li>
						</ul>
					</div>
				</div>
				<div class="inner cover">
					<p class="lead">FitIn is a company culture matching tool that matches job seekers and employers based on sociology. Find a place you FitIn. </p>
					<p class="lead">
					<?php echo $this->Html->link("Register as a Job Seeker", array('controller' => 'applicants', 'action' => 'register'), array('class' => 'btn btn-lg btn-info')); ?> 
					<?php echo $this->Html->link("Register as an Employer", array('controller' => 'employers', 'action' => 'register'), array('class' => 'btn btn-lg btn-info')); ?>
					</p>
				</div>
				<div class="mastfoot">
					<div class="inner">
						<p>&copy; 2015 FitIn.Today</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
