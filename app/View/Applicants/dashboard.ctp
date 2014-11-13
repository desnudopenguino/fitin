<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2>Welcome, <?php echo $applicant['Applicant']['display_name']; ?></h2>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="#" id="inbox-btn">Inbox</a></li>
			<li><a href="#" id="applications-btn">Applications</a></li>
		</ul>
	</div>
	<div class="col-md-6 col-md-offset-1" id="dashboardContent">
		<?php echo $this->element('Messages/inbox'); ?>
	</div>
</div>
<?php echo $this->Html->script('applicant_dashboard');
