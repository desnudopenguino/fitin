<div class="row">
<?php debug($this->Auth->user()); ?>
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
		<?php foreach($users as $user) { ?>
			<tr>
				<td><?php echo $user['User']['id']; ?></th>
				<td><?php echo $user['User']['email']; ?></th>
				<td><?php echo $user['User']['role_id']; ?></th>
				<td><?php echo $user['User']['status_id']; ?></th>
				<td><?php echo $user['User']['url']; ?></th>
				<td><?php echo $user['User']['created']; ?></th>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
