<div class="row" id="footer" style="text-align: center;">
	<div>
		<?php $image = $this->Html->image('linkedin.png',
        array('alt' => 'FitIn on LinkedIn',
          'width' => '35'
				));
				echo $this->Html->link(
					$image,
					"https://www.linkedin.com/company/5220722",
					array('target' => '_blank',
						'escape' => 'false')
      	); ?> 

     <?php echo $this->Html->image('twitter.png',
        array('alt' => 'FitIn on Twitter',
          'url' => array("https://twitter.com/fitin_today"),    
          'width' => '35'
        )     
      ); ?> 

     <?php echo $this->Html->image('email.png',
        array('alt' => 'Email FitIn',
          'url' => array("mailto:willow@fitin.today"),    
          'width' => '35'
        )     
      ); ?> 

     <?php echo $this->Html->image('facebook.png',
        array('alt' => 'FitIn on Facebook',
          'url' => array("https://www.facebook.com/FitIn.Today"),    
          'width' => '35'
        )     
      ); ?> 

     <?php echo $this->Html->image('rss.png',
        array('alt' => 'FitIn Blog',
          'url' => array("http://pr.fitin.today/"),    
          'width' => '35'
        )     
      ); ?> 
	</div>
	<h4 class="text-center" color="#666666">Copyright &copy; FitInToday 2014</h4>
</div>
