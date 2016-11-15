	<header id="header">
    <div class="header-nav-bar navbar-fixed-top">
			<div class="container">

				<!-- Logo -->
				<div class="css-table logo">
					<div class="css-table-cell">
						<a href="<?php echo CMS_HOME_PATH;?>">
							<img src="<?php echo ADMIN_IMG_PATH ?>header-logo.png" alt="">
						</a> <!-- end .logo -->
					</div>
				</div>

				<!-- Mobile Menu Toggle -->
				<a href="#" id="mobile-menu-toggle"><span></span></a>

				<!-- Primary Nav -->
				<nav>
					<ul class="primary-nav">
						<li ><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
						<li ><a href="<?php echo EMP_POST_JOB?>">Post Job</a></li>
						<li ><a href="<?php echo EMP_SEARCH_RESUME?>">Search Resumes</a></li>
                        <li class="active"><a href="<?php echo EMP_PROFILE?>">Account</a></li>
                        <li class="has-submenu ">
							<a href="#"> <i class="fa fa-user pr10"></i><?php echo $this->session->userdata['logged_in']['usr_first_name'].' '.$this->session->userdata['logged_in']['usr_last_name'];?></a>
							<ul>
								<li><a href="<?php echo EMP_PROFILE?>"><i class="fa fa-user pr10"></i>Account</a></li>
								<li><a href="<?php echo USER_LOGOUT_PATH?>"><i class="fa fa-power-off pr10"></i>Sign out</a></li>
							</ul>
						<span class="submenu-arrow"></span></li>
				 <!-- end .header-login -->                      
					</ul>
                    
                   
				</nav>
                
			</div> <!-- end .container -->

			<div id="mobile-menu-container" class="container">
				<div class="login-register"></div>
				<div class="menu"></div>
			</div>
		</div> <!-- end .header-nav-bar -->
       	</header>