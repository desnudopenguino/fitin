<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			<h2>Welcome, <?php echo $applicant['Applicant']['display_name']; ?></h2>
			<span class="label label-primary"><?php echo $applicant['User']['UserLevel']['description']; ?></span>
			<ul class="nav nav-pills nav-stacked">
				<li><a class="dashboard-nav" href="#" id="inbox-btn">Messages
					<?php echo $this->Html->image('tooltip.png',array(
						'class' => 'masterTooltip',
						'title' => 'Keep track of messages on your dashboard page.')); ?></a>
					</li>
				<li><a class="dashboard-nav" href="#" id="applications-btn">Applications
					<?php echo $this->Html->image('tooltip.png',array(
						'class' => 'masterTooltip',
						'title' => 'Keep track of applications on your dashboard page. Cancel an application if you\re no longer interested')); ?></a>
				</li>
				<li>
					<a class="dashboard-nav" href="#" id="settings-btn">Settings</a>
				</li>
				<?php if(empty($applicant['User']['Customer'])) { ?>
				<li>
					<a class="dashboard-nav" href="#" id="services-btn">Premium Services</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-1" id="dashboardContent">
		<?php echo $this->element('dashboard_welcome'); ?>
	</div>
</div>
<?php echo $this->Html->script('applicant_dashboard'); ?>
<?php echo $this->Html->script('applicant_applications'); ?>
<?php echo $this->Html->script('message'); ?>
