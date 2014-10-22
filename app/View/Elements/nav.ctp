<ul class="nav navbar-nav">
	<?php if($this->request->params['action'] == 'dashboard') { ?>
		<li class="active">
	<?php } else { ?>
		<li>
	<?php }
		echo $this->Html->link('Dashboard', array('controller' => 'users', 'action' => 'dashboard')); ?></li>
	<?php if($this->request->params['action'] == 'profile') { ?>
		<li class="active">
	<?php } else { ?>
		<li>
	<?php }
		echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'profile')); ?></li>
	<?php if($this->request->params['action'] == 'culture') { ?>
		<li class="active">
	<?php } else { ?>
		<li>
	<?php }
		echo $this->Html->link('Culture', array('controller' => 'users', 'action' => 'culture')); ?></li>
	<?php if($this->request->params['action'] == 'search') { ?>
		<li class="active">
	<?php } else { ?>
		<li>
	<?php }
		echo $this->Html->link('Search', array('controller' => 'users', 'action' => 'search')); ?></li>
</ul>
