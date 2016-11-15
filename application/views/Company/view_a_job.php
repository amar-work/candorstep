<div class="header-page-title">
			<div class="container">
				<h1><?php echo $jobDataObj->job_title;?><small><?php echo $jobDataObj->job_state_name.','.$jobDataObj->job_city_name.'-'.$jobDataObj->job_location_zip;?></small></h1>

				<ul class="breadcrumbs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="<?php echo EMP_JOBS_PATH?>">Jobs</a></li>
					<li><a href="javascript:void(0)"><?php echo ucfirst($jobDataObj->job_title);?></a></li>
				</ul>
			</div>
		</div>
	
	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container candidates-single-widget">
							<div class="widget-content">
								<!--<div id="jobs-single-page-map" class="white-container"></div>-->
								<div><iframe style="height:300px"src="http://candorstep.com/dev/common/mapbylatlang/17.4325235/78.40701519999993"></iframe></div>
								<h5 class="bottom-line">Job Details</h5>
								<table>
									<tbody>
										<tr>
											<td>ID</td>
											<td><?php echo $jobDataObj->job_reference_id;?></td>
										</tr>

										<tr>
											<td>Location</td>
											<td><?php echo $jobDataObj->job_state_name.','.$jobDataObj->job_city_name.'-'.$jobDataObj->job_location_zip;?></td>
										</tr>

										<tr>
											<td>Industry</td>
											<td><?php echo $jobDataObj->job_industry_type?></td>
										</tr>

										<tr>
											<td>Type</td>
											<td><?php echo $jobDataObj->job_functionality_type?></td>
										</tr>

										<tr>
											<td>Role</td>
											<td><?php echo $jobDataObj->job_role?></td>
										</tr>

										<tr>
											<td>Joining Date</td>
											<td><?php echo $jobDataObj->job_modified_on?></td>
										</tr>

										<tr>
											<td>Employment Status</td>
											<td><?php echo ucfirst($jobDataObj->job_emp_type);?></td>
										</tr>

										<tr>
											<td>Monthly Salary</td>
											<td>$<?php echo $jobDataObj->job_salary.'-'.ucfirst($jobDataObj->job_salary_per);?></td>
										</tr>
									</tbody>
								</table>

								<h5 class="bottom-line">Preffered Candidates</h5>

								<table>
									<tbody>
										<tr>
											<td>Career Level</td>
											<td><?php echo $jobDataObj->job_work_exp_type;?></td>
										</tr>

										<tr>
											<td>Years of Experience</td>
											<td><?php echo $jobDataObj->job_min_experience.' - '.$jobDataObj->job_max_experience;?></td>
										</tr>

										<tr>
											<td>Residence Location</td>
											<td><?php echo $jobDataObj->job_state_name.','.$jobDataObj->job_city_name?></td>
										</tr>

										<tr>
											<td>Gender</td>
											<td>-</td>
										</tr>
										<tr>
											<td>Qualification</td>
											<td><?php echo $jobDataObj->job_qualification?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</aside>
				</div> <!-- end .page-sidebar -->

				<div class="col-sm-8 page-content">
					<?php 
					if($this->session->userdata['logged_in']['usr_role']=="employee"){
					?><div class="clearfix mb30 hidden-xs">
						<a href="<?php echo EMP_JOBS_PATH;?>" class="btn btn-gray pull-left">Back to Listings</a>
						<div class="pull-right">
							<a href="<?php echo EMP_EDIT_JOBS_PATH.'/'.$this->uri->segment (3);?>" class="btn btn-gray">Edit Job</a>
						</div>
					</div>
					<?php }else{ ?>
						<div class="clearfix mb30 hidden-xs">
						<a href="<?php echo EMP_JOBS_PATH;?>" class="btn btn-gray pull-left">Back to Listings</a>
						<div class="pull-right">
							<a href="#" class="btn btn-gray">Previous</a>
							<a href="#" class="btn btn-gray">Next</a>
						</div>
					</div>
					<?php }?>
					

					<div class="jobs-item jobs-single-item">
						<div style="min-height:50px;">
                        <div class="thumb"><a href="javascript:void(0)" ><img src="<?php echo COMPANY_AVATAR_PATH ?><?php echo $this->session->userdata['logged_in']['company_data']->cmp_logo_image_path?>" alt=""></a></div>
						<?php 
						if($this->session->userdata['logged_in']['usr_role']!="employee"){?>
						<ul class="top-btns">
							<li><a href="#" class="btn btn-default fa fa-star"></a></li>
                            <li><a class="btn btn-default fa fa-envelope" data-toggle="modal"  href="#emailJob"></a></li>
						</ul>
						<?php }?>
                        </div>
                        
                        <h5>Job Description</h5>
						<?php echo $jobDataObj->job_description;?>
						<ul class="additional-requirements clearfix">
							<li>Work Permit</li>
							<li>5 Years Experience</li>
							<li>MBA</li>
							<li>Magento Certified</li>
							<li>Perfect Written &amp; Spoken English</li>
						</ul>

						<hr>
					</div>

					<div class="title-lines">
						<h3 class="mt0">About the Recruiter</h3>
					</div>

					<div class="about-candidate-item">
						<div class="thumb"><a href="javascript:void(0)" ><img src="<?php echo COMPANY_AVATAR_PATH ?><?php echo $this->session->userdata['logged_in']['company_data']->cmp_logo_image_path?>" alt=""></a></div>
						
						<h6 class="title"><a href="javascript:void(0)"><?php echo ucfirst($jobDataObj->job_contact_person	);?></a></h6>
						<span class="meta"><?php echo $jobDataObj->job_state_name.','.$jobDataObj->job_city_name.'-'.$jobDataObj->job_location_zip;?></span>

						<!--<ul class="social-icons clearfix">
							<li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-dribbble"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-pinterest"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-linkedin"></a></li>
						</ul>-->

						<ul class="list-unstyled">
							<li><strong>Tel:</strong><?php echo $companyData->cmp_contact_work;?></li>
							<li><strong>Website:</strong> <a href="<?php echo "http://".$jobDataObj->job_reference_url;?>" target="_blank"><?php echo $jobDataObj->job_reference_url;?></a></li>
						</ul>
                        <h5>About Company</h5>
                        <p class="mt20"><?php echo $companyData->cmp_description; ?></p>
                        
                        <div class="fitvidsjs">
							<iframe src="//player.vimeo.com/video/24456787" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>

						<a href="#" class="btn btn-default">Send Message</a>
					</div>
				</div> <!-- end .page-content -->
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>	--->
<script src="<?php echo ADMIN_JS_PATH ?>jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH ?>validator/post_a_job.validator.js"></script>	
<script src="<?php echo ADMIN_JS_PATH ?>tinymce.min.js"></script>
<!--<script>tinymce.init({ selector:'#jobDesc' });</script>-->