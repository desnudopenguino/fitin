<div>
	<a class="list-group-item message" data-toggle="collapse" data-target="#message_<?php echo $message['Message']['id']; ?>" href="#">
		<span class="name" style="display: inline-block; width:10em;">
			<?php echo $message['Message']['receiver_id']; ?>
		</span>
		<span class="title">
			<?php echo $message['Message']['title']; ?>
		</span>
		<span class="time pull-right">
			<?php echo $message['Message']['created']; ?>
		</span>
	</a>
</div>
<div id="message_<?php echo $message['Message']['id']; ?>" style="display: none;">
	<p><?php echo $message['Message']['message']; ?></p>
</div>

