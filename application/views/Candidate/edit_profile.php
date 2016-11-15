 <div class="header-page-title">
      <div class="container">
        <h1>Employer Dashboard</h1>
		<ul class="breadcrumbs hidden-xs">
			<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
			<li><a href="javascript:void(0)">Profile</a></li>
		</ul>
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
              
                <p class="jobs-posted">13,234 Jobs Posted </p>
                <form name="searchForm" autocomplete="off" id="searchJobForm" action="<?php echo CMS_JOBS_PATH?>" method="GET">
				<div class="row">
                  <div class="col-md-4">
                    <input class="form-control" id="looking_for" name="looking_for" placeholder="I'm looking for a ..." type="text">
                  </div>
                  <div class="col-md-3">
                    <input class="form-control" id="location" name="location" placeholder="Location" type="text">
                  </div>
                  <div class="col-md-3">
                    <select>
                      <option value="">Select Category</option>
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4</option>
                      <option value="">5</option>
                    </select>
                  </div>
                  <button class="col-md-2 btn btn-default btn-small pull-right" id="searcheJob">Searchf</button>
				  </form>
                  <a href="advance-search.html" class="advns-search pull-right">Advanced Search <i class="fa fa-arrow-circle-o-right"></i></a> </div>
              </form>
            </section>
            <section>
                            <div class="row">
                <div class="col-lg-12 col-md- col-sm- col-xs- col-lg-offset-  one-half">
                  <div class="responsive-tabs  vertical">
                    <ul class="nav nav-tabs">
                      <li class="e-tab-title menuicon  active"> <a href="#tab1"><i class="fa fa-user" aria-hidden="true"></i><br>
                        Profile</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#tab2"><i class="fa fa-briefcase" aria-hidden="true"></i><br>
                        Jobs</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#tab3"><i class="fa fa-bell" aria-hidden="true"></i><br>
                        Alerts</a> </li>
                      <li class="e-tab-title menuicon"> <a href="#tab4"><i class="fa fa-cog" aria-hidden="true"></i><br>
                        Settings</a> </li>
                    </ul>
                    <div class="tab-content"> <a href="#tab1" class="acc-link active first">Tab 1</a>
                      <div class="tab-pane  active" id="tab1">
                        <Div class="row" style="margin:0; padding:0; ">
                          <h5 style="margin-top:15px; font-style:italic">jobs-posted Not Searchible (Lastupdate : 09/10/2016)</h5>
                          <div class="title-lines">
                            <h3 class="mt0">Profile</h3>
                          </div>
                          <div class="row clearfix view">
                            <div class="col-md-6 col-sm-12"><input class="form-control" placeholder="Name" type="text"></div>
                            <div class="col-md-3 col-sm-12 pull-right">
                              <button class="btn btn-default mb15">Save Profile</button>
                            </div>
                          </div>
                          <div class="row clearfix candidate-profile">
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="E-mail" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add phone" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add Zip" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="City" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="State" type="text"></div>
                            <div class="col-md-4 jobtitle1">Searchble</div>
                          </div>
                          <div class="row clearfix candidate-profile">
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add Linkdin Profile" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add Twitter url" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add facebook url" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Add Personalweb site" type="text"></div>
                          </div>
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
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Job Title" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Experence" type="text"></div>
                            <div class="col-md-4 jobtitle1">
                            	<select>
											<option value="">Job Type</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select>
                            </div>
                            <div class="col-md-4 jobtitle1"><select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="present City" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Relocated To" type="text"></div>
                            <div class="col-md-4 jobtitle1"><select>
											<option value="">Security Clerance (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="Salary" type="text"></div>
                            <div class="col-md-4 jobtitle1"><input class="form-control" placeholder="hourly Rate" type="text"></div>
                            
                            
                            
                            
                          </div>
                                 
                           
                             
                             
                                
                              
                              
                            </div>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Skill set</h3>
                          </div>
                          <div class="row bottom-15 clearfix remove">
                            <table class="table-bordered">
				<thead>
					<tr>
						<th>Top Skills</th>
						<th>Experience</th>
						<th>Last Used</th>
                        <th></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>
                        	<select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select>
                        </td>
						<td><select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></td>
						<td><select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></td>
						<td><i class="fa fa-times" aria-hidden="true"></i></td>
                        
					</tr>
                    <tr>
						<td>
                        	<select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select>
                        </td>
						<td><select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></td>
						<td><select>
											<option value="">Relocate (Yes or No)</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></td>
						<td><i class="fa fa-plus " aria-hidden="true"></i></td>
                        
					</tr>

				

					
				</tbody>
			</table>
                          </div>
                         
                        
                         
                          <div class="title-lines">
                            <h3 class="mt0">Work Experence</h3>
                          </div>
                          <div class="row">
                            <div class="col-md-4"><input class="form-control" placeholder="Job Title" type="text"></div>
                            <div class="col-md-4"><input class="form-control" placeholder="Company" type="text"></div>
                            <div class="col-md-4">Date Control</div>
                            
                          </div>
                          <div class="col-md-3 pull-left padding0" style="margin-top:15px;">
                            <button class="btn btn-gray mb15">Add </button>
                          </div>
                          <div class="title-lines">
                            <h3 class="mt0">Education</h3>
                          </div>
                          <div class="row">
                            <div class="col-md-3"><select>
											<option value="">Higest Degree</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select></div>
                            <div class="col-md-3"><input class="form-control" placeholder="Inistute" type="text"></div>
                            <div class="col-md-3"><input class="form-control" placeholder="City" type="text"></div>
                            <div class="col-md-3"><input class="form-control" placeholder="Country" type="text"></div>
                          </div>
                          <div class="col-md-3 pull-left padding0" style="margin-top:15px;">
                           <button class="btn btn-gray mb15">Add </button>
                          </div>
                        </div>
                                              <div class="ui-divider">
                                              	
                                              </div>
                                              <div class="row">
                                              	<div class="col-md-10"> <button class="btn btn-default mb15 pull-right">Back </button></div>
                                                <div class="col-md-2"> <button class="btn btn-default mb15">Save Profile </button></div>
                                              </div>
                      </Div>
                      <a href="#tab2" class="acc-link">Tab 2</a>
                      <div class="tab-pane " id="tab2">
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
                      <a href="#tab3" class="acc-link last">Tab 3</a>
                      <div class="tab-pane  last" id="tab3">
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
                      <a href="#tab4" class="acc-link last">Tab 4</a>
                      <div class="tab-pane  last" id="tab4">
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
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH?>css/candidate.css">