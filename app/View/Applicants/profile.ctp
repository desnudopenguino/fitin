<?php 
	$this->set('projects', $applicant['Project']);
	$this->set('educations', $applicant['Education']);
	$this->set('certifications', $applicant['Certification']);
?>
<div class="row">
	<div class="col-md-3 col-md-offset-1 well">
		<h2><?php 
				echo $applicant['Applicant']['display_name']; ?><?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array(
					'controller' => 'applicants', 'action' => 'edit', $applicant['User']['id']),
					array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
		</h2>
		<p>Phone:
			<?php if(!empty($applicant['User']['PhoneNumber'])) {
				echo $applicant['User']['PhoneNumber']['phone_number']; 
			}?>
		</p>
		<p>Location:
			<?php if(!empty($applicant['User']['Address'])) {
				echo $applicant['User']['Address']['street']; ?><br>
				<?php echo $applicant['User']['Address']['city']; ?>,
				<?php echo $applicant['User']['Address']['state']; ?>
				<?php echo $applicant['User']['Address']['zip']; ?><br>
				<?php echo $applicant['User']['Address']['country']; 
			}?>
		</p>
		<p><?php echo $applicant['User']['email']; ?></p>
		<p><?php echo $this->Html->link("My URL",
			"/hire/".$applicant['User']['url']); 
			echo "&nbsp";
			echo $this->Html->image('tooltip.png',array(
				'class' => 'masterTooltip',
				'title' => 'See your public profile page. Share your unique link on your company\'s career page or job boards')); ?></p>
			<script language="JavaScript">
			  function selectText(textField) 
			  {
			    textField.focus();
			    textField.select();
			  }
			</script>
			<?php echo $this->Form->input('My URL', array(
				'label' => 'My URL '.$this->Html->image('tooltip.png',array(
					'class' => 'masterTooltip',
					'title' => 'Click in the textbox below and copy your url to share with others')),
				'type' => 'text',
				'size' => '30',
				'onClick' => 'selectText(this)',
				'value' => Router::fullbaseUrl() ."/hire/". $applicant['User']['url'])); ?>
	</div>
	<div class="col-md-6 col-md-offset-1">
		<?php echo $this->element('Projects/owner_index'); ?>	
		<?php echo $this->element('Educations/owner_index'); ?>	
		<?php echo $this->element('Certifications/owner_index'); ?>	
	</div>
</div>
<?php echo $this->Html->script('general'); ?>
