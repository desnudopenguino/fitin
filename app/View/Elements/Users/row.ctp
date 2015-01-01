<?php
	switch($user['User']['status_id']) {
		case 0:
			$class = "danger";
			break;
		case 1:
		case 2:
		case 3:
			$class = "warning";
			break;
		case 4:
		case 5:
			$class = "success";
			break;
		default:
			$class = "";
			break;
} ?>
<tr class="<?php echo $class; ?>">
	<td><?php echo $user['User']['id']; ?></th>
	<td><?php echo $user['User']['email']; ?></th>
	<td><?php echo $user['User']['role_id']; ?></th>
	<td><?php echo $user['User']['status_id']; ?></th>
	<td><?php echo $this->Html->link($user['User']['url'], array(
			'controller' => 'users',
			'action' => 'view', $user['User']['url'])); ?></th>
	<td><?php echo $user['User']['created']; ?></th>
</tr>
