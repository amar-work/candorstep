<div class="employer-signup">
    	<div class="container">
        	<div class="row text-center">
            	<div class="col-md-12 white">
                <h1>Post Jobs and View Talent Solutions at a Glance</h1>
                <h5>Get Tech Talent Faster and Easier through Candorstep</h5>
              </div>
              </div>
              <div class="row text-center">
                     <div class=" col-md-4">
                      <div class="plans">
                         <h3>BRONZE</h3>
                         <h3>$ 15</h3>
                     </div>
                     </div>
             
               
                     <div class=" col-md-4">
                        <div class="plans">
                         <h3>SILVER</h3>
                         <h3>$ 30</h3>
                     </div>
                     </div>
               
                     <div class=" col-md-4">
                        <div class="plans">
                         <h3>GOLD</h3>
                         <h3>$ 50</h3>
                     </div>
                     </div>
                     </div>
                </div>
       			 </div>
                
       		 </div
<div id="page-content">
		<div class="container">
			<div class="row">
			<form autocomplete="off" id="employee_signup_form" class="employee_signup_form" method="POST" action="employeesignup" role="form">
				<div class="col-sm-12 page-content">
					
					<div class="white-container sign-up-form">
						<div id="alert_area"></div>
							<section>
								<h6 class="bottom-line mt10">Contact Info:</h6>

								<h6 class="label">Name</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="userFstName" class="form-control" placeholder="Name">
									</div>

									<div class="col-sm-4">
										<input type="text" name="userLstName" class="form-control" placeholder="Surname">
									</div>
								</div>
                                <h6 class="label">Email ID</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="userEmail" class="form-control" placeholder="eMail ">
									</div>
								</div>

								<h6 class="label">Mobile</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="userMobile" class="form-control" placeholder="Mobile">
									</div>

									<div class="col-sm-4">
										<input type="text" name="empWork" class="form-control" placeholder="Work">
									</div>

									<div class="col-sm-4">
										<input type="text" name="empFax" class="form-control" placeholder="Fax">
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Company Information:</h6>
								
                                <h6 class="label">Company Name</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="cmpName" class="form-control" placeholder="Name">
									</div>
								</div>
                                <h6 class="label">Address</h6>

								<div class="row">
									<div class="col-sm-6">
										<input type="text" name="cmpAddressOne" class="form-control" placeholder="Address 1">
									</div>

									<div class="col-sm-6">
										<input type="text" name="cmpAddressTwo" class="form-control" placeholder="Address 2">
									</div>
								</div>

								<div class="row">
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
								<h6 class="bottom-line">Attachments:</h6>
								<div class="row">                               
									<div class="col-sm-6">
                                     <h6 class="label">Logo Upload</h6>
										<div id="user_avatar">
										<img id="user_avatar_img" src="<?php echo ROOT_URL?>/uploads/company_avatar/company_default_logo.png" height="200px">
										</div>
										<div id="uploaderText"></div>
										<input id="upload_file" name="comany_profile_pic" type="hidden" value="company_default_logo.png" readonly>
									</div>
                                    <div class="col-sm-6">
                                    <h6 class="label">Video Upload</h6>
										<div id="user_avatar_video">
										<img id="user_avatar_video_thumb" src="<?php echo ROOT_URL?>/uploads/company_avatar/company_default_video_thumb.png" height="200px">
										</div>
										<div id="uploaderTextVideo"></div>
										<input id="video_upload_file" name="user_profile_video" type="hidden" value="company_default_video_thumb.png" readonly>
									</div>                                    
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Set Password:</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="password" name="userPassword" id="empPassword"  class="form-control" placeholder="Password">
									</div>

									<div class="col-sm-4">
										<input type="password" name="empCnfPassword" class="form-control" placeholder="Repeat Password">
									</div>
								</div>
							</section>
					

						<hr class="mt60">

						<div class="clearfix" style="width:30%">
						<button type="submit" class="btn btn-default signup-btn btn-block mb15" value="SIGNUP">REGISTER</button>
						</div>
					</div>
				</div> <!-- end .page-content -->
				</form>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH ?>validator/signup.validator.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH?>ajaxupload.3.5.js"></script>
<script>

		var btnUpload = $('#user_avatar');
		var newImgSrc='';
        new AjaxUpload(btnUpload, {
			action :  '<?php echo ADMIN_SITEURL; ?>/signup/userimgupload',
            name   : 'Filedata',  
            dataType: 'json',
			data:{imageFor:'company'},
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
					var image_path=rootURL+'/uploads/company_avatar/'+result.fileName; 
                      $('#user_avatar_img').attr("src", image_path);
                      $('#uploaderText').html('<span class="errorMessage">Your picture</span>');
      				  $('#upload_file').val(result.fileName);
      				$('#del_pic').show();
      				$("#user_avatar").hideLoading();
                }else{
      				$("#user_avatar").hideLoading();
                	var image_path=rootURL+'/uploads/company_avatar/emp_default_profile.png'; 
                    $('#user_avatar_img').attr("src", image_path);
                    $('#uploaderText').html('<span class="errorMessage">Upload a valid JPG/PNG/GIF image less than 5mb</span>');
    				$('#upload_file').val('up.png');
    				$("#user_avatar").hideLoading();
                }
            }
        },'json');
		

</script>
