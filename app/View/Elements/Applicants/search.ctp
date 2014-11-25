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
					<ul>
					<?php foreach($applicant_card['DataCard']['Education'] as $education) {
						?>
						<li><?php echo $education['degree']; ?> in <?php echo $education['industry']; ?></li>
						<?php
					} ?>
					</ul>
				</div>
				<div class="col-md-2">
					Certifications	
					<ul>
					<?php foreach($applicant_card['DataCard']['Certification'] as $certification) {
						?>
						<li><?php echo $certification ?></li>
					<?php
					} ?>
					</ul>
				</div>
				<div class="col-md-2">
					Functions	
					<ul>
					<?php foreach($applicant_card['DataCard']['Function'] as $function) {
						?>
						<li><?php echo $function['function']; ?>: <?php echo $function['totalDuration']; ?> years</li>
					<?php
					} ?>
					</ul>
				</div>
				<div class="col-md-2">
					Industries	
					<ul>
					<?php foreach($applicant_card['DataCard']['Industry'] as $industry) {
						?>
						<li><?php echo $industry['industry']; ?>: <?php echo $industry['totalDuration']; ?> years</li>
					<?php
					} ?>
					</ul>
				</div>
				<div class="col-md-2">
					Skills	
					<ul>
					<?php foreach($applicant_card['DataCard']['Skill'] as $skill) {
						?>
						<li><?php echo $skill['skill']; ?>: <?php echo $skill['totalDuration']; ?> years</li>
					<?php
					} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
