<div class="row panel panel-default">
	<div class="panel-heading">
		<h2>Work Experience Positionsamp; Positions
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createPositionModal"><i class="glyphicon glyphicon-plus"></i> Create Position</button>
		</h2>
	</div>
	<div class="panel-body" id="positions">
			<?php foreach($positions as $position) { 
				$this->set('position', $position);
				$this->set('industries', $industries);
				$this->set('functions', $functions);
 				echo $this->element('Positions/block'); 
				} ?>
	</div>
</div>
<?php echo $this->element('Positions/add'); ?>
<?php echo $this->Html->script('position'); ?>
