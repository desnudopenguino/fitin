<div class="modal fade" id="updateCustomerModal" tabindex="-1" role="dialog" arial-labelledby="updateCustomerLabel"-  <div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class-        <h4 class="modal-title">Change Subscription</h4>
</div>
<?php
echo $this->Form->create('User',array(
'action' => 'updateSubscription',
'method' => 'post',
'inputDefaults' => array(
'div' => 'form-group',
'wrapInput' => false,
'class' => 'form-control'
),
'id' => 'updateCustomerForm'
)); ?>
<div class="modal-body">
<fieldset>
<?php
echo $this->Form->input('stripe_plan', array(
'type' => 'select',
'label' => 'Plan',
'options' => $plans)); ?>
</fieldset>
</div>
<div class="modal-footer">
<?php
echo $this->Form->submit('submit', array(
'div' => 'form-group',
'class' => 'btn btn-primary')
); ?>
</div>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
