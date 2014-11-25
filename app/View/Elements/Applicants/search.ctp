<?php debug($applicant_card); ?>
<div class="row well">
	<div class="accordion">
		<div class="accordion-group">
			<div class="accordion-heading">
				<div class="col-md-3">
					<h2>User Name</h2>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<div class="row">
						<div class="col-md-11">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $applicant_card['Culture']['Total']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $applicant_card['Culture']['Total']['percent']; ?>%;">
									Culture Match - <?php echo $applicant_card['Culture']['Total']['percent']; ?>%
								</div>
							</div> 
						</div>
						<div class="col-md-11">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $applicant_card['Results']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $applicant_card['Results']['percent']; ?>%;">
									Job Match - <?php echo $applicant_card['Results']['percent']; ?>%
								</div>
							</div> 
						</div>
					</div>	
				</div>
				<div class="col-md-3 col-md-offset-1">
					<h3>Job Match: <?php echo $applicant_card['Results']['percent']; ?>%</h3>
				</div>
			</div>
			<div class="accordion-body" id="id">
				<div class="row">
					<div class="col-md-4">
						<h3>Education:</h3>
						<ul class="list-group">
						<?php foreach($applicant_card['DataCard']['Education'] as $education) {
							?>
							<li class="list-group-item"><?php echo $education['degree']; ?> in <?php echo $education['industry']; ?></li>
							<?php
						} ?>
						</ul>
						<h3>Certifications:</h3>
						<ul class="list-group">
						<?php foreach($applicant_card['DataCard']['Certification'] as $certification) {
							?>
							<li class="list-group-item"><?php echo $certification; ?></li>
							<?php
						} ?>
						</ul>
					</div>
					<div class="col-md-4">
						<h3>Experience:</h3>
						<table class="table table-striped">
							<tr>
								<th>Type</th>
								<th>Name</th>
								<th>Exp. (years)</th>
							</tr>
							<?php 
								foreach($applicant_card['DataCard']['Function'] as $function) { ?>
							<tr>
								<td>Function</td>
								<td><?php echo $function['function']; ?></td>
								<td><?php echo $function['totalDuration']; ?></td>
							</tr>
							<?php }
								foreach($applicant_card['DataCard']['Industry'] as $industry) { ?>
							<tr>
								<td>Industry</td>
								<td><?php echo $industry['industry']; ?></td>
								<td><?php echo $industry['totalDuration']; ?></td>
							</tr>
							<?php }
								foreach($applicant_card['DataCard']['Skill'] as $skill) { ?>
							<tr>
								<td>Skill</td>
								<td><?php echo $skill['skill']; ?></td>
								<td><?php echo $skill['totalDuration']; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
