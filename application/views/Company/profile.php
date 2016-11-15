<div class="header-page-title">
			<div class="container">
				<img alt="" class="breadcrumb-img" src="img/content/company-small.png">
                <h1>Company Profile</h1>
				<ul class="breadcrumbs hidden-xs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="javascript:void(0)">Profile</a></li>
				</ul>
			</div>
		</div>

<div id="page-content">
		<div class="container ">       
        <div class="white-container  mt20">
			<div class="row ">
				<div class="col-md-6">
                <div class="media ">
                  <div class="pull-left ">
                    <a href="#">
                      <img class="media-object" src="<?php echo COMPANY_AVATAR_PATH ?><?php echo $this->session->userdata['logged_in']['company_data']->cmp_logo_image_path?>" alt="Company">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_company_name;?></h4>
                    <p> <?php echo $this->session->userdata['logged_in']['company_data']->city_name.','.$this->session->userdata['logged_in']['company_data']->state_name;?></p>
                  </div>                     
                </div>                    
                </div>
                <div class="col-md-6 ">
                 <a href="#" class="pull-right btn btn-gray mt20">EDIT</a>
                 </div>
          </div> 
          <div class="row ">
				 <div class="col-md-12">
                 <h5 class="bottom-line mt10">Description</h5>
                 <p><?php echo $this->session->userdata['logged_in']['company_data']->cmp_description;?></p>
                 </div>
          </div>
          <div class="row ">
				 <div class="col-md-6">
                 <h5 class="bottom-line mt10">Address</h5>
                 <address>
                    <?php echo $this->session->userdata['logged_in']['company_data']->cmp_address_one;?>
                </address>
               
                 </div>
                  <div class="col-md-6">
                 <h5 class="bottom-line mt10">Contact</h5>
                 <p>
                 	Amarnadh Gedela<br>
                    Phone: <a href="tel:<?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_work;?>"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_work;?></a> <br>
                    Mobile: <a href="tel:<?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_fax;?>"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_fax;?></a> <br>
                    Email: <a href="mailto:<?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_email_one;?>"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_email_one;?></a><br>
                    Email: <a href="mailto:<?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_email_two;?>"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_contact_email_two;?></a><br>
                    Website: <a href="<?php echo $this->session->userdata['logged_in']['company_data']->cmp_website;?>" target="_blank"><?php echo $this->session->userdata['logged_in']['company_data']->cmp_website;?></a>
                </p>
                 </div>
                 <div class="col-md-12">
                 	<div class="widget-content">
                        <div class="fitvidsjs" style="text-align:center">
						<?php
						if($this->session->userdata['logged_in']['company_data']->cmp_contact_work!=null){
						?>
                            <video id="my-video" class="video-js vjs-default-skin" controls preload="auto" width="auto" height="264" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
							<source src="<?php echo COMPANY_VIDEO_PATH ?><?php echo $this->session->userdata['logged_in']['company_data']->	cmp_video_path;?>" type='video/mp4'>
						<p class="vjs-no-js">
						  To view this video please enable JavaScript, and consider upgrading to a web browser that
						</p>
						</video>
						<?php }?>

  
                        </div>
                    </div>
                 </div>
          </div> 
          <div class="row">
          <div class=" col-sm-12">
			<div class="accordion">
						<ul>
							<li class="">
								<a href="#">Change Password</a>
								<div style="display: block;">
									<form class="">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter old password">
									</div>

									<div class="form-group">
										<input type="password" class="form-control" placeholder="password">
									</div>

									<div class="form-group">
										<input type="password" class="form-control" placeholder="Confirn password">
									</div>
									<button type="submit" class="btn btn-default"><i class="fa fa-envelope-o"></i> Update</button>
								</form>
								</div>
							</li>
						</ul>
					</div>
                    </div>
          </div>         
          </div>        		
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->		

 <link href="http://vjs.zencdn.net/5.11.7/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>	
  <script src="http://vjs.zencdn.net/5.11.7/video.js"></script>