
     <section id="employer-info">
     <div class="container">
	 <?php
		if(isset($status)){
			if($status['status']!='error'){ ?>
<div class="col-sm-4"></div>	
<div class="col-sm-4">					
  <div class="wrapper">
    <form class="form-signin">       
      <h2 class="form-signin-heading">Reset Password</h2>
      <input type="password" class="form-control" name="password" placeholder="New Password" required="" autofocus="" />
      <input type="password" class="form-control" name="cnfPassword" placeholder="Confirm Password" required=""/>      
<div class="col-sm-5"><button class=" btn btn-default" onclick="window.location.href='<?php echo CMS_HOME_PATH;?>'">Reset Password</button></div>	  
<div class="col-sm-5"><a class="btn btn-lg btn-primary btn-block" href="submit">Login</a></div> 
 </form>
  </div>				
  </div>
  <div class="col-sm-4"></div>
		<?php }else{ ?>
				<img src="<?php echo ADMIN_IMG_PATH ?>check_false.png">
				<h1 class=""><?php echo $status['message']; ?></h1>
				<button class="btn btn-default" onclick="window.location.href='<?php echo CMS_HOME_PATH;?>'">Click here to Login</button>
		<?php	}
		}?>
		
     </div>
     </section>

