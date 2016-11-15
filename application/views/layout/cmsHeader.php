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
						<li class="active "><a href="<?php echo CMS_HOME_PATH;?>">Home</a></li>
						<li ><a href="<?php echo CMS_JOBS_PATH;?>">Jobs</a></li>
						<li><a href="<?php echo CMS_ABOUT_US_PATH;?>">About Us</a></li>
						<li><a href="<?php echo CMS_PLANS_PATH;?>">Plans</a></li>
                         <li class="header-login"><a href="#" class="btn btn-link" >Login/Register</a>
					<div class="login_widget">
						<div id="signupAlert"></div>
						<div id="loginToggle">
						<form autocomplete="off" id="userLoginForm" name="userLoginForm" action="userLoginAuth">
							<input type="text" id="userEmail" name="userEmail" class="form-control required-field" placeholder="Email Id">
							<span id="userEmail-error" class="help-block" style="display:none">This field is required.</span>
							<input type="password" id="userPassword" name="userPassword"  class="form-control required-field" placeholder="Password">
							<span id="userPassword-error" class="help-block" style="display:none">This field is required.</span>
							<input type="submit" class="btn btn-default" value="Login">
							<a href="javascript:void(0)" class="btn btn-link" id="forget_password_toggle">Forgot Password?</a>
						</form>
						</div>
						<div id="forgetPasswrodToggle"style="display:none">
						<form autocomplete="off" id="forgetPasswordForm" name="forgetPasswordForm" action="userForgetPaswwordAuth">
							<input type="text" name="useForgetEmail" id="useForgetEmail" class="form-control required-field" placeholder="Email Id">
							<span id="useForgetEmail-error" class="help-block" style="display:none">This field is required.</span>
							<input type="submit" class="btn btn-default" value="Forgot Password">
							<a href="javascript:void(0)" class="btn btn-link" id="login_toggle">Login?</a>
						</form>	
						</div>	
                            <h5>Don't You have an account? Signup</h5>
                            <button class="btn btn-default btn-block" onclick="window.location.href='<?php echo SIGNUP_CANDIDATE_PATH;?>'">Job Seeker</button>
                             <button class="btn btn-default btn-block" onclick="window.location.href='<?php echo SIGNUP_EMPLOYER_PATH;?>'">Employer</button>
						
					</div>
				 <!-- end .header-login --> </li>                      
					</ul>
                   
				</nav>
                
			</div> <!-- end .container -->

			<div id="mobile-menu-container" class="container">
				<div class="login-register"></div>
				<div class="menu"></div>
			</div>
		</div> <!-- end .header-nav-bar -->

		
		<?php if($this->uri->segment(1)==''){?>
		<div class="header-banner">
			<div class="flexslider header-slider">
				<ul class="slides">
					<li>
						
						<div data-image="<?php echo ADMIN_IMG_PATH ?>content/slide-3.png"></div>
                        <div class="slide_text">
                        <div class="slide_title">300,000+ Job Postings <br> 7+ Million Responses</div>
                        <div class="slide_byline"></div>
                      </div>
					</li>

					<li>						
						<div data-image="<?php echo ADMIN_IMG_PATH ?>content/slide-2.png"></div>
                        <div class="slide_text">
                        <div class="slide_title">Finding your next job or career more 1000+ availabilities</div>
                        <div class="slide_byline"></div>
                      </div>
					</li>

					<li>
						<div data-image="<?php echo ADMIN_IMG_PATH ?>content/slide-1.png"></div>
                        <div class="slide_text">
                        <div class="slide_title">FIND YOUR MATCH FOR HIGH TECH RESEARCH</div>
                        <div class="slide_byline"></div>
                      </div>
					</li>
				</ul>
			</div>
		<div class="header-search-bar">
			<div class="container">
				<form name="searchForm" autocomplete="off" id="searchJobForm" action="<?php echo CMS_JOBS_PATH?>" method="GET">
					<div class="basic-form clearfix">
                    <p class="jobs-posted">13,234 Jobs Posted </p>
                    <div class="hsb-input-1">
							<input type="text" name="looking_for" id="looking_for" class="form-control" placeholder="I'm looking for a ...">
						</div>
						<div class="hsb-container">
							<div class="hsb-input-2">
								<input type="text" name="location" id="location" class="form-control" placeholder="Location">
							</div>							
						</div>

						<div class="hsb-submit">
							<input type="submit" id="searchJob" class="btn btn-default btn-block search" value="Search">                            
						</div>
                       <a href="advance-search.html" class="advns-search pull-right">Advanced Search <i class="fa fa-arrow-circle-o-right"></i></a>
					</div>
				</form>
			</div>
		</div> <!-- end .header-search-bar -->
		</div> <!-- end .header-banner -->
		<?php } ?>
	</header> <!-- end #header -->