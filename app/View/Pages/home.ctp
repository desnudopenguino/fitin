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
		echo $this->Html->css('styles');
		echo $this->Html->script(array("https://code.jquery.com/jquery-2.1.1.min.js"));
		echo $this->Html->script(array("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"));
		echo $this->Html->css('splash.css',null,array('inline' => false));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
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
							<li class="active">
								<a href="#">Login</a>
							</li>
							<li>
								<a href="http://pr.fitin.today/about.html">About Us</a>
							</li>
							<li>
								<a href="http://pr.fitin.today">Blog</a>
							</li>
							<li>
								<a href="">Login</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="inner cover">
					<h1 class="cover-heading">Hi.</h1>
					<p class="lead">FitIn is a company culture matching tool that matches job seekers and employers based on sociology. Find a place you FitIn. </p>
					<p class="lead"><a class="btn btn-lg btn-info" href="#">Register as a Job Seeker</a></p><p class="lead"><a class="btn btn-lg btn-info" href="#">Register as an Employer</a></p>
				</div>
				<div class="mastfoot">
					<div class="inner">
						<p>© 2014 FitIn.Today </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
