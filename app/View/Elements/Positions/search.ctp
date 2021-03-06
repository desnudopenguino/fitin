<div class="row well">
	<div class="accordion">
		<div class="accordion-group">
			<div class="accordion-heading clearfix">
				<div class="col-md-3">
					<h2><?php echo $position_card['DataCard']['Info']['title']; ?></h2>
				</div>
				<div class="col-md-8 col-md-offset-1">
					<div class="row">
						<?php 
							$this->set('results', $position_card['Results']);
							$this->set('culture', $position_card['Culture']);
							echo $this->element('Culture/match'); ?>
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
						<div class="col-md-4">
						<?php
							if(isset($position_card['Applied'])) {
								$disabled = "disabled";
								$text = "Applied";
							} else { $disabled = ""; $text = "Apply"; }
							echo $this->Html->link('<i class="glyphicon glyphicon-send"></i> '.$text, array(
								'controller' => 'applications', 'action' => 'apply', $position_card['DataCard']['Info']['id']),
								array('class' => 'btn btn-primary apply '. $disabled,
									'id' => 'apply_'.$position_card['DataCard']['Info']['id'],
									'escape' => false)); ?>
						<?php //tooltip
							echo '&nbsp';
							echo $this->Html->image('tooltip.png',array(
								'class' => 'masterTooltip',
								'title' => 'One click apply. No cover letter required.'
							));
						?>
						</div>
						<div class="col-md-4">
							<?php
							echo $this->Html->link('View Position', array(
								'controller' => 'positions', 'action' => 'view', $position_card['DataCard']['Info']['id']),
								array(
									'class' => 'btn btn-primary',
									'escape' => false));
							//tooltip
							echo '&nbsp';
							echo $this->Html->image('tooltip.png',array(
								'class' => 'masterTooltip',
								'title' => 'View more details about this position.',
								'style' => 'padding-left:0.25em'
							));
							?>
						</div>
						<div class="col-md-4">
							<?php 
								echo $this->Form->create('Message', array(
									'action' => 'compose',
									'class' => 'form-inline'));

								echo $this->Form->input('receiver_id', array(
									'type' => 'hidden',
									'value' => $position_card['DataCard']['Info']['employer_id']));

								echo $this->Form->input('title', array(
									'type' => 'hidden',
									'value' => $position_card['DataCard']['Info']['title']));
	
								echo $this->Form->button('<i class="glyphicon glyphicon-envelope"></i> Message', array(
									'class' => 'btn btn-primary',
									'type' => 'submit'));
								//tooltip
								echo '&nbsp';
								echo $this->Html->image('tooltip.png',array(
									'class' => 'masterTooltip',
									'title' => 'Message this employer directly within FitIn.',
									'style' => 'padding-left:0.25em'
								));
								echo $this->Form->end(); 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
