<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php foreach($companies as $company) { ?>
		<p>
			<?php echo $this->Html->link($company['Company']['url'], array(
				'controller' => 'companies', 'action' => 'view', $company['Company']['url'])); ?>
		</p>
		<?php } ?>
	</div>
</div>
