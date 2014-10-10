<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Register'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('roleId', array(
								'options' => array('1' => 'Employer','2' => 'Applicant'),
								'label' => "Role"
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
