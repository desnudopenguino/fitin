<div class="row">
	<?php 
		if($user['User']['status_id'] == 1 || $user['User']['status_id'] == 3) {
			echo $this->element('Settings/confirm_email');
		}
		if(empty($customer)) {
			echo $this->element('Settings/checkout');
		} else {
			echo $this->element('Settings/subscription');
		}
		 ?>
	<div class="col-md-4 col-md-offset-4">
		<h2>Currently Under Construction</h2>
	</div>
</div>
