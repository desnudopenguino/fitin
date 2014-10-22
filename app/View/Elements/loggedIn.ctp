<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">(username)<span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li><a href="#">Privacy</a></li>
    <li><a href="#">Settings</a></li>
    <li class="divider"></li>
		<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
    <li><a href="#">Logout</a></li>
  </ul>
</li>
