<?php debug($applicant_card); ?>
<div class="row well">
	<div class="accordion">
		<div class="accordion-group">
			<div class="accordion-heading">
				<div class="col-md-3">
					User Name
				</div>
				<div class="col-md-3 col-md-offset-1">
					Culture Match: <?php echo $applicant_card['Culture']['percent']; ?>%
				</div>
				<div class="col-md-3 col-md-offset-1">
					Job Match: <?php echo $applicant_card['Results']['percent']; ?>%
				</div>
			</div>
			<div class="accordion-body" id="id">
				<div class="col-md-2">
					Education
				</div>
				<div class="col-md-2">
					Functions	
				</div>
				<div class="col-md-2">
					Industries	
				</div>
				<div class="col-md-2">
					Skills	
				</div>
			</div>
		</div>
	</div>
</div>
