<div class="row">
<?php debug($companies); ?>
	<div class="col-md-10 col-md-offset-1">
		<?php foreach($companies as $company) { ?>
		<p>
			<?php echo $this->Html->link($company['id'], array(
				'controller' => 'companies', 'action' => 'view', $company['id'])); ?>
		</p>
		<?php } ?>
	</div>
</div>
