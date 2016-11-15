<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="white-container mb0">
							<form name="searchForm" autocomplete="off" id="searchJobForm" action="<?php echo CMS_JOBS_PATH?>" method="GET">
							<div class="widget sidebar-widget jobs-search-widget">
								<h5 class="widget-title">Search</h5>

								<div class="widget-content">
									<span>I'm looking for a ...</span>
									<?php $looking=isset($_GET['looking_for']) ? $_GET['looking_for'] : '';?>
									<input type="text" name="looking_for" id="looking_for" class="form-control" placeholder="I'm looking for a ..." value="<?php echo $looking?>">

									

									<span>Location / City</span>
									<?php $location=isset($_GET['location']) ? $_GET['location'] : '';?>
									<input type="text" name="location" value="<?php echo $location;?>"id="location" class="form-control mb10"/>
									<!--<select multiple id="searchCity" style="min-height: 38px;width: 100%;">
										<option value="New York">New York</option>
										<option value="Los Angeles">Los Angeles</option>
										<option value="Chicago">Chicago</option>
										<option value="Phoenix">Phoenix</option>
										<option value="San Antonio">San Antonio</option>
								<?php
									/*if(sizeof($cities)>0){
										foreach($cities as $keys=>$vals){
											echo "<option value=$vals->cty_city_name>$vals->cty_city_name</option>";
										}
									}*/
									?>
								</select>--->
								<span>Industry Type</span>
									<?php $indstry=isset($_GET['indstry']) ? $_GET['indstry'] : '';?>
									<select  id="searchIndstry" name="indstry" class="mb10" style="min-height: 38px;width: 100%;">
										<?php
										if(sizeof($industryTypes)>0){
										foreach($industryTypes as $keys=>$vals){
											if($indstry==$vals->int_Industry_type){$selected="selected";}
											else{$selected='';}?>
											<option <?php echo $selected?> value="<?php echo $vals->int_Industry_type?>"><?php echo $vals->int_Industry_type; ?></option>';
										<?php }
										}
										?>
										</select>
									<input type="submit"  class="btn btn-default searchJobs" value="Search" />
								</div>
							</div>

							<div class="widget sidebar-widget jobs-filter-widget">
								<h5 class="widget-title">Filter Results</h5>

								<div class="widget-content">
									<!--<h6>By Region</h6>-->

									<!--<div>
									<?php
									if(sizeof($regionsList)>0){
										echo '<ul class="filter-list">';
										foreach($regionsList as $regKey=>$regVals){
											echo '<li><a href="#">'.$regVals->reg_name.'<span>('.strlen($regVals->reg_name).')</span></a>';
											if(sizeof($states)>0){
												echo "<ul>";
												foreach($states as $sttkeys=>$sttVals){
													if($regVals->reg_id==$sttVals->stt_regeion_id){
														echo '<li><a href="#">'.$sttVals->stt_state_name.'<span>('.$sttVals->stt_id.')</span></a></li>';
													}
												}
												echo "</ul>";
												}
										echo "</li>";		
										}
										echo '</ul>';
									}
									?>
									<a href="#" class="toggle"></a>
									</div>-->  
									<!--<h6>By Industry</h6>

									<div id="industry-list">
										<ul class="filter-list">
										<?php
										if(sizeof($industryTypes)>0){
											foreach($industryTypes as $keys=>$vals){
												echo '<li><a href="#">'.$vals->int_Industry_type.'<span>('.strlen($vals->int_Industry_type).')</span></a>';
										}
										}
										?>
										</ul>
										<a href="#" class="toggle"></a>
									</div>-->

									<h6>By Type</h6>

									<div>
										<div id="functionalitySearch" class="functionalitySearch">
										<ul class="filter-list">
										<?php
										if(sizeof($functionalityTypes)>0){
											foreach($functionalityTypes as $keys=>$vals){
												echo '<li class="functionality"><a href="javascript:void(0)">'.$vals->fnt_functional_type.'<span>('.strlen($vals->fnt_functional_type).')</span></a>';
										}
										}
										?>
										</ul>
										</div>

										<a href="javascript:void(0)" class="toggle toggle_search"></a>
									</div>

									<h6>Type of Contract</h6>
									<div>
									<div>
										<div class="checkbox"><label><input type="checkbox"> Full-Time</label></div>
										<div class="checkbox"><label><input type="checkbox"> Part-Time</label></div>
										<div class="checkbox"><label><input type="checkbox"> Freelance</label></div>
										<div class="checkbox"><label><input type="checkbox"> Internship</label></div>
									</div>	
										<a href="javascript:void(0)" class="toggle toggle_search"></a>
									</div>									
									<h6>Work Experience</h6>
									<div>
									<div>
									<div class="checkbox"><label><input type="checkbox"> Not Applicable</label></div>
									<div class="checkbox"><label><input type="checkbox"> Mid-Senior Level</label></div>
									<div class="checkbox"><label><input type="checkbox"> Entry Level</label></div>
									<div class="checkbox"><label><input type="checkbox"> Associate</label></div>
									<div class="checkbox"><label><input type="checkbox"> Director</label></div>
									<div class="checkbox"><label><input type="checkbox"> Internship</label></div>
									<div class="checkbox"><label><input type="checkbox"> Executive</label></div>
									</div>
										<a href="javascript:void(0)" class="toggle toggle_search"></a>
									</div>
									<h6>Work Permit</h6>
									<div>
									<div>
									<div class="radio"><label><input name="workPermit" type="radio"> Full-Time</label></div>
									<div class="radio"><label><input name="workPermit" type="radio"> Part-Time</label></div>
									<div class="radio"><label><input name="workPermit" type="radio"> Freelance</label></div>
									</div>
										<a href="javascript:void(0)" class="toggle toggle_search"></a>
									</div>

									<h6>Date Posted</h6>

									<div class="range-slider clearfix">
										<div class="slider" data-min="1" data-max="60"></div>
										<div class="first-value"><span>1</span> days</div>
										<div class="last-value"><span>60</span> days</div>
									</div>

									<h6>Salary Range</h6>

									<div class="range-slider clearfix">
										<div class="slider" data-min="1" data-max="100000"></div>
										<div class="first-value">$ <span>1</span></div>
										<div class="last-value">$ <span>100000</span></div>
									</div>

									<span class="btn btn-default mt30 searchJobs" >Filter</span>
								</div>
							</div>
						</div>
						</form>
					</aside>
				</div> <!-- end .page-sidebar -->

				<div class="col-sm-8 page-content pb0">
					<div id="jobs-page-mapss">
					<iframe style="height:300px;width:750px"src="http://candorstep.com/dev/common/mapbylatlang/17.4325235/78.40701519999993"></iframe>
					</div>
					
					<div class="title-lines">
						<h3 class="mt0">Available Jobs</h3>
					</div>
					<h3 class="mt0"><?php echo sizeof($jobsListObj)."Jobs found ";  ?></h3>
					<!--<div class="jobs-item with-thumb">
						<div class="thumb"><img src="img/content/c1.jpg" alt=""></div>
						<div class="clearfix visible-xs"></div>
						<div class="date">27 <span>Jun</span></div>
						<h6 class="title"><a href="#">Front-end Developer</a></h6>
						<span class="meta">Envato, Sydney, AU</span>

						<ul class="top-btns">
							<li><a href="#" class="btn btn-gray fa fa-star"></a></li>
						</ul>

						<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquid a 
                        dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae.</p>

						
					</div>

					<div class="jobs-item with-thumb">
						<div class="thumb"><img src="img/content/c2.jpg" alt=""></div>
						<div class="clearfix visible-xs"></div>
						<div class="date">27 <span>Jun</span></div>
						<h6 class="title"><a href="#">Front-end Developer</a></h6>
						<span class="meta">Envato, Sydney, AU</span>

						<ul class="top-btns">
							<li><a href="#" class="btn btn-green fa fa-star"></a></li>
						</ul>

						<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus 
                        similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae.
               			</p>

						
					</div>

					<div class="jobs-item with-thumb">
						<div class="thumb"><img src="img/content/c4.jpg" alt=""></div>
						<div class="clearfix visible-xs"></div>
						<div class="date">27 <span>Jun</span></div>
						<h6 class="title"><a href="#">Front-end Developer</a></h6>
						<span class="meta">Envato, Sydney, AU</span>

						<ul class="top-btns">
							<li><a href="#" class="btn btn-gray fa fa-star"></a></li>
						</ul>

						<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquid 
                        a dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae. </p>						
					</div>-->

				</div> <!-- end .page-content -->
				<div id="jobs-list" class="col-sm-8 page-content pt0">
				<div class="clearfix mb10">
						<ul class="jobs-view-toggle-data pull-left">
							<li class="jobs-list-toggle" id="th_list"><a href="javascript:void(0)"  class="btn btn-gray fa fa-th-list active"></a></li>
							<li class="jobs-list-toggle" id="list"><a href="javascript:void(0)"  class="btn btn-gray fa fa-list"></a></li>
							<li class="jobs-list-toggle" id="simple_list"><a href="javascript:void(0)"  class="btn btn-gray fa fa-align-justify"></a></li>
						</ul>
				</div>
    <ul class="list jobs_list">
      <?php
	  if(sizeof($jobsListObj)>0){
			foreach($jobsListObj as $key=>$vals) { ?>
			<li class="jobs_list_items">
			<div class="jobs-item with-thumb">
					<div class="thumb"><img src="<?php echo COMPANY_AVATAR_PATH ?><?php echo $vals->cmp_logo_image_path?>" alt="<?php echo $vals->cmp_company_name?>"></div>
						<div class="clearfix visible-xs"></div>
						<div class="date"><?php echo date_format(date_create($vals->job_created_on),"d");?><span><?php echo ucfirst(date_format(date_create($vals->job_created_on),"M"));?></span></div>
						<h6 class="title"><a target="_blank" href="<?php echo JOB_DETAILS_PATH.'/'.$vals->job_uuid;?>"><?php echo $vals->job_role;?></a></h6>
						<span class="meta"><?php echo $vals->stt_state_name.', '.$vals->cty_city_name.'-'.$vals->job_location_zip;?></span>
						<div class="description"><?php echo $vals->job_description;?></div>							
			</div>
			</li>
	<?php }
	  }?>
    </ul>
    <ul class="pagination"></ul>
  </div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css"/>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbrg8coho0ucUMP_-MuoRxCNK3ZqNanIE&sensor=false&libraries=places&language=en"></script>

<script>
var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
var input = document.getElementById('location');
var autocomplete = new google.maps.places.Autocomplete(input,options);

$("#searchIndstry").select2();
var jobsListData = new List('jobs-list', {
  valueNames: ['name'],
  page: 5,
  plugins: [ ListPagination({}) ] 
});

$('li.jobs-list-toggle').click(function(){
	//alert($(this).attr("id"));
	if($(this).attr("id")=="th_list"){
		$("div.thumb").show();
		$("div.description").show();
		$("p.description").show();
	}else if($(this).attr("id")=="list"){
		$("div.thumb").hide();
		$("div.description").show();
	}else if($(this).attr("id")=="simple_list"){
		$("div.thumb").hide();
		$("div.description").hide();
	}
});
</script>
	