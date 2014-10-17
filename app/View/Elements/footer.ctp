<div class="row" id="footer" style="text-align: center;">
	<div>
		<?php $image = $this->Html->image('linkedin.png',
        array('alt' => 'FitIn on LinkedIn',
          'width' => '35'
				)
			);
			echo $this->Html->link(
					$image,
					"https://www.linkedin.com/company/5220722",
					array('target' => '_blank',
						'escape' => false
					)
      	); ?> 

     <?php $image = $this->Html->image('twitter.png',
        array('alt' => 'FitIn on Twitter',
          'width' => '35'
        )     
			);
			echo $this->Html->link(
				$image,
				"https://twitter.com/fitin_today",
				array('target' => '_blank',
					'escape' => false
				)
			); ?> 

     <?php $image =  $this->Html->image('email.png',
        array('alt' => 'Email FitIn',
          'width' => '35'
        )
			);
			echo $this->Html->link(
				$image,
        "mailto:willow@fitin.today",
				array('target' => '_blank',
					'escape' => false
				)
			); ?> 

     <?php $image = $this->Html->image('facebook.png',
        array('alt' => 'FitIn on Facebook',
          'width' => '35'
        )     
			);
			echo $this->Html->link(
				$image,
        "https://www.facebook.com/FitIn.Today",
				array('target' => '_blank',
					'escape' => false
				)
			); ?> 


     <?php $image = $this->Html->image('rss.png',
        array('alt' => 'FitIn Blog',
          'width' => '35'
        )     
			);
			echo $this->Html->link(
				$image,
        "http://pr.fitin.today/",
				array('target' => '_blank',
					'escape' => false
				)
			); ?> 
	</div>
	<h4 class="text-center" color="#666666">Copyright &copy; FitInToday 2014</h4>
</div>
