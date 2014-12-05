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
	<div id="message_<?php echo $message['Message']['id']; ?>" style="display: none; margin-top:1em; padding-top: 1em; padding-left:2em; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; padding-bottom: 1em;">
		<p>
			<?php echo $message['Message']['message']; ?>
		</p>
	</div>
</div>

