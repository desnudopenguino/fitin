<div class="row">
	<h3>As settings are added, they will show up here</h3>
	<hr>
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
</div>
