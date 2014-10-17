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
		echo $this->Html->script(array("https://code.jquery.com/jquery-2.1.1.min.js"));
		echo $this->Html->script(array("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
			<div class="navbar-right">
				<?php echo $this->element('login'); ?>
			</div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
	<div id="container">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	</div>
		<?php echo $this->element('footer'); //footer code ?>
</body>
</html>
