<div class="well">
	<h2>Culture Match:</h2>
	<div class="row">
		<div class="col-md-4">
			Total: <?php echo $culture['Total']['percent']; ?>% 
		</div>
		<div class="col-md-8" title="Total match: <?php echo $culture['Total']['percent']; ?>">
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $culture['Total']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $culture['Total']['percent']; ?>%;"></div>
			</div>
		</div>
	</div>
	<?php unset($culture['Total']);
		foreach($culture as $aCulture) { ?>
	<div class="row">
		<div class="col-md-4">
			<?php echo $aCulture['name']; ?>: <?php echo $aCulture['percent']; ?>% 
		</div>
		<div class="col-md-8" title="Total match: <?php echo $aCulture['percent']; ?>">
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $aCulture['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $aCulture['percent']; ?>%;"></div>
			</div>
		</div>
	</div>
	<?php	} ?>
</div>
