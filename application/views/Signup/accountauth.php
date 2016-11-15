
     <section id="employer-info">
     <div class="container">
	 <?php
		if(isset($status)){
			if($status['status']!='error'){ ?>
				<img src="<?php echo ADMIN_IMG_PATH ?>check_true.png">
				<h1 class=""><?php echo $status['message']; ?></h1>
				
		<?php }else{ ?>
				<img src="<?php echo ADMIN_IMG_PATH ?>check_false.png">
				<h1 class=""><?php echo $status['message']; ?></h1>
				
		<?php	}
		}?>
		<button class="btn btn-default" onclick="window.location.href='<?php echo CMS_HOME_PATH;?>'">Click here to Login</button>
     </div>
     </section>

