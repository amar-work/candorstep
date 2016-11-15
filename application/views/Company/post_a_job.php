<div class="header-page-title">
			<div class="container">
				<img alt="" class="breadcrumb-img" src="img/content/company-small.png">
                <h1>Post a Job</h1>
				<ul class="breadcrumbs hidden-xs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="javascript:void(0)">Post a Job</a></li>
				</ul>
			</div>
		</div>

<div id="page-content">
		<div class="container">
			<div class="row">
			<form autocomplete="off" id="post_a_job_form" class="company_post_a_job_form" method="POST" action="<?php echo EMP_COMPANY_PATH.'addposting'?>" role="form">
				<div class="col-sm-12 page-content">
					
					<div class="white-container sign-up-form">
						<div id="alert_area"></div>
							<section>
								<h6 class="bottom-line mt10">Job Details:</h6>

								

								<div class="row">
									<div class="col-sm-6">
										<h6 class="label">Job Title</h6>
										<input type="text" name="jobTitle" class="form-control" placeholder="Job Title">
									</div>
									
									<div class="col-sm-6">
										<h6 class="label">Key Skills</h6>
										<input type="text" name="jobKeySkills" class="form-control" placeholder="Eg:java, C#, C++,Oracle, .net ">
									</div>
								</div>
                                <h6 class="label">Job Description</h6>

								<div class="row">
									<div class="col-sm-12">
										<textarea class="jobDesc" name="jobDesc" id="jobDesc"></textarea>
									</div>
								</div>								
								<div class="row">
									<div class="col-sm-4">
										<h6 class="label">Applocation Type</h6>
										<select id="jobApplicationType" name="jobApplicationType" class="form-control">
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
										<select id="jobEmpType" name="jobEmpType" class="form-control">
										<option value="full-time">Full-Time</option>
										<option value="part-time">Part-Time</option>	
										<option value="on-contract">On-Contract</option>
										<option value="third-party">Third-Party</option>	
										</select>
									</div>
									
									<div class="col-sm-4">
										<h6 class="label">Salary</h6>
										<div class="col-sm-8 pd-l-r-0">
										<input type="text" name="jobSalary" class="form-control" placeholder="Salary">
										</div>
										<div class="col-sm-4 pd-l-r-0">
										<select name="jobSalaryPer" class="form-control">
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
										<select name="jobIndustry" class="form-control">
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
										<select name="jobFunctional" class="form-control">
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
										<input type="text" name="jobRoleCategory" class="form-control" placeholder="Eg:Programming & Design">
									</div>
									
									<div class="col-sm-4">									
										<h6 class="label">Role</h6>
										<input type="text" name="jobRole" class="form-control" placeholder="Eg:Software Developer">
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Qualifications:</h6>
								
                                <h6 class="label">Educational Qualifications</h6>

								<div class="row">
									<div class="col-sm-12">
										<input type="text" name="jobEducationalQlc" class="form-control" placeholder="Educational Qualifications">
									</div>
								</div>
                                <h6 class="label">Expirience</h6>

								<div class="row">
									<div class="col-sm-4">
									<h6 class="label">Expirience Type</h6>	
										<select name="jobExpType">
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
										<select name="jobMinExp" id="jobMinExp">
										<?php for($i=0;$i<=30;$i++){
										echo "<option value=$i>$i</option>";
										}?>
										</select>
									</div>
									
									<div class="col-sm-3">
									<h6 class="label">Max-Expirience</h6>
										<select name="jobMaxExp" id="jobMaxExp">
										<?php for($i=1;$i<=50;$i++){
										echo "<option value=$i>$i</option>";
										}?>
										</select>
									</div>
									
								</div>
								<div class="row">
								<h6 class="bottom-line">Location:</h6>
									<div class="col-sm-3">
										<select name="empState" id="chooseState">
											<option value="choose">Choose State</option>	
											<?php foreach($states as $keys=>$vals){
												echo "<option value='$vals->stt_id'>".$vals->stt_state_name."</option>";
											}?>
										</select>
									</div>

									<div class="col-sm-3">
										<select name="empCity" id="chooseCity">
											<option value="choose">Choose City</option>	
										</select>
									</div>

									<div class="col-sm-3">
										<input type="text" id="empZip" name="empZip" class="form-control" placeholder="ZIP Code">
									</div>
								</div>
								
							</section>
                            <section>
								<h6 class="bottom-line">Communication:</h6>

								<h6 class="label">Contact Details</h6>
								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="jobContactPerson"   class="form-control" placeholder="Contact Person Name">
									</div>
									<div class="col-sm-4">
										<input type="text" name="jobContactpersoneEmail" class="form-control" placeholder="email Id">
									</div>
									<div class="col-sm-4">
										<input type="text" name="jobConactPersonPhone" class="form-control" placeholder="Phone number">
									</div>
								</div>
								<div class="row">
								<h6 class="label">Reference URL</h6>
								<div class="col-sm-4">
										<input type="text" name="jobCompanyWebsite" class="form-control" placeholder="Company Reference URL">
								</div>
								</div>
							</section>
					

						<hr class="mt60">

						<div class="clearfix" style="width:30%">
						<button type="submit" class="btn btn-default signup-btn btn-block mb15" value="SIGNUP">Post this job</button>
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