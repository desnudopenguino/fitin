<div class="list-group-item">
	<a class="message" data-toggle="collapse" data-target="#message_<?php echo $message['Message']['id']; ?>" href="#">
		<span class="name" style="display: inline-block; width:10em;">
			<?php echo $message['Message']['sender_id']; ?>
		</span>
		<span class="title">
			<?php echo $message['Message']['title']; ?>
		</span>
		<span class="time pull-right">
			<?php echo $message['Message']['created']; ?>
		</span>
	</a>
		<p id="message_<?php echo $message['Message']['id']; ?>" style="display: none; margin-top:2em; margin-left:3em;"><?php echo $message['Message']['message']; ?></p>
</div>

