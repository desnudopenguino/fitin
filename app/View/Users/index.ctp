<?php debug($users); ?>
<h1>Admin Panel</h1>
<table class="table striped">
	<tr>
		<th>#</th>
		<th>email</th>
		<th>Role</th>
		<th>Joined Date</th>
		<th>Status</th>
		<th>url</th>
	</tr>
<?php foreach($users as $user) { ?>
	<tr>
		<td><?php echo $user['id']; ?></th>
		<td><?php echo $user['email']; ?></th>
		<td><?php echo $user['roleId']; ?></th>
		<td><?php echo $user['created']; ?></th>
		<td><?php echo $user['status']; ?></th>
		<td><?php echo $user['url']; ?></th>
	</tr>
<?php } ?>
</table>
