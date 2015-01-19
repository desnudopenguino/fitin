<div class="row">
       <div class="col-md-10 col-md-offset-1">
               <h2>Subscription Info:</h2>
               <p>Here will go your subscription data</p>
               <table class="table">
                       <tr>
                               <th>Level</th>
                               <th>Cost</th>
                               <th>Duration</th>
                               <th></th>
                       </tr>
                       <tr>
                               <td><?php echo $settings['UserLevel']['description']; ?></td>
                               <td>$<?php echo $settings['UserLevel']['price']; ?></td>
                               <td><?php echo $settings['UserLevel']['duration']; ?></td>
                               <td>
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-targe-                                       <?php
                                               echo $this->element('Settings/subscription_modal'); ?>
                               </td>
                       </tr>
               </table>
       </div>
</div>
