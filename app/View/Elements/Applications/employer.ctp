<?php debug($application); ?>
<div class="col-md-12 well">
<?php echo $application['Application']['Position']['title']; ?> 
Job Match: <?php echo $application['Results']['percent']; ?>% 
Culture Match: <?php echo $application['Culture']['Total']['percent']; ?>% 
</div>
