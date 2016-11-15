<div class="header-page-title">
			<div class="container">
				<h1><?php echo $jobDataObj->job_title;?><small>Envato, Sydney, AU</small></h1>

				<ul class="breadcrumbs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="<?php echo EMP_JOBS_PATH?>">Jobs</a></li>
					<li><a href="javascript:void(0)">Front-end Developer</a></li>
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
											<td>#68686</td>
										</tr>

										<tr>
											<td>Location</td>
											<td>Australia</td>
										</tr>

										<tr>
											<td>Industry</td>
											<td>IT/Computers</td>
										</tr>

										<tr>
											<td>Type</td>
											<td>Employer</td>
										</tr>

										<tr>
											<td>Role</td>
											<td>Front-end Developer</td>
										</tr>

										<tr>
											<td>Joining Date</td>
											<td>-</td>
										</tr>

										<tr>
											<td>Employment Status</td>
											<td>-</td>
										</tr>

										<tr>
											<td>Monthly Salary</td>
											<td>-</td>
										</tr>
									</tbody>
								</table>

								<h5 class="bottom-line">Preffered Candidates</h5>

								<table>
									<tbody>
										<tr>
											<td>Career Level</td>
											<td>Entry Level</td>
										</tr>

										<tr>
											<td>Years of Experience</td>
											<td>-</td>
										</tr>

										<tr>
											<td>Residence Location</td>
											<td>Australia</td>
										</tr>

										<tr>
											<td>Gender</td>
											<td>-</td>
										</tr>

										<tr>
											<td>Nationality</td>
											<td>-</td>
										</tr>

										<tr>
											<td>Degree</td>
											<td>-</td>
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

						<div class="clearfix">
							<a href="#" class="btn btn-candor pull-left">Apply for this Job</a>

							<ul class="social-icons pull-right">
								<li><span>Share</span></li>
								<li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
								<li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
								<li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
							</ul>
						</div>
					</div>

					<div class="title-lines">
						<h3 class="mt0">About the Recruiter</h3>
					</div>

					<div class="about-candidate-item">
						<div class="thumb"><a href="#" ><img src="img/content/c4.jpg" alt=""></a></div>

						<h6 class="title"><a href="#">John Doe</a></h6>
						<span class="meta">24 Years Old - Sydney, AU</span>

						<ul class="social-icons clearfix">
							<li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-dribbble"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-pinterest"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-linkedin"></a></li>
						</ul>

						<ul class="list-unstyled">
							<li><strong>Tel:</strong> (123) 123-4567</li>
							<li><strong>Website:</strong> <a href="#">example.com</a></li>
						</ul>
                        <h5>About Company</h5>
                        <p class="mt20">We have modest goals: Improve the lives of others. Change the landscape of health care forever. Leave the world a better place than we found it. Such aspirations tend to attract a certain type of person. Crazy talented. Compassionate. Driven. To these individuals, we offer the global reach, resources and can-do culture of a Fortune 14 company. We provide an environment where you’re empowered to be your best. We encourage you to take risks and in return, 
                        offer a world of rewards and benefits for performance. Exceeding your limits is an exceptional start to your life's best work.</p>
                        
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