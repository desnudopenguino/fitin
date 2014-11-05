<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $userData['email']; ?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><?php echo $this->Html->link('<i class="glyphicon glyphicon-cog"></i> Settings', array('controller' => 'users', 'action' => 'settings')); ?></li>
			<li><?php echo $this->Html->link('<i class=glyphicon glyphicon-lock"></i> Privacy', array('controller' => 'users', 'action' => 'privacy')); ?></li>
	    <li class="divider"></li>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
	  </ul>
	</li>
</ul>
