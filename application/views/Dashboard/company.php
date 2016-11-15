<div id="page-content">
    	<div class="employer-info">
			<div class="container">
            	<div class="row">
                	<div class="col-md-6 mt30">
                    <div class="media ">
                      <div class="pull-left ">
                        <a href="#">
                          <img class="media-object" src="<?php echo COMPANY_AVATAR_PATH ?><?php echo $this->session->userdata['logged_in']['company_data']->cmp_logo_image_path?>" alt="Company">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_company_name;?></h4>
                        <p><?php echo $this->session->userdata['logged_in']['company_data']->cmp_address_one;?></p>
                      </div>                     
                    </div>
                     <a href="<?php echo EMP_POST_JOB;?>" class="btn btn-orange mt20">POST JOB</a>
                    </div>
                    <div class="col-md-6">
                      <h4 class="media-heading">Quick Stats - June</h4>
                    	<ul class="list-group">
                        <li class="list-group-item"><span class="badge">14</span>Live jobs</li>
                        <li class="list-group-item"><span class="badge">14</span> Jobs Posted </li>
                        <li class="list-group-item"><span class="badge">14</span>Job views </li>
                        <li class="list-group-item"><span class="badge">14</span>Applications Received</li>
                        </ul>
                    </div>                
                </div>
			</div>
		</div>
		<div class="container ">       
        <div class="white-container dashboard mt20">
			<div class="row mt20">
				<div class="col-xs-6 col-md-3 col-sm-4 text-center mb30">
                	<a href="<?php echo EMP_PROFILE;?>" alt="" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/company.png">
                    <h4>Company Profile</h4>
                	</a>
                </div>
                <div class="col-xs-6 col-md-3 col-sm-4 text-center mb30">
                	<a href="<?php echo EMP_JOBS_PATH;?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/jobs.png">
                    <h4>Jobs</h4>
                	</a>
                </div>
                <div class="col-md-3 col-xs-6 col-sm-4 text-center mb30">
                	<a href="<?php echo EMP_SUBSCRIPTION_PATH;?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/products.png">
                    <h4>Subscriptions</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_SAVED_RESUMES_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/resumes.png">
                    <h4>Saved Resumes</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_APPLICATION_TRACK_PATH;?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/tracking.png">
                    <h4>Application Track</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_SUB_ACCOUNTS_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/sub-accounts.png">
                    <h4>Sub-Accounts</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_ALERTS_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/alerts.png">
                    <h4>Alerts</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_SCREENING_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/questionary.png">
                    <h4>Screening <br>Questionnaires</h4>
                	</a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_NOTIFICATIONS_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/notification.png">
                    <h4>Notifications</h4>
                	</a>
                </div>
                 <div class="col-md-3 col-sm-4 col-xs-6 text-center mb30">
                	<a href="<?php echo EMP_MESSAGNING_PATH?>" ><img alt="" src="<?php echo ADMIN_IMG_PATH ?>content/mals.png">
                    <h4>Messaging</h4>
                	</a>
                </div>


            </div>
						
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
	</div>