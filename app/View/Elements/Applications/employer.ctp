<?php debug($application); ?>
<div class="col-md-12 well">
<h3><?php echo $application['Application']['Position']['title']; ?></h3>
<p>Job Match: <?php echo $application['Results']['percent']; ?>% 
Culture Match: <?php echo $application['Culture']['Total']['percent']; ?>%</p>
</div>
