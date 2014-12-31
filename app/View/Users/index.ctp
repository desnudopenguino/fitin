<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<h1>Admin Panel</h1>
		<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>email</th>
				<th>Role</th>
				<th>Status</th>
				<th>url</th>
				<th>Joined Date</th>
			</tr>
		<?php foreach($users as $user) { 
			$this->set('user', $user);
			echo $this->element('Users/row');
		 } ?>
		</table>
	</div>
</div>
