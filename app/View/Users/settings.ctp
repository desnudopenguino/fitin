<div class="row">
	<?php 
debug($user);
debug($customer);
		if($user['User']['status_id'] == 1 || $user['User']['status_id'] == 3) {
			echo $this->element('Settings/confirm_email');
		}

		echo $this->element('Settings/subscription');
		 ?>
	<div class="col-md-4 col-md-offset-4">
		<h2>Currently Under Construction</h2>
	</div>
</div>
