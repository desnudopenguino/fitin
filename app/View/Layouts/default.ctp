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
		//echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('styles');
		echo $this->Html->script(array("https://code.jquery.com/jquery-2.1.1.min.js"));
		echo $this->Html->script(array("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style="padding-top: 70px;">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
				</button>
	
				<?php echo $this->Html->image('header.png',
					array('alt' => 'FitIn.Today',
						'url' => array(
							'controller' => 'pages',
							'action' => 'display', 'home'
						),
						'width' => '100px'
					)
				); ?>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php if($user_data) {
						echo $this->element('nav');
						echo $this->element('loggedIn');
					} else {
						echo $this->element('nav_login');
					} ?>
	    </div>
	  </div>
	</nav>
		<div id="container">
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
		</div>
	<?php echo $this->element('footer'); //footer code ?>
</body>
</html>
