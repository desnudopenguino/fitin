<div class="row">
	<div class="col-md-10 col-md-offset-1">
	<?php
		echo $this->Form->create('Confirm',
			array('method' => 'post',
				'novalidate' => true,
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
	)); ?>
		<fieldset>
			<legend>Confirm Email</legend>
			<?php 
				echo $this->Form->button('Send Email Confirmation', array(
					'div' => 'form-group',
					'type' => 'submit',
					'class' => 'btn btn-lg btn-success btn-block'));
				?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
