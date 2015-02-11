<div>
	<nav>
		<ul class="nav nav-tabs">
			<li role="presentation" class="mail-nav active" id="btn_inbox"><a href="#">Inbox</a></li>
			<li role="presentation" class="mail-nav" id="btn_sent"><a href="#">Sent Mail</a></li>
			<li role="presentation" class="mail-nav" id="btn_archive"><a href="#">Archive</a></li>
		</ul>
	</nav>
</div>
<div class="tab-content">
	<div id="mail_content">
		<?php
				if(empty($messages)) {
					echo $this->element('Messages/empty');
				} else {
				foreach($messages as $message) {
					$this->set('message', $message);
					echo $this->element('Messages/message');
				}
			} ?>
	</div>
</div>
