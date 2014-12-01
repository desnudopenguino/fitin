<div>
	<?php debug($message); ?>
	<a class="list-group-item">
		<span class="name"><?php echo $message['Message']['sender_id']; ?></span>
		<span class="title"><?php echo $message['Message']['title']; ?></span>
		<span class="time pull-right"><?php echo $message['Message']['created']; ?></span>
	</a>
</div>		

