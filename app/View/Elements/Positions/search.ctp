<div class="row well">
	<div class="accordion">
		<div class="accordion-group">
			<div class="accordion-heading clearfix">
				<div class="col-md-3">
					<h2><?php echo $position_card['DataCard']['Info']['title']; ?></h2>
				</div>
				<div class="col-md-8 col-md-offset-1">
					<div class="row">
						<div class="col-md-11" title="<?php echo $position_card['Results']['percent']; ?>% Job Match">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $position_card['Results']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $position_card['Results']['percent']; ?>%;">
									<?php echo $position_card['Results']['percent']; ?>% Job Match
								</div>
							</div> 
						</div>
						<div class="col-md-11" title="<?php echo $position_card['Culture']['Total']['percent']; ?>% Culture Match">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $position_card['Culture']['Total']['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $position_card['Culture']['Total']['percent']; ?>%;">
									<?php echo $position_card['Culture']['Total']['percent']; ?>% Culture Match
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-body" id="id">
				<div class="row">
					<div class="col-md-5">
						<h3>Education:</h3>
						<ul class="list-group">
						<?php foreach($position_card['DataCard']['Education'] as $education) {
							?>
							<li class="list-group-item"><?php echo $education['degree']; ?> in <?php echo $education['industry']; ?></li>
							<?php
						} ?>
						</ul>
						<h3>Certifications:</h3>
						<ul class="list-group">
						<?php foreach($position_card['DataCard']['Certification'] as $certification) {
							?>
							<li class="list-group-item"><?php echo $certification; ?></li>
							<?php
						} ?>
						</ul>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<h3>Experience:</h3>
						<?php echo $position_card['DataCard']['MinimumExperience']; ?> to <?php echo $position_card['DataCard']['MaximumExperience']; ?> years of experience with:
						<table class="table table-striped">
							<tr>
								<th>Type</th>
								<th>Name</th>
							</tr>
							<?php 
								foreach($position_card['DataCard']['Function'] as $function) { ?>
							<tr>
								<td>Function</td>
								<td><?php echo $function['function']; ?></td>
							</tr>
							<?php }
								foreach($position_card['DataCard']['Industry'] as $industry) { ?>
							<tr>
								<td>Industry</td>
								<td><?php echo $industry['industry']; ?></td>
							</tr>
							<?php }
								foreach($position_card['DataCard']['Skill'] as $skill) { ?>
							<tr>
								<td>Skill</td>
								<td><?php echo $skill['skill']; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="row">
						<div class="col-md-12">
						<?php //apply
							echo $this->Html->link('<i class="glyphicon glyphicon-sent"></i> Apply', array(
								'cortroller' => 'applications', 'action' => 'add', $position_card['DataCard']['Info']['id']),
								array('class' => 'btn btn-primary', 'escape' => false)); 
							//view profile
							//contact
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
