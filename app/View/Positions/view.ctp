<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>
			<?php echo $position['Position']['title'] ." in ". $position['Position']['Employer']['department_name'] ." department at ". $position['Position']['Employer']['Company']['Organization']['organization_name']; ?>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php if(isset($results)) { ?>
		<div class="row ">
			<div class="col-md-5">
				<div class="row">
					<?php
						echo $this->element('Culture/match'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						<?php
							if(isset($position['Applied'])) {
								$disabled = "disabled";
								$text = "Applied";
							} else { $disabled = ""; $text = "Apply"; }
							echo $this->Html->link('<i class="glyphicon glyphicon-send"></i> '.$text, array(
								'controller' => 'applications', 'action' => 'apply', $position['Position']['id']),
								array('class' => 'btn btn-primary apply '. $disabled,
									'id' => 'apply_'.$position['Position']['id'],
									'escape' => false)); ?>
					</div>
					<div class="col-md-6">
						<?php 
							echo $this->Form->create('Message', array(
								'action' => 'compose',
								'class' => 'form-inline'));

							echo $this->Form->input('receiver_id', array(
								'type' => 'hidden',
								'value' => $position['Position']['employer_id']));

							echo $this->Form->input('title', array(
								'type' => 'hidden',
								'value' => $position['Position']['title']));

							echo $this->Form->button('<i class="glyphicon glyphicon-envelope"></i> Message', array(
								'class' => 'btn btn-primary',
								'type' => 'submit'));

							echo $this->Form->end(); 
						?>
					</div>
				</div>
			</div>
		</div>
		<?php } else {
			echo $this->Html->link('<i class="glyphicon glyphicon-login"></i> Login to apply', array(
				'controller' => 'users', 'action' => 'login'),
				array('class' => 'btn btn-primary',
					'escape' => false)); } ?>
		<h3>Position Info: </h3>
		<div>
		<h4>Responsibilities:</h4>
		<p><?php echo $position['Position']['responsibilities']; ?></p>
		<div class="row">
			<div class="col-md-4">
				<h4>Industries:</h4>
				<ul class="list-group">
				<?php foreach($position['Position']['PositionIndustry'] as $industry) { ?>
					<li class="list-group-item"><?php echo $industry['Industry']['industry_type']; ?></li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Functions:</h4>
				<ul class="list-group">
				<?php foreach($position['Position']['PositionFunction'] as $function) { ?>
					<li class="list-group-item"><?php echo $function['WorkFunction']['function_type']; ?></li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Skills:</h4>
				<ul class="list-group">
				<?php foreach($position['Position']['PositionSkill'] as $skill) { ?>
					<li class="list-group-item"><?php echo $skill['Skill']['skill_type']; ?></li>
				<?php } ?>
				</ul>
			</div>
		</div>	
		<h3>Department Info:</h3>
		<p>
			<?php echo $position['Position']['Employer']['department_description']; ?>
		</p>
		<h3>Company Info:</h3>
		<p>
			<?php echo $position['Position']['Employer']['Company']['description']; ?>
		</p>
	</div>
</div>
