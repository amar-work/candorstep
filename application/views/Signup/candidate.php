<div class="candidate-signup">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 signup-info">
                <h1>Register on Candorstep and search <br>thousands of tech jobs</h1>
                <div class="row mb30">
                     <div class=" col-md-12">
                        <div class="icon">
                         <i class="fa  fa-user"></i>
                     	</div>
                        <div class="icon-info">
                         <h3>Register</h3>
                         <p>Signing up is easy. Candorstep is always free for job seekers.</p>
                     </div>
                     </div>
                </div>
                 <div class="row mb30">
                     <div class=" col-md-12">
                        <div class="icon">
                         <i class="fa  fa-cloud"></i>
                     	</div>
                        <div class="icon-info">
                         <h3>Create a profile and upload your résumé</h3>
                         <p>Showcase your skills and let employers and recruiters find you.</p>
                     </div>
                     </div>
                </div>
                
                 <div class="row mb30">
                     <div class=" col-md-12">
                        <div class="icon">
                         <i class="fa  fa-magic"></i>
                     	</div>
                        <div class="icon-info">
                         <h3>Search and apply to thousands of tech jobs</h3>
                         <p>Apply with just the touch of a button!</p>
                     </div>
                     </div>
                </div>
       			 </div>
                 
                 
                 <div class="col-md-4">
                
                 <div class="signup">
				 <div id="alert_area"></div>
                  <h1 class="form-title">Register to Search Jobs</h1>
                 	<form autocomplete="off" id="candidate_signup_form" class="candidate_signup_form" method="POST" action="candidatesignup" role="form">
							<input type="text" name="userFstName" class="form-control mb15" placeholder="First Name">
                            <input type="text" name="userLstName" class="form-control mb15" placeholder="Last Name">
							<input type="text" name="userEmail" class="form-control mb15" placeholder="Email ID">
                            <input type="text"name="userMobile" class="form-control mb15" placeholder="Mobile No">
							<input type="password" name="userPassword" id="candPassword" class="form-control mb15" placeholder="Password">
                            <input type="password" name="candCnfPassword" class="form-control mb15" placeholder="Confirm Password">
							<input type="submit" class="btn btn-default signup-btn btn-block mb15" value="SIGNUP">                          
						</form>
                 
                 </div>
       			 </div>
        
       		 </div>
        </div>
            	

			</div> 
			    <section id="employer-info">
     <div class="container">
    	 <h1 class="">Employer Solutions</h1>
         <p>Browse our resume database and learn 
about our Open Web social recruiting tools.</p>
         <button class="btn btn-default" onclick="window.location.href='<?php echo SIGNUP_EMPLOYER_PATH;?>'">Employer Login</button>
     </div>
     </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH ?>validator/signup.validator.js"></script>
