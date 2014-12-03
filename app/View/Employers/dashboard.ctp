<?php $this->set('messages', $employer['User']['Message']);
?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2>Welcome, <?php echo $employer['User']['email']; ?></h2>
		<ul class="nav nav-pills nav-stacked">
			<li><a class="dashboard-nav" href="#" id="inbox-btn">Messages</a></li>
			<li><a class="dashboard-nav" href="#" id="applications-btn">Applications</a></li>
		</ul>
	</div>
	<div class="col-md-6 col-md-offset-1" id="dashboardContent">
	</div>
</div>
<?php echo $this->Html->script('employer_dashboard');
