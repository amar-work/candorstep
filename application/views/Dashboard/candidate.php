 <div class="header-page-title">
      <div class="container">
        <h1>Employer Dashboard</h1>
      </div>
    </div>
  </header>
  <!-- end #header -->
  
  <div id="page-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 page-content">
          <div class="white-container">
            <section>
              <form name="searchForm" autocomplete="off" id="searchJobForm" action="<?php echo CMS_JOBS_PATH?>" method="GET">
                <p class="jobs-posted">13,234 Jobs Posted </p>
                <div class="row">
                  <div class="col-md-5">
                    <input class="form-control" name="looking_for" id="looking_for" placeholder="I'm looking for a ..." type="text">
                  </div>
                  <div class="col-md-5">
                    <input class="form-control" name="location" id="location" placeholder="Location" type="location">
                  </div>
                  <div class="col-md-2 form-search"><a href="javascript:void(0)" id="searchJob" class="btn btn-default btn-small pull-right">Search</a> </div>
                  <a href="advance-search.html" class="advns-search pull-right">Advanced Search <i class="fa fa-arrow-circle-o-right"></i></a> </div>
              </form>
            </section>
            <section>
              <div class="row">
				<div id="alert_area">
					<?php if($profileDetails[0]->cpd_state_id=='' || $profileDetails[0]->cpd_state_id==null){?>
						<div class="alert alert-error"><strong>Sorry!</strong>&nbsp;&nbsp;Your profile is not completed, Please complete your profile !</div>
					<?php } ?>
				
				</div>
                <div class="col-lg-12 col-md- col-sm- col-xs- col-lg-offset-  one-half">
                  <div class="responsive-tabs  vertical">
                    <ul class="nav nav-tabs">
                      <li class="e-tab-title menuicon  active"> <a href="#profile"><i class="fa fa-user" aria-hidden="true"></i><br>
                        Profile</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#jobs"><i class="fa fa-briefcase" aria-hidden="true"></i><br>
                        Jobs</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#alerts"><i class="fa fa-bell" aria-hidden="true"></i><br>
                        Alerts</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#settings"><i class="fa fa-cog" aria-hidden="true"></i><br>
                        Settings</a> </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane  active" id="profile">
					  <?php if($profileDetails[0]->cpd_state_id=='' || $profileDetails[0]->cpd_state_id==null){?>
                        <Div class="row" id="viewProfile" style="margin:0; padding:0;display:none">
					  <?php }else{ ?>
						  <Div class="row" id="viewProfile" style="margin:0; padding:0; ">
					  <?php } ?>
                          <div class="title-lines">
                            <h3 class="mt0">Profile</h3>
                          </div>
						  <?php
						  /*echo "<pre>";
						  print_r($this->session->userdata['logged_in']);
						  echo "</pre>";*/
						  
							//$this->load->view('Candidate/edit_profile');
						  ?>
                          <div class="row clearfix view">
						  <div class="col-md-9 col-sm-12 tab-hedding-name">
							<div class="col-md-6 col-sm-12">
							<div class="thumb"><a href="javascript:void(0)"><img src="<?php echo JOBSEEKER_AVATAR_PATH.'/'.$profileDetails[0]->cpd_user_avatar?>" style="height: 300px; width: 250px;" alt=""></a></div>
							</div>
							<div class="col-md-6 col-sm-12">
                            <div class="col-md-12 col-sm-12 tab-hedding-name pb20">
								<?php echo $this->session->userdata['logged_in']['usr_last_name'].' '.$this->session->userdata['logged_in']['usr_first_name'];?>
							</div>
							<div class="col-md-12 col-sm-12 jobtitle1"><i class="mr10 fa fa-envelope-o" aria-hidden="true"></i><?php echo $this->session->userdata['logged_in']['usr_email']?></div>
                            <div class="col-md-12 col-sm-12 jobtitle1"><i class="mr10 fa fa-phone" aria-hidden="true"></i><?php echo $this->session->userdata['logged_in']['usr_mobile']?></div>
							<div class="col-md-12 col-sm-12 jobtitle1"><i class="mr10 fa  fa-calendar" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_age;?></div>
							</div>
							</div>
                            <div class="col-md-3 col-sm-12 pull-right">
                              <!--<a href="<?php echo CAND_EDIT_PROFILE;?>" class="btn btn-default btn-medium btn-block mb15">Edit Profile</a>-->
							  <a href="#" id="toggleEditProfile" class="btn btn-default btn-medium btn-block mb15">Edit Profile</a>
                            </div>
                          </div>
						<!--<div class="row clearfix candidate-profile">
                            <div class="col-md-4 jobtitle1"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $this->session->userdata['logged_in']['usr_email']?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $this->session->userdata['logged_in']['usr_mobile']?></div>
                            <div class="col-md-4 jobtitle1">&nbsp;</div>
						</div>-->	
						<div class="row clearfix candidate-profile">
							<div class="col-md-4 jobtitle1"><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_state_name;?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_city_name;?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_zip?></div>
                          </div>
                          <div class="row clearfix candidate-profile">
                            <div class="col-md-4 jobtitle1"><i class="fa fa-linkedin-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_linkedin_url;?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-twitter-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_twitter_url;?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-facebook-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_facebook_url;?></div>
                            <div class="col-md-4 jobtitle1"><i class="fa fa-laptop" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_personal_web_url;?></div>
							
							<!--<div class="col-md-4 jobtitle1"><a href="<?php echo $profileDetails[0]->cpd_linkedin_url;?>" target="_blank" ><i class="fa fa-linkedin-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_linkedin_url;?></a></div>
                            <div class="col-md-4 jobtitle1"><a href="<?php echo $profileDetails[0]->cpd_twitter_url;?>" target="_blank" ><i class="fa fa-twitter-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_twitter_url;?></a></div>
                            <div class="col-md-4 jobtitle1"><a href="<?php echo $profileDetails[0]->cpd_facebook_url;?>" target="_blank" ><i class="fa fa-facebook-square" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_facebook_url;?></a></div>
                            <div class="col-md-4 jobtitle1"><a href="<?php echo $profileDetails[0]->cpd_personal_web_url;?>" target="_blank" ><i class="fa fa-laptop" aria-hidden="true"></i><?php echo $profileDetails[0]->cpd_personal_web_url;?></a></div>-->
							
							
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Jobs</h3>
                          </div>
                          <div class="row  clearfix" style="padding:0; margin:0; ">
                            <div class="col-md-12 view  padding0">
                              <p class="jobtitle1">jobtitle&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_job_title;?></a></p>
                              <p class="jobtitle1">Employment type&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_job_type;?></a></p>
                              <p class="jobtitle1">Relocate&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_relocate;?></a></p>
                              <p class="jobtitle1">Security Clearance&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_security_clearence;?></a></p>
                              <p class="jobtitle1">Salery / Hourly Rate&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_salary.' / '.$jobDetails[0]->cjd_hourly_rate;?></a></p>
							  <p class="jobtitle1">Experience&nbsp;:&nbsp;<a href="javascript:void(0)"><?php echo $jobDetails[0]->cjd_experience_yr.' Years '.$jobDetails[0]->cjd_experience_mn." Months";?></a></p>
							  
                              <p class="jobtitle1"><span class="col-md-3 padding0">Resume</span><span class="col-md-6 addToProfile" id="add_resume_wrapper">
							  <a href="javascript:void(0)" ">
							  <?php if($profileDetails[0]->cpd_resume_path==null || $profileDetails[0]->cpd_resume_path==''){
								echo "Add Resume" ; 
								?>
								</a></span><span class="col-md-3">&nbsp;</span>
							  <?php }else{
								echo substr($profileDetails[0]->cpd_resume_path, strpos($profileDetails[0]->cpd_resume_path, "_") + 1);
							   ?>
								</a></span><span class="col-md-3"><a href='<?php echo JOBSEEKER_RESUME_PATH .$profileDetails[0]->cpd_resume_path;?>' target='_blank'>[Download]</a></span>		
							  <?php }?>
								</p>
                              <p class="jobtitle1"><span class="col-md-3 padding0">Cover</span><span class="col-md-9"><a href="javascript:void(0)" id="AddCoverLetter">
							  <?php 
							  if($profileDetails[0]->cpd_resume_title ==null || $profileDetails[0]->cpd_resume_title==''){
								echo "Manage Cover Letter";
							  }else{
								echo $profileDetails[0]->cpd_resume_title;		
							  }?>	
							  </a></span></p>
									
                            </div>
                          </div>
						  <div class="col-md-3 pull-left padding0">
                            <span id="add_jobs_wrapper" class="addToProfile btn btn-default btn-medium btn-block mb15">Edit Job Details</span>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Skill set</h3>
                          </div>
						  <?php
							if(sizeof($skillsDetails) > 0){
								foreach($skillsDetails as $skillKey=> $skillVal){ ?>
										<div class="row bottom-15 clearfix">
										<div class="col-md-3 edufont1"><?php echo $skillVal->css_skill; ?></div>
										<div class="col-md-6">
										<?php $skillMOnths=(($skillVal->css_experience_yr)*12+(($skillVal->css_experience_mn))) ;
												$SkillPercent=round((($skillMOnths)/180)*100,2);
										?> 
										  <div class="progress-bar" data-progress="<?php echo $SkillPercent;?>">
											<div class="progress-bar-inner"><span style="width: <?php echo $SkillPercent;?>%;"></span></div>
										  </div>
										</div>
										<div class="col-md-3"><?php echo $skillVal->css_experience_yr." Years :".$skillVal->css_experience_mn." Months";?> </div>
									  </div>	
								<?php }
							}?>
                          <div class="col-md-3 pull-left padding0">
                            <span id="add_skills_wrapper" class="addToProfile btn btn-default btn-medium btn-block mb15">Add Skills</span>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Work Experence</h3>
                          </div>
                          <div class="row">
						<?php 
							if(sizeof($workExpDetails) >0){
								foreach($workExpDetails as $workKeys=>$workVals){?>
								<div class="col-md-4 bottom-20 ">Worked as <span class="edufont1"> <?php echo $workVals->cwe_job_title; ?></span></div>
								<div class="col-md-4 bottom-20">For <span class="edufont1"><?php echo $workVals->cwe_job_company; ?></span></div>	
								<div class="col-md-4 bottom-20">From <span class="edufont1"><?php echo $workVals->cwe_job_from_date; ?></span> To <span class="edufont1"><?php echo $workVals->cwe_job_to_date; ?></span> </div>	
								
						<?php } }?>
                            
						</div>
                          <div class="col-md-3 pull-left padding0">
                            <span id="add_wrkExp_wrapper" class=" addToProfile btn btn-default btn-medium btn-block mb15">Add Work Experence</span>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Education</h3>
                          </div>
						  <?php 
							if(sizeof($educationDetails) >0){
								foreach($educationDetails as $edcKeys=>$edcVals){?>
									<div class="row col-md-6 edcWrapper">
									<p><span class="edufont"><?echo $edcVals->ced_degree;?>,<?echo $edcVals->ced_institute;?></span><br>
									<?php echo $edcVals->ced_specializations; ?><br>
									With: <?php echo $edcVals->ced_pass_percentage; ?>%, In :<?php echo $edcVals->ced_pass_year; ?><br>
									<?php foreach($statesList as $keys=>$vals){
										if($vals->stt_id==$edcVals->ced_state){
											echo $vals->stt_state_name .",";
										}						
									}									
									foreach($citiesList as $keys=>$vals){
										if($edcVals->ced_city==	$vals->cty_id){	
											echo $vals->cty_city_name."</br/>";
										}
									}?>
													
									</p>
									</div>
							<?php	}
									}
							?>
						  
						  
						  
                          <!--<div class="row edu">
                            <p><span class="edufont">Bachelors,JNTU</span><br>
                              Hyderabad<br>
                              India</p>
                          </div>-->
						  <div class="col-md-12 padding0">
                          <div class="col-md-3 pull-left padding0">
                            <span id="add_education_wrapper" class="addToProfile btn btn-default btn-medium btn-block mb15">Add Education</span>
                          </div>
						  </div>
                        </div>
						<?php if($profileDetails[0]->cpd_state_id=='' || $profileDetails[0]->cpd_state_id==null){?>
                        <Div id="editProfileView" class="row" style="margin:0; padding:0; ">
					  <?php }else{ ?>
						  <Div id="editProfileView" class="row" style="margin:0; padding:0;display:none ">
					  <?php } ?>
							<form name="candidateProfile" autocomplete="off" id="candidateProfile" action="<?php echo CAND_UPDATE_PROFILE?>" method="POST">
                          <div class="title-lines">
                            <h3 class="mt0">Profile</h3>
                          </div>
                          <div class="row clearfix view">
							 <div class="col-md-9 col-sm-12 tab-hedding-name">
							<div class="col-md-6 col-sm-12">
							<div class="thumb">
								<div id="user_avatar">
								<a href="javascript:void(0)">
									<img id="user_avatar_img" src="<?php echo JOBSEEKER_AVATAR_PATH.'/'.$profileDetails[0]->cpd_user_avatar?>" style="height: 300px; width: 250px;" alt="">
								</a>
								<div id="uploaderText"></div>
								<input id="upload_file" name="upload_file" type="hidden" value="candidate_default.jpg" readonly>
								</div>
							</div>
							</div>
                            <div class="col-md-6 col-sm-12 tab-hedding-name">
								<div class="col-md-12 col-sm-12 jobtitle1">
									<input class="form-control" name="userFstName" placeholder="First Name" value="<?php echo $this->session->userdata['logged_in']['usr_last_name'];?>" type="text">
								</div><div class="col-md-12 col-sm-12 jobtitle1">
									<input class="form-control" name="userLstName" placeholder="Last Name" type="text" value="<?php echo $this->session->userdata['logged_in']['usr_first_name']?>">
								</div><div class="col-md-12 col-sm-12 jobtitle1">
									<input class="form-control" name="userEmail" placeholder="E-mail" type="text" value="<?php echo $this->session->userdata['logged_in']['usr_email'];?>">
								</div><div class="col-md-12 col-sm-12 jobtitle1">
									<input class="form-control" name="userPhone" placeholder="Phone" type="text" value="<?php echo trim($this->session->userdata['logged_in']['usr_mobile']);?>">
								</div><div class="col-md-12 col-sm-12 jobtitle1">
									<input class="form-control" id="userDob" name="userDob" placeholder="Date of Birth" type="text" value="<?php echo $profileDetails[0]->cpd_dob;?>">
								</div>
							</div>
							</div>
                            <div class="col-md-3 col-sm-12 pull-right">
								<?php if($profileDetails[0]->cpd_state_id!='' || $profileDetails[0]->cpd_state_id!=null){?>
									<span class="toggleViewProfile btn btn-default mb15 pull-right">Back </span>
								<?php } ?>	
								<button class="btn btn-default mb15">Save Profile</button>
                            </div>
                          </div>
                          
						  <div class="row clearfix candidate-profile">
							<div class="col-md-12">
							<div class="col-md-4 jobtitle1">
								<select name="userState" id="chooseState">
											<option value="choose">Choose State</option>	
											<?php foreach($statesList as $keys=>$vals){
												if($profileDetails[0]->cpd_state_id==$vals->stt_id){$selected="selected";}
												else{$selected="";}
												echo "<option $selected value='$vals->stt_id'>".$vals->stt_state_name."</option>";
											}?>
								</select>
							</div>
                            <div class="col-md-4 jobtitle1">
								<select name="userCity" id="chooseCity">
									<option value="choose">Choose City</option>	
									<?php foreach($selectedCityList as $keys=>$vals){
												if($profileDetails[0]->cpd_city_id==$vals->cty_id){$selected="selected";}
												else{$selected="";}
												echo "<option $selected value='$vals->cty_id'>".$vals->cty_city_name."</option>";
									}?>
									
								</select>
							</div>
							<div class="col-md-4 jobtitle1">
								<input type="text" id="empZip" name="userZip" value="<?php echo $profileDetails[0]->cpd_zip;?>" class="form-control" placeholder="ZIP Code">
							</div>
							</div>
						  </div>
						  
						  <!--<div class="row clearfix candidate-profile">
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="E-mail" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add phone" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add Zip" type="text"></div>
                          </div>-->
						  
                          <div class="row clearfix candidate-profile">
						  <div class="col-md-12">
                            <div class="col-md-4 jobtitle1"><input name="userLnUrl" value="<?php echo $profileDetails[0]->cpd_linkedin_url;?>" class="form-control" placeholder="Add Linkdin Profile" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input name="userTwUrl" value="<?php echo $profileDetails[0]->cpd_twitter_url;?>" class="form-control" placeholder="Add Twitter url" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input name="userFbUrl" value="<?php echo $profileDetails[0]->cpd_facebook_url;?>" class="form-control" placeholder="Add facebook url" type="text"></div>
                           </div><div class="col-md-12">
							<div class="col-md-4 jobtitle1"><input name="userSlUrl" value="<?php echo $profileDetails[0]->cpd_personal_web_url;?>" class="form-control" placeholder="Add Personalweb site" type="text"></div>
                          </div></div>
						  <div id="edit_jobs_wrapper">
                          <div class="title-lines">
                            <h3 class="mt0">Jobs</h3>
                          </div>
                          <div class="row  clearfix" style="padding:0; margin:0; ">
                            <div class="col-md-12 view  padding0">
                             <!-- <p class="jobtitle"> Job Tilte</p>
                              <p class="jobtitle1"><a href="#">Choose Employment type(s)</a></p>
                              <p class="jobtitle1"><a href="#">Relocate (No)</a></p>
                              <p class="jobtitle1"><a href="#">Add your work authorization</a></p>
                              <p class="jobtitle1"><a href="#">Security Clearance ? No</a></p>
                              <p class="jobtitle2"><a href="#">Add a Salery, add an Hourly Rate</a></p>
                              <p class="jobtitle1"><span class="col-md-3 padding0">Resume</span><span class="col-md-9"><a href="#">Add Resume</a></span></p>
                              <p class="jobtitle1"><span class="col-md-3 padding0">Cover</span><span class="col-md-9"><a href="#">Manage Cover Letter</a></span></p>-->
                             
                            <div class="row clearfix candidate-profile">
							<div class="col-md-12">
                            <div class="col-md-4 jobtitle1"><input name="userCrntJobTitle" value="<?php echo $jobDetails[0]->cjd_job_title;?>" class="form-control" placeholder="Job Title" type="text"></div>
                            <div class="col-md-4 jobtitle1">
							<div class="col-md-6 p0">	
							<?php //echo $jobDetails[0]->cjd_experience_yr.' Years '.$jobDetails[0]->cjd_experience_mn." Months";?>
								<select name="userJobExprYr" id="userJobExprYr">
											<option value="choose">Exp Years</option>
											<?php 
											for($i=1;$i<=30;$i++){
												$selected= $jobDetails[0]->cjd_experience_yr==$i ? "selected": "";
												echo "<option $selected value=$i>$i</option>";
											}
											?>
								</select>
							</div><div class="col-md-6 p0">	
								<select name="userJobExprMn" id="userJobExprMn">
											<option value="choose">Exp Months</option>
											<?php 
											for($i=1;$i<=12;$i++){
												$selected= $jobDetails[0]->cjd_experience_mn==$i ? "selected": "";
												echo "<option $selected value=$i>$i</option>";
											}
											?>
								</select>
							</div>
							</div>
                            <div class="col-md-4 jobtitle1">
							<?php
								$ftJobType= $jobDetails[0]->cjd_job_type=="full-time" ? "selected" : "";
								$ptJobType= $jobDetails[0]->cjd_job_type=="part-time" ? "selected" : "";
								$ocJobType= $jobDetails[0]->cjd_job_type=="on-contract"? "selected": "";
								$tpJobType= $jobDetails[0]->cjd_job_type=="third-party"? "selected": "";
							?>
                            	<select name="userJobType" id="userJobType">
											<option value="choose">Job Type</option>
											<option <?php echo $ftJobType?> value="full-time">Full-Time</option>
											<option <?php echo $ptJobType?> value="part-time">Part-Time</option>	
											<option <?php echo $ocJobType?>value="on-contract">On-Contract</option>
											<option <?php echo $tpJobType?> value="third-party">Third-Party</option>	
										</select>
                            </div>
							</div>
							<div class="col-md-12">
							<?php
								$ysRelocate= $jobDetails[0]->cjd_relocate=="yes" ? "selected" : "";
								$noRelocate= $jobDetails[0]->cjd_relocate=="no" ? "selected" : "";
							?>
                            <div class="col-md-4 jobtitle1"><select name="userJobRelocate" id="userJobRelocate">
											<option value="">Relocate (Yes or No)</option>
											<option <?php echo $ysRelocate;?> value="yes">Yes</option>
											<option <?php echo $noRelocate;?> value="no">No</option>
										</select></div>
                            <div class="col-md-4 jobtitle1">
								<select name="userJobCity" id="userJobCity">
								<option value="choose">Choose Job City</option>
								<?php 
								if(sizeof($citiesList)>0){
											foreach($citiesList as $keys=>$vals){
												if($jobDetails[0]->cjd_current_city==$vals->cty_id){$selected="selected";}
												else{$selected="";}
												echo "<option $selected value=$vals->cty_id >$vals->cty_city_name</option>";
											}
								}			
								?>
								</select>
								
								
							</div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Relocated To" type="text"></div>
                            </div>
							<div class="col-md-12">
							<?php
								$ysSecr= $jobDetails[0]->cjd_security_clearence=="yes" ? "selected" : "";
								$noSecr= $jobDetails[0]->cjd_security_clearence=="no" ? "selected" : "";
							?>
							<div class="col-md-4 jobtitle1"><select name="userJobSecClr" id="userJobSecClr">
											<option value="choose">Security Clerance (Yes or No)</option>
											<option <?php echo $ysSecr;?> value="yes">Yes</option>
											<option <?php echo $noSecr;?> value="no">No</option>
										</select></div>
                            <div class="col-md-4 jobtitle1"><input value="<?php echo $jobDetails[0]->cjd_salary;?>" name="userJobSalary" class="form-control" placeholder="Salary" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input value="<?php echo $jobDetails[0]->cjd_hourly_rate;?>" name="userJobHrRate"  class="form-control" placeholder="hourly Rate" type="text"></div>
                            </div>
                            
                            
                          </div>  
                          </div></div>
						  
						  <div id="edit_resume_wrapper">
						  <div class="row ">
						  <div class="col-md-12 p10">
						  
							<label class="btn btn-default btn-file col-md-2 p10" id="uploadResume">
								<!--Browse <!--<input type="file" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"   style="display: none;">-->
								<div>Upload Resume</div>
							</label>
							<div class="col-md-5"><input type="text" name="resume_upload_file"  id="resume_upload_file" value="<?php echo substr($profileDetails[0]->cpd_resume_path, strpos($profileDetails[0]->cpd_resume_path, "_") + 1);?>"/>
								<input type="hidden" name="resume_path" id="resume_path" readonly>
							</div>
							<div class="col-md-5">
								<input type="text" name="resume_cover_title"  id="resume_cover_title" value="<?php echo $profileDetails[0]->cpd_resume_title;?>"placeholder="Cover Letter"/>
							</div>
						  </div>
						  </div>
						  </div>
                          </div>
						  
                         <div id="edit_skills_wrapper"> 
						  <div class="title-lines">
                            <h3 class="mt0">Skill set</h3>
                          </div>
                          <div class="row bottom-15 clearfix remove">
                            <table class="table-bordered userSkills">
				<thead>
					<tr>
						<th>Top Skills</th>
						<th>Experience</th>
						<th>Last Used</th>
                        <th></th>
					</tr>
				</thead>

				<tbody>
					<?php 
					//print_r($skillsDetails);
					if(sizeof($skillsDetails) >0){
						foreach($skillsDetails as $skillkeys=>$skillVals){ ?>
							<tr>
						<td>
                        	<input type="text" name="userSkillName[]" placeholder="Skill" value="<?php echo $skillVals->css_skill; ?>">
							<input type="hidden" name="userSkillId[]" value="<?php echo $skillVals->css_id; ?>">
                        </td>
						<td><div class="col-md-6 p0">	
								<select name="userSkillExprYr[]" >
											<option value="choose">Exp Years</option>
											<?php
											for($i=1;$i<=14;$i++){
											$selected= $skillVals->css_experience_yr == $i? "selected" : "";			
												echo "<option $selected value=$i>$i</option>";
											}
											?>
								</select>
							</div><div class="col-md-6 p0">	
								<select name="userSkillExprMn[]" >
											<option value="choose">Exp Months</option>
											<?php 
											for($i=1;$i<=12;$i++){
												$selected= $skillVals->css_experience_mn == $i? "selected" : "";		
												echo "<option  $selected value=$i>$i</option>";
											}
											?>
								</select>
							</div></td>
						<td>	
							<select name="userSkillLstUsed[]">
								<?php 
								$currentYr=date("Y");
								$uptoYr=date("Y")-50;
								for($currentYr;$currentYr > $uptoYr;$currentYr--){
									$selected= $skillVals->css_last_used == $currentYr ? "selected" : "";
									echo "<option $selected value=$currentYr>$currentYr</option>";
								}
								?>				
							</select></td>
						<td><i class="fa fa-plus addUserSkill" aria-hidden="true"></i></td>                        
					</tr>	
							
					<?php	}	
					}else{
					?>
					<tr>
						<td>
                        	<input type="text" name="userSkillName[]" value="" placeholder="Skill">
							<input type="hidden" name="userSkillId[]" value="0">
                        </td>
						<td><div class="col-md-6 p0">	
								<select name="userSkillExprYr[]" >
											<option value="choose">Exp Years</option>
											<?php 
											for($i=1;$i<=14;$i++){
												echo "<option value=$i>$i</option>";
											}
											?>
								</select>
							</div><div class="col-md-6 p0">	
								<select name="userSkillExprMn[]" >
											<option value="choose">Exp Months</option>
											<?php 
											for($i=1;$i<=12;$i++){
												echo "<option value=$i>$i</option>";
											}
											?>
								</select>
							</div></td>
						<td>	
							<select name="userSkillLstUsed[]">
								<?php 
								$currentYr=date("Y");
								$uptoYr=date("Y")-50;
								for($currentYr;$currentYr > $uptoYr;$currentYr--){
									echo "<option value=$currentYr>$currentYr</option>";
								}
								?>				
							</select></td>
						<td><i class="fa fa-plus addUserSkill" aria-hidden="true"></i></td>                        
					</tr>
					<?php } ?>
                </tbody>
			</table>
                          </div>
                         
                        </div>
						
						
                         <div id="edit_wrkExp_wrapper">
                          <div class="title-lines">
                            <h3 class="mt0">Work Experence</h3>
                          </div>
                          <div class="row ">
						  <?php
						  if(sizeof($workExpDetails) > 0){
								foreach($workExpDetails as $wrkKeys=>$wrkVals){
							?>
							  <div class="col-md-12 p10">
                            <div class="col-md-4"><input class="form-control" name="userJobTitle[]" placeholder="Job Title" type="text" value="<?php echo $wrkVals->cwe_job_title;?>"><input type="hidden"name="userJobId[]"  value="<?php echo $wrkVals->cwe_id;?>"></div>
                            <div class="col-md-4"><input class="form-control" name="userJobCompany[]" placeholder="Company" type="text" value="<?php echo $wrkVals->cwe_job_company;?>"></div>
                            <div class="col-md-4">
							<div class="col-md-12 p0">
								<div class="col-md-6 p0">
								<input class="form-control userwrkExpFrom"  name="userwrkExpFrom[]" placeholder="Exp From" type="text" value="<?php echo $wrkVals->cwe_job_from_date;?>">
								</div><div class="col-md-6 p0">
								<input class="form-control userwrkExpTo"    name="userwrkExpTo[]" placeholder="Exp To" type="text" value="<?php echo $wrkVals->cwe_job_to_date;?>">	
								</div>
							</div>
							</div>
                           </div> 
								<?php } }else{ ?>
						  <div class="col-md-12 p10">
                            <div class="col-md-4"><input class="form-control" name="userJobTitle[]" placeholder="Job Title" type="text"><input type="hidden"name="userJobId[]"  value="0"></div>
                            <div class="col-md-4"><input class="form-control" name="userJobCompany[]" placeholder="Company" type="text"></div>
                            <div class="col-md-4">
							<div class="col-md-12 p0">
								<div class="col-md-6 p0">
								<input class="form-control userwrkExpFrom"  name="userwrkExpFrom[]" placeholder="Exp From" type="text" value="">
								</div><div class="col-md-6 p0">
								<input class="form-control userwrkExpTo"    name="userwrkExpTo[]" placeholder="Exp To" type="text" value="">	
								</div>
							</div>
							</div>
                           </div> 
						   <?php } ?>
                          
						  <div class="col-md-3 pull-left" style="margin-top:15px;">
                            <span id="userAddWrkExp" class="btn btn-gray mb15">Add </span>
                        </div>
						  
						  </div>
						  
						
						</div>
						  
						<div id="edit_education_wrapper">			
                          
                          <div class="title-lines">
                            <h3 class="mt0">Education</h3>
                          </div>
                          <div class="row">
							<?PHP if(sizeof($educationDetails) >0){
								foreach($educationDetails as $edcKeys=>$edcVals){
								
								$bchSelected=$edcVals->ced_degree=="bachelors degree" ? "selected": "";
								$mstSelected=$edcVals->ced_degree=="master degree" ? "selected": "";
								$dctSelected=$edcVals->ced_degree=="doctorate" ? "selected": "";
								$othSelected=$edcVals->ced_degree=="other" ? "selected": "";
								
								?>
								<div class="col-md-12 p10">
								<div class="col-md-2 p5">
											
											<select name="userEdcDegree[]">
												<option value="">Higest Degree</option>
												<option <?php echo $bchSelected?> value="bachelors degree">Bachelors Degree</option>
												<option <?php echo $mstSelected?> value="master degree">Master Degree</option>
												<option <?php echo $dctSelected?> value="doctorate">Doctorate</option>
												<option <?php echo $othSelected?>  value="other">Other</option>
											</select>
											<input type="hidden" name="userEdcId[]" isoldrec="true" value="<?php echo $edcVals->ced_id?>">
								</div>
								<div class="col-md-2 p5"><input name="userEdcSplz[]" class="form-control" placeholder="Specialization" type="text" value="<?php echo $edcVals->ced_specializations?>"></div>
								<div class="col-md-2 p5"><input name="userEdcInistute[]" class="form-control" placeholder="Inistute" type="text" value="<?php echo $edcVals->ced_institute?>"></div>
								<div class="col-md-2 p5"><select name="userEdcState[]" class="form-control" >
														<option value="choose">Choose State</option>	
															<?php foreach($statesList as $keys=>$vals){
																if($edcVals->ced_state==$vals->stt_id){$selected="selected";}
																else{$selected="";}
																echo "<option $selected value='$vals->stt_id'>".$vals->stt_state_name."</option>";
															}?>														
														</select>
								
								</div>
								<div class="col-md-2 p5"><select name="userEdcCity[]" class="form-control" >
														<option value="choose">Choose City</option>	
															<?php foreach($selectedCityList as $keys=>$vals){
																		if($edcVals->ced_city==$vals->cty_id){$selected="selected";}
																		else{$selected="";}
																		echo "<option $selected value='$vals->cty_id'>".$vals->cty_city_name."</option>";
															}?>	
								
														</select></div>
								<div class="col-md-1 p5"><input class="form-control" name="userEdcPass[]"placeholder="Pass Percentage" value="<?php echo $edcVals->ced_pass_percentage?>" type="text" ></div>
								<div class="col-md-1 p5">
									<select name="userEdcPassed[]">
									<?php 
									$currentYr=date("Y");
									$uptoYr=date("Y")-50;
									for($currentYr;$currentYr > $uptoYr;$currentYr--){
										$slected= $edcVals->ced_pass_year==$currentYr ? "selected" : "";
										echo "<option $slected value=$currentYr>$currentYr</option>";
									}
										?>				
								</select>
								</div>
							  </div>
							  
							<?php }}else{?>
							  <div class="col-md-12 p10">
								<div class="col-md-2 p5"><select name="userEdcDegree">
												<option value="">Higest Degree</option>
												<option value="bachelors degree">Bachelors Degree</option>
												<option value="master degree">Master Degree</option>
												<option value="doctorate">Doctorate</option>
												<option value="other">Other</option>
											</select>
											<input type="hidden" name="userEdcId[]" isnewrec="true" value="<?php $edcVals->ced_id?>">
								</div>
								<div class="col-md-2 p5"><input name="userEdcSplz[]" class="form-control" placeholder="Specialization" type="text"></div>
								<div class="col-md-2 p5"><input name="userEdcInistute[]" class="form-control" placeholder="Inistute" type="text"></div>
								<div class="col-md-2 p5"><select name="userEdcState[]" class="form-control" >
															<option value="choose">Choose State</option>	
															<?php foreach($statesList as $keys=>$vals){
																echo "<option value='$vals->stt_id'>".$vals->stt_state_name."</option>";
															}?>														
														</select></div>
								<div class="col-md-2 p5"><select name="userEdcCity[]" class="form-control" ></select></div>
								<div class="col-md-1 p5"><input class="form-control" name="userEdcPass[]"placeholder="City" type="text"></div>
								<div class="col-md-1 p5">
									<select name="userEdcPassed[]">
									<?php 
									$currentYr=date("Y");
									$uptoYr=date("Y")-50;
									for($currentYr;$currentYr > $uptoYr;$currentYr--){
										echo "<option value=$currentYr>$currentYr</option>";
									}
										?>				
								</select>
								</div>
							  </div>
							<?php } ?>
						  
						  <div class="col-md-3 pull-left" style="margin-top:15px;">
                           <span id="userAddEdc" class="btn btn-gray mb15">Add </span>
                          </div>
						  </div>
                          </div>
						  <div class="ui-divider"></div>
						  <div class="row">
											  
                                              	<div class="col-md-10"> 
												<?php if($profileDetails[0]->cpd_state_id!='' || $profileDetails[0]->cpd_state_id!=null){?>
												<span class=" toggleViewProfile btn btn-default mb15 pull-right">Back </span>
												<?php } ?>
												</div>
                                                <div class="col-md-2"> <button class="btn btn-default mb15">Save Profile </button></div>
                                              </div>
						</div>
                            </form>                  
                      </Div>
                      
                      <div class="tab-pane " id="jobs">
                        <Div class="row" style="margin:0; padding:0; ">
                          <div class="title-lines">
                            <h3 class="mt0">Jobs</h3>
                          </div>
                          <h5 style="margin-top:15px">Saved jobs<br>
                            <span style="font-size:14px; font-weight:100">3 Positions</span></h5>
                          <div class="bottom-line remove" style="margin-bottom:15px;"></div>
                          <div class="row" style="margin-bottom:0;">
                            <div class="col-md-6"  style="margin-top:15px; padding:0">
                              <ol class = "breadcrumb">
                                <li><a href = "#">saved jobs</a></li>
                                <li><a href = "#">applied jobs</a></li>
                                <li class = "active">show expired jobs</li>
                              </ol>
                            </div>
                            <div class="col-md-6">
                              <ul class="pagination pull-right margin-top">
                                <li><a href="#" class="fa fa-angle-left"></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#" class="fa fa-angle-right"></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="bottom-line" style="margin-top:0; padding-bottom:0;"></div>
                          <div class="row jobsspace remove">
                            <div class="row jobsspace">
                              <div class="col-md-10  padding0">
                                <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                                <div class="col-md-12 padding0">Linium | Schenectady, NY</div>
                              </div>
                              <div class="col-md-2 jobspace-btn"><a href="#" class="btn btn-default1 btn-small pull-right">Remove</a></div>
                            </div>
                            <div class="bottom-line" style=" padding-bottom:0px;"></div>
                            <div class="row jobsspace">
                              <div class="col-md-10  padding0">
                                <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                                <div class="col-md-12 padding0">Linium | Schenectady, NY</div>
                              </div>
                              <div class="col-md-2 jobspace-btn"><a href="#" class="btn btn-default1 btn-small pull-right">Remove</a></div>
                            </div>
                            <div class="bottom-line" style=" padding-bottom:0px;"></div>
                            <div class="row jobsspace">
                              <div class="col-md-10  padding0">
                                <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                                <div class="col-md-12 padding0">Linium | Schenectady, NY</div>
                              </div>
                              <div class="col-md-2 jobspace-btn"><a href="#" class="btn btn-default1 btn-small pull-right">Remove</a></div>
                            </div>
                            <div class="bottom-line" style=" padding-bottom:0px;"></div>
                            <div class="row jobsspace">
                              <div class="col-md-10  padding0">
                                <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                                <div class="col-md-12 padding0">Linium | Schenectady, NY</div>
                              </div>
                              <div class="col-md-2 jobspace-btn"><a href="#" class="btn btn-default1 btn-small pull-right">Remove</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="tab-pane  last" id="alerts">
                        <Div class="row" style="margin:0; padding:0; ">
                          <div class="title-lines">
                            <h3 class="mt0">Alerts</h3>
                          </div>
                          <div class="row alertbg">
                            <div class="col-md-8 alerttext">Alert Title</div>
                            <div class="col-md-2 alerttext1">Date Updated</div>
                            <div class="col-md-2 alerttext1">Notification</div>
                          </div>
                          <div class="row jobsspace">
                            <div class="col-md-8  padding0">
                              <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                              <div class="col-md-12 padding0">Rename | Delete</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016</div>
                            <div class="col-md-2 jobspace-btn">
                              <select>
                                <option value="">Select</option>
                                <option value="">Weekly</option>
                                <option value="">Daily</option>
                                <option value="">Never</option>
                              </select>
                            </div>
                          </div>
                          <div class="bottom-line" style=" padding-bottom:0px;"></div>
                          <div class="row jobsspace">
                            <div class="col-md-8  padding0">
                              <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                              <div class="col-md-12 padding0">Rename | Delete</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016</div>
                            <div class="col-md-2 jobspace-btn">
                              <select>
                                <option value="">Select</option>
                                <option value="">Weekly</option>
                                <option value="">Daily</option>
                                <option value="">Never</option>
                              </select>
                            </div>
                          </div>
                          <div class="bottom-line" style=" padding-bottom:0px;"></div>
                          <div class="row jobsspace">
                            <div class="col-md-8  padding0">
                              <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                              <div class="col-md-12 padding0">Rename | Delete</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016</div>
                            <div class="col-md-2 jobspace-btn">
                              <select>
                                <option value="">Select</option>
                                <option value="">Weekly</option>
                                <option value="">Daily</option>
                                <option value="">Never</option>
                              </select>
                            </div>
                          </div>
                          <div class="bottom-line" style=" padding-bottom:0px;"></div>
                          <div class="row jobsspace">
                            <div class="col-md-8  padding0">
                              <div class="col-md-12 padding0 jobtitle"><a href="#">Software Engineer</a></div>
                              <div class="col-md-12 padding0">Rename | Delete</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016</div>
                            <div class="col-md-2 jobspace-btn">
                              <select>
                                <option value="">Select</option>
                                <option value="">Weekly</option>
                                <option value="">Daily</option>
                                <option value="">Never</option>
                              </select>
                            </div>
                          </div>
                        </Div>
                      </div>
                      
                      <div class="tab-pane  last" id="settings">
                        <Div class="row" style="margin:0; padding:0;">
                          <div class="title-lines">
                            <h3 class="mt0">Settings</h3>
                          </div>
                          <div class="row jobsspace">
                            <div class="col-md-7  padding0">
                              <div class="col-md-12 padding0 coverletter-title ">kamesh cover</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016<br>
                              Date Created</div>
                            <div class="col-md-3 jobspace-btn pull-right ico"> <span style="float:left"><i class="fa fa-eye" aria-hidden="true"></i> View </span> <span style="float:left"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span> </div>
                          </div>
                          <div class="bottom-line" style=" padding-bottom:0px;"></div>
                          <div class="row jobsspace">
                            <div class="col-md-7  padding0">
                              <div class="col-md-12 padding0 coverletter-title ">Amar Cover</div>
                            </div>
                            <div class="col-md-2 jobspace-btn ">10-12-2016<br>
                              Date Created</div>
                            <div class="col-md-3 jobspace-btn pull-right ico"> <span style="float:left"><i class="fa fa-eye" aria-hidden="true"></i> View </span> <span style="float:left"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span> </div>
                          </div>
                          <div class="bottom-line" style=" padding-bottom:0px;"></div>
                          <div class="row" style="margin-top:15px;">
                            <div class="col-md-3">
                              <button class="btn btn-default btn-medium btn-block mb15">Add Cover Letter</button>
                            </div>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Password</h3>
                              <div class="row">
                              <div class="col-sm-3">
                                <input class="form-control" placeholder="Password" type="password">
                              </div>
                              <div class="col-sm-3">
                                <input class="form-control" placeholder="Repeat Password" type="password">
                              </div>
                              <div class="col-sm-3">
                                <button class="btn btn-default btn-small btn-block mb15">Reset Password</button>
                              </div>
                              <div class="col-sm-3"> Cancle </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <button class="btn btn-default btn-medium btn-block mb15">Reset Password</button>
                              </div>
                            </div>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">E-Mail</h3>
                            <div class="row">
                              <div class="col-sm-3">
                                <input class="form-control" placeholder="Email" type="password">
                              </div>
                              <div class="col-sm-3">
                                <button class="btn btn-default btn-small btn-block mb15">Update E-mail</button>
                              </div>
                              <div class="col-sm-3"> Cancle </div>
                            </div>
                            <div class="row ">
                              <div class="col-sm-3">
                                <button class="btn btn-default btn-medium btn-block mb15">Update Email</button>
                              </div>
                            </div>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Work Authorization</h3>
                            <div class="row bottom-15">
                              <div class="col-sm-4">
                                <select>
                                  <option value="">Select Category</option>
                                  <option value="">have h1 Visa</option>
                                  <option value="">indian Citizen</option>
                                  <option value="">3</option>
                                  <option value="">4</option>
                                  <option value="">5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0" style="">Personal Information</h3>
                            <p style="text-align:left;"> Providing this information is strictly voluntary – you will not be penalized or subjected to adverse treatment if you choose not to provide this information. If you choose not to provide this information, simply select "Decline to Designate". </p>
                            <div class="row">
                              <div class="col-sm-4">
                                <select>
                                  <option value="">Select Category</option>
                                  <option value="">have h1 Visa</option>
                                  <option value="">indian Citizen</option>
                                  <option value="">3</option>
                                  <option value="">4</option>
                                  <option value="">5</option>
                                </select>
                              </div>
                              <div class="col-sm-4">
                                <select>
                                  <option value="">Select Category</option>
                                  <option value="">have h1 Visa</option>
                                  <option value="">indian Citizen</option>
                                  <option value="">3</option>
                                  <option value="">4</option>
                                  <option value="">5</option>
                                </select>
                              </div>
                              <div class="col-sm-4">
                                <select>
                                  <option value="">Select Category</option>
                                  <option value="">have h1 Visa</option>
                                  <option value="">indian Citizen</option>
                                  <option value="">3</option>
                                  <option value="">4</option>
                                  <option value="">5</option>
                                </select>
                              </div>
                            </div>
                            <div class="checkbox newsletter">
                              <label>
                                <input type="checkbox">
                                Subscribe to free weekly newsletter, to receive tech news and career advice.</label>
                            </div>
                          </div>
                        </Div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- end .page-content --> 
      </div>
    </div>
    <!-- end .container --> 
  </div>
  <!--<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
	  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH?>css/candidate.css">
  <script src="<?php echo ADMIN_JS_PATH ?>validator/candidate.validate.js"></script>
  <script type="text/javascript" src="<?php echo ADMIN_JS_PATH?>ajaxupload.3.5.js"></script>
    
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
<script>
/*$(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		console.log(label);
    input.trigger('fileselect', [numFiles, label]);
});*/
var btnUpload = $('#uploadResume');
		var newImgSrc='';
        new AjaxUpload(btnUpload, {
			action :  '<?php echo ADMIN_SITEURL; ?>/candidate/uploadresume',
            name   : 'Filedata',  
            dataType: 'json',
			data:{resumeFor:'jobseeker'},
            onSubmit: function(file,ext){
							if((ext == 'doc') || (ext == 'docx') || (ext == 'dotx') || (ext == 'dotm') ||(ext == 'docb') ){
			                	$("body").showLoading();
			                  }else{
								//alert("sorry invalid");  
								$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry! </strong>Upload a valid doc/docx/dotx/dotm/docb file less than 5mb</div>');  
								$("#alert_area").fadeTo(2000, 500).slideUp(500, function(){$("#alert_area").slideUp(500);});	
			                    //$('#resume_uploaderText').html('<span class="errorMessage">Upload a valid doc/docx/dotx/dotm/docb file less than 5mb</span>');
									return false;
			                   }
                        },
            onComplete: function(file, response){
                var result =$.parseJSON(response);
                	if(result. status == 'success'){
						$("#resume_path").val(result.fileName);
      				  $('#resume_upload_file').val(result.fileName.substr(result.fileName.indexOf("_") + 1));
					  $('#alert_area').prepend('<div class="alert alert-error"><strong>Success! </strong>Your resume uploaded !</div>');  
					  $("#alert_area").fadeTo(2000, 500).slideUp(500, function(){$("#alert_area").slideUp(500);});	
      				
      				$("#body").hideLoading();
                }else{
      				$("#body").hideLoading();
                	
    				$('#resume_upload_file').val('');
					$("#resume_path").val(result.fileName);
    				$("#body").hideLoading();
					$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry! </strong>Upload a valid doc/docx/dotx/dotm/docb file less than 5mb</div>');  
					$("#alert_area").fadeTo(2000, 500).slideUp(500, function(){$("#alert_area").slideUp(500);});	
                }
            }
        },'json');
		
		
		var btnUpload = $('#user_avatar');
		var newImgSrc='';
        new AjaxUpload(btnUpload, {
			action :  '<?php echo ADMIN_SITEURL; ?>/signup/userimgupload',
            name   : 'Filedata',  
            dataType: 'json',
			data:{imageFor:'jobseeker'},
            onSubmit: function(file,ext){
                            if((ext == 'jpg') || (ext == 'jpeg') || (ext == 'png') || (ext == 'gif')){
			                	$("#user_avatar").showLoading();
			                  }else{
			                    $('#uploaderText').html('<span class="errorMessage">Upload a valid JPG/PNG/GIF image less than 5mb</span>');
									return false;
			                   }
                        },
            onComplete: function(file, response){
                var result =$.parseJSON(response);
                	if(result. status == 'success'){
					var image_path=rootURL+'/uploads/jobseeker_avatar/'+result.fileName; 
                      $('#user_avatar_img').attr("src", image_path);
                      $('#uploaderText').html('<span class="errorMessage">Your picture</span>');
      				  $('#upload_file').val(result.fileName);
      				$('#del_pic').show();
      				$("#user_avatar").hideLoading();
                }else{
      				$("#user_avatar").hideLoading();
                	var image_path=rootURL+'/uploads/jobseeker_avatar/candidate_default.jpg'; 
                    $('#user_avatar_img').attr("src", image_path);
                    $('#uploaderText').html('<span class="errorMessage">Upload a valid JPG/PNG/GIF image less than 5mb</span>');
    				$('#upload_file').val('up.png');
    				$("#user_avatar").hideLoading();
                }
            }
        },'json');
		
		
</script>