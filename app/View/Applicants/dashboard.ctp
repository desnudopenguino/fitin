<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2>Welcome, <?php echo $applicant['Applicant']['display_name']; ?></h2>
		<ul class="nav nav-pills nav-stacked">
			<li><a class="dashboard-nav" href="#" id="inbox-btn">Messages</a></li>
			<li><a class="dashboard-nav" href="#" id="applications-btn">Applications</a></li>
			<li><?php echo $this->Html->link('Premium Services', array(
				'controller' => 'users', 'action' => 'checkout'), array(
				'class' => 'dashboard-nav')); ?></li>
		</ul>
	</div>
	<div class="col-md-6 col-md-offset-1" id="dashboardContent">
		<?php echo $this->element('dashboard_welcome'); ?>
	</div>
</div>
<?php echo $this->Html->script('applicant_dashboard'); ?>
<?php echo $this->Html->script('applicant_applications'); ?>
<?php echo $this->Html->script('message'); ?>
