<div class="header-page-title">
			<div class="container">
				<img alt="" class="breadcrumb-img" src="img/content/company-small.png">
                <h1>View  Job</h1>
				<ul class="breadcrumbs hidden-xs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="javascript:void(0)">View/Edit Job</a></li>
				</ul>
			</div>
		</div>

<div id="page-content">
		<div class="container">
			<div class="row">
			<form autocomplete="off" id="post_a_job_form" class="company_post_a_job_form" method="POST" action="#" role="form">
				<div class="col-sm-12 page-content">
					
					<div class="white-container sign-up-form">
						<div id="alert_area"></div>
							<section>
								<a href="<?php echo EMP_VIEW_JOBS_PATH.'/'.$this->uri->segment (3);?>" class="pull-right btn btn-gray">View Job</a>
								<h6 class="bottom-line mt10">Job Details:</h6>
								<div class="row">
									<div class="col-sm-6">
										<h6 class="label">Job Title</h6>
										<label class="non-edit-form-element"><?php echo $jobDataObj->job_title;?></label>
										<input type="text" name="jobTitle" class="edit-form-element form-control" placeholder="Job Title" value="<?php echo $jobDataObj->job_title;?>">
									</div>
									
									<div class="col-sm-6">
										<h6 class="label">Key Skills</h6>
										<label class="non-edit-form-element"><?php echo $jobDataObj->job_key_skills;?></label>
										<input type="text" name="jobKeySkills" class="edit-form-element form-control" placeholder="Eg:java, C#, C++,Oracle, .net" value="<?php echo $jobDataObj->job_key_skills;?>" >
									</div>
								</div>
                                <h6 class="label">Job Description</h6>

								<div class="row">
									<div class="col-sm-12">
										<label class="non-edit-form-element"><?php echo $jobDataObj->job_description;?></label>
										<textarea class="jobDesc edit-form-element" name="jobDesc" id="jobDesc"><?php echo $jobDataObj->job_description;?></textarea>
									</div>
								</div>								
								<div class="row">
									<div class="col-sm-4">
										<h6 class="label">Applocation Type</h6>
										<label class="non-edit-form-element"><?php echo $jobDataObj->job_application_type;?></label>
										<select id="jobApplicationType" name="jobApplicationType" class="form-control edit-form-element">
										<option value="choose">Choose Type</option>
										<option value="by-email">By Email</option>
										<option value="by-comapny">By Company URL</option>	
										</select>
									</div>
									<div class="col-sm-4 by_email_choose" style="display:none">
										<h6 class="label">To Email</h6>
										<input type="text" name="jobByEmailTo" class="form-control" placeholder="To Email">
									</div>
									<div class="col-sm-4 by_email_choose" style="display:none">
										<h6 class="label">CC Email</h6>
										<input type="text" name="jobByEmailCC" class="form-control" placeholder="CC Email">
									</div>
									<div class="col-sm-8 by_company_choose" style="display:none">
										<h6 class="label">Company URL</h6>
										<input type="text" name="jobByEmailCompanyURL" class="form-control" placeholder="Company URL">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<h6 class="label">Employment Type</h6>
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_emp_type);?></label>
										<select id="jobEmpType" name="jobEmpType" class="form-control edit-form-element">
										<option value="full-time">Full-Time</option>
										<option value="part-time">Part-Time</option>	
										<option value="on-contract">On-Contract</option>
										<option value="third-party">Third-Party</option>	
										</select>
									</div>
									
									<div class="col-sm-4">
										<h6 class="label">Salary</h6>
										<div class="col-sm-8 pd-l-r-0">
										<label class="non-edit-form-element"><?php echo $jobDataObj->job_salary;?></label>
										<input type="text" name="jobSalary" value="<?php echo $jobDataObj->job_salary;?>" class="form-control edit-form-element" placeholder="Salary">
										</div>
										<div class="col-sm-4 pd-l-r-0">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_salary_per);?></label>
										<select name="jobSalaryPer" class="form-control edit-form-element">
										<option value="hourly">Hourly</option>
										<option value="daily">Daily</option>	
										<option value="weekly">Weekly</option>
										<option value="monthly">Monthly</option>
										<option value="annually" selected>Annually</option>		
										</select>
										</div>
									</div>

									<div class="col-sm-4">
										<h6 class="label">Industry</h6>
										<label class="non-edit-form-element">
										<?php
										if(sizeof($industryTypes)>0){
												foreach($industryTypes as $keys=>$vals){
													if($vals->int_id==$jobDataObj->job_industry){
													echo $vals->int_Industry_type;	
													}
												}
										} ?>
										</label>
										<select name="jobIndustry" class="edit-form-element form-control">
										<option value="choose">Choose Industry Type</option>
										<?php
										if(sizeof($industryTypes)>0){
												foreach($industryTypes as $keys=>$vals){
													echo "<option value=$vals->int_id>".$vals->int_Industry_type."</option>";
												}
										} ?>
										</select>
									</div>

									<div class="col-sm-4">									
										<h6 class="label">Functional Area</h6>
										<label class="non-edit-form-element">
										<?php
										if(sizeof($functionalityTypes)>0){
												foreach($functionalityTypes as $keys=>$vals){
													if($vals->fnt_id==$jobDataObj->job_type){
													echo $vals->fnt_functional_type;	
													}
												}
										} ?>
										</label>
										<select name="jobFunctional" class="edit-form-element form-control">
										<option value="choose">Choose Functional Type</option>
										<?php
										if(sizeof($functionalityTypes)>0){
												foreach($functionalityTypes as $keys=>$vals){
													echo "<option value=$vals->fnt_id>".$vals->fnt_functional_type."</option>";
												}
										
										
										} ?>
										</select>
									</div>
									
									<div class="col-sm-4">									
										<h6 class="label">Role Category</h6>
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_role);?></label>
										<input type="text" name="jobRoleCategory" value="<?php echo ucfirst($jobDataObj->job_role);?>" class="edit-form-element form-control" placeholder="Eg:Programming & Design">
									</div>
									
									<div class="col-sm-4">									
										<h6 class="label">Role</h6>
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_role);?></label>
										<input type="text" name="jobRole" value="<?php echo ucfirst($jobDataObj->job_role);?>" class="edit-form-element form-control" placeholder="Eg:Software Developer">
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Qualifications:</h6>
								
                                <h6 class="label">Educational Qualifications</h6>

								<div class="row">
									<div class="col-sm-12">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_qualification);?></label>
										<input type="text" name="jobEducationalQlc" value="<?php echo ucfirst($jobDataObj->job_qualification);?>" class="edit-form-element form-control" placeholder="Educational Qualifications">
									</div>
								</div>
                                <h6 class="label">Expirience</h6>

								<div class="row">
									<div class="col-sm-4">
									<h6 class="label">Expirience Type</h6>
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_work_exp_type);?></label>	
										<select name="jobExpType"  class="edit-form-element form-control">
										<option value="Not Applicable">Not Applicable</option>
										<option value="Internship">Internship</option>
										<option value="Entry Level">Entry Level</option>
										<option value="Mid-Senior Level">Mid-Senior Level</option>
										<option value="Associate">Associate</option>
										<option value="Executive">Executive</option>
										<option value="Director">Director</option>
										
										</select>
									</div>
									<div class="col-sm-3">
									<h6 class="label">Min-Expirience</h6>	
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_min_experience);?></label>	
										<select name="jobMinExp" class="edit-form-element form-control" id="jobMinExp">
										<?php for($i=0;$i<=30;$i++){
										echo "<option value=$i>$i</option>";
										}?>
										</select>
									</div>
									
									<div class="col-sm-3">
									<h6 class="label">Max-Expirience</h6>
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_max_experience);?></label>	
										<select name="jobMaxExp" class="edit-form-element form-control" id="jobMaxExp">
										<?php for($i=1;$i<=50;$i++){
										echo "<option value=$i>$i</option>";
										}?>
										</select>
									</div>
									
								</div>
								<div class="row">
								<h6 class="bottom-line">Location:</h6>
									<div class="col-sm-3">
										<label class="non-edit-form-element">
										<?php
										if(sizeof($states)>0){
												foreach($states as $keys=>$vals){
													if($vals->stt_id==$jobDataObj->job_location_state){
													echo $vals->stt_state_name;	
													}
												}
										} ?>
										</label>
										<select name="empState" class="edit-form-element form-control"  id="chooseState">
											<option value="choose">Choose State</option>	
											<?php foreach($states as $keys=>$vals){
												echo "<option value='$vals->stt_id'>".$vals->stt_state_name."</option>";
											}?>
										</select>
									</div>

									<div class="col-sm-3">
										<label class="non-edit-form-element">City</label>	
										<select name="empCity" class="edit-form-element form-control"  id="chooseCity">
											<option value="choose">Choose City</option>	
										</select>
									</div>

									<div class="col-sm-3">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_location_zip);?></label>	
										<input type="text" id="empZip" value="<?php echo ucfirst($jobDataObj->job_location_zip);?>"name="empZip" class="form-control edit-form-element" placeholder="ZIP Code">
									</div>
								</div>
								
							</section>
                            <section>
								<h6 class="bottom-line">Communication:</h6>

								<h6 class="label">Contact Details</h6>
								<div class="row">
									<div class="col-sm-4">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_contact_person	);?></label>	
										<input type="text" name="jobContactPerson"   value="<?php echo ucfirst($jobDataObj->job_contact_person);?>" class="form-control edit-form-element" placeholder="Contact Person Name">
									</div>
									<div class="col-sm-4">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_contact_email);?></label>	
										<input type="text" name="jobContactpersoneEmail" value="<?php echo ucfirst($jobDataObj->job_contact_email);?>" class="form-control edit-form-element" placeholder="email Id">
									</div>
									<div class="col-sm-4">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_contact_phone);?></label>	
										<input type="text" name="jobConactPersonPhone" value="<?php echo ucfirst($jobDataObj->job_contact_phone);?>" class="form-control edit-form-element" placeholder="Phone number">
									</div>
								</div>
								<div class="row">
								<h6 class="label">Reference URL</h6>
								<div class="col-sm-4">
										<label class="non-edit-form-element"><?php echo ucfirst($jobDataObj->job_reference_url);?></label>	
										<input type="text" name="jobCompanyWebsite" value="<?php echo ucfirst($jobDataObj->job_reference_url);?>" class="form-control edit-form-element" placeholder="Company Reference URL">
								</div>
								</div>
							</section>
					

						<hr class="mt60">

						<div class="clearfix" style="width:30%">
						<button type="submit" class="edit-form-element btn btn-default signup-btn btn-block mb15" value="SIGNUP">Post this job</button>
						</div>
					</div>
				</div> <!-- end .page-content -->
				</form>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>	--->
<script src="<?php echo ADMIN_JS_PATH ?>jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH ?>validator/post_a_job.validator.js"></script>	
<script src="<?php echo ADMIN_JS_PATH ?>tinymce.min.js"></script>
<script>tinymce.init({ selector:'#jobDesc' });</script>