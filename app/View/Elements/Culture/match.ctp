<div class="col-md-11" title="<?php echo $results['percent']; ?>% Job Match">
	<div class="progress">
		<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $results['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $results['percent']; ?>%;">
			<?php echo $results['percent']; ?>% Job Match
		</div>
	</div> 
</div>
<div class="col-md-11" title="<?php echo $culture['Total']['percent']; ?>% Culture Match">
	<div class="progress">
		<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $culture['Total']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $culture['Total']['percent']; ?>%;">
			<?php echo $culture['Total']['percent']; ?>% Culture Match
		</div>
	</div> 
</div>
