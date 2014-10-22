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
		<td><?php echo $user['User']['id']; ?></th>
		<td><?php echo $user['User']['email']; ?></th>
		<td><?php echo $user['User']['roleId']; ?></th>
		<td><?php echo $user['User']['statusId']; ?></th>
		<td><?php echo $user['User']['url']; ?></th>
		<td><?php echo $user['User']['created']; ?></th>
	</tr>
<?php } ?>
</table>
