<?php $this->set('messages', $employer['User']['Message']); ?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2>Welcome, <?php echo $employer['User']['email']; ?></h2>
		<span class="label label-primary"><?php echo $employer['User']['UserLevel']['description']; ?></span>
		<ul class="nav nav-pills nav-stacked">
			<li><a class="dashboard-nav" href="#" id="inbox-btn">Messages</a></li>
			<li><a class="dashboard-nav" href="#" id="applications-btn">Applications</a></li>
			<li><?php echo $this->Html->link('Premium Services', array(
        'controller' => 'users', 'action' => 'checkout'), array(
        'class' => 'dashboard-nav')); ?></li>
			<li><?php echo $this->Html->link('Settings', array(
				'controller' => 'users', 'action' => 'settings'), array(
				'class' => 'dashboard-nav')); ?></li>
		</ul>
	</div>
	<div class="col-md-6 col-md-offset-1" id="dashboardContent">
		<?php echo $this->element('dashboard_welcome'); ?>
	</div>
</div>
<?php echo $this->Html->script('employer_dashboard'); ?>
<?php echo $this->Html->script('employer_applications'); ?>
<?php echo $this->Html->script('message'); ?>
