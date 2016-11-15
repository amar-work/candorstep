<div class="header-page-title">
			<div class="container">
				<img alt="" class="breadcrumb-img" src="img/content/company-small.png">
                <h1>Company Profile</h1>
				<ul class="breadcrumbs hidden-xs">
					<li><a href="<?php echo USER_DASHBOARD_PATH?>">Home</a></li>
					<li><a href="javascript:void(0)">Jobs</a></li>
				</ul>
			</div>
		</div>

<div id="page-content">
		<div class="container ">       
        <div class="white-container mt20">
        <div class="bottom-line clearfix mb10 ">
        <button class="btn btn-gray pull-right ">Edit</button>
         <button class="btn btn-gray pull-right mr10">Delete</button>
          <button class="btn btn-gray pull-right mr10">Activate</button>
        </div>
        <table id="jobsList" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><label><input type="checkbox"> All</label></th>
                <th>Title</th>
                <th>Job ID</th>
                <th>Posted</th>
                <!--<th>Expiration Date</th>--->
                <th>Status</th>
                <th>No of Views</th>
                <th>Applications</th>
            </tr>
        </thead>
		<tbody>
            <?php
			if(sizeof($jobsList)>0){
				foreach($jobsList as $keys=>$vals){
				$jobStatus=$vals->job_is_active == 1?"Active":"Inactive";	
				?>
					<tr>
					<td><input type="checkbox"></td>
					<td><?php echo $vals->job_title; ?></td>
					<td><?php echo $vals->job_reference_id; ?></td>
					<td><?php echo $vals->job_created_on; ?></td>
					<td><?php echo $jobStatus; ?></td>
					<td><?php echo $vals->job_id; ?></td>
					<td><a href="<?php echo EMP_VIEW_JOBS_PATH.'/'.$vals->job_uuid?>">View</a></td>
					</tr>
			<?php }
			}
			?>
            </tbody>
            </table>   
         </div>        		
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>	
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">	
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH?>data-tables/dataTables.bootstrap.min.css">	
<script>
$(document).ready(function() {
    $('#jobsList').DataTable();
} );
</script>	