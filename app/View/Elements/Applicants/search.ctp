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
					<ul class="list-group">
					<?php foreach($applicant_card['DataCard']['Education'] as $education) {
						?>
						<li class="list-group-item"><?php echo $education['degree']; ?> in <?php echo $education['industry']; ?></li>
						<?php
					} ?>
					</ul>
				</div>
				<div class="col-md-6">
					Experience
					<table>
						<tr>
							<th>Type</th>
							<th>Name</th>
							<th>Exp.</th>
						</tr>
						<?php foreach($applicant_card['DataCard']['Certification'] as $certification) { ?>
						<tr>
							<td>Cert</td>
							<td><?php echo $certification ?></td>
							<td>N/A</td>
						</tr>
						<?php }
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
