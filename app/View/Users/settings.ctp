<div class="row">
	<?php if($user['status_id'] == 1 || $user['status_id'] == 3) {
			echo $this->element('Settings/confirm_email');
		} ?>

	<div class="col-md-4 col-md-offset-4">
		<h2>Currently Under Construction</h2>
	</div>
</div>
