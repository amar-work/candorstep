<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate extends My_Controller {

	public function __construct() {

		parent::__construct();
		
		$this->redirectToLoginPage();
		// Load database
		$this->load->model('users_model');
		$this->load->model('jobs_list');
		$this->load->model('candidate_model');
	}
	
	public function edit(){
		$data=array();
		loadViewHelper ( 'Candidate/edit_profile', $data );
	}
	public function jobs(){
		$jobsList=$this->jobs_list->getAllJobsByCompany($this->session->userdata['logged_in']['company_data']->cmp_id);
		$data=array('jobsList'=>$jobsList);
		loadViewHelper ( 'Company/jobs', $data );	
	}
	
	public function subscriptions(){
		$data=array();
		loadViewHelper ( 'Company/subscriptions', $data );	
	}
	
	public function saved_resumes(){
		$data=array();
		loadViewHelper ( 'Company/saved_resumes', $data );
	}
	
	public function application_track(){
		$data=array();
		loadViewHelper ( 'Company/application_track', $data );
	}
	
	public function sub_accounts(){
		$data=array();
		loadViewHelper ( 'Company/sub_accounts', $data );
	}
	
	public function alerts(){
		$data=array();
		loadViewHelper ( 'Company/alerts', $data );
	}
	
	public function screening()	{
		$data=array();
		loadViewHelper ( 'Company/screening', $data );
	}
	
	public function notifications()	{
		$data=array();
		loadViewHelper ( 'Company/notifications', $data );
	}
	
	public function messaging()	{
		$data=array();
		loadViewHelper ( 'Company/messaging', $data );
	}
	public function posting(){
		$statesList=$this->users_model->getAllStates();
		$industryList=$this->jobs_list->getAllIndustryTypes();
		$functionalityList=$this->jobs_list->getAllIFunctionalTypes();
		$data=array('industryTypes'=>$industryList,'functionalityTypes'=>$functionalityList,'states'=>$statesList);
		loadViewHelper ( 'Company/post_a_job', $data );
	}
	
	public function addposting(){
		header ( 'Content-Type: application/json' );
		$addJob=$this->jobs_list->createNewJob($_POST);
		if($addJob > 0){
		echo json_encode ( array (
					'status' => 'success' ,'message'=>'New job created successfully'
			) );
		}else{
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Unable to process your request, please try after sometime'
			) );
		}
	}
	
	public function viewjob(){
		$job_id = $this->uri->segment (3);
		if(!$job_id){
			redirect ( EMP_JOBS_PATH );
		}else{
			$jobDataObj=$this->jobs_list->checkJobBYCompany($job_id,$this->session->userdata['logged_in']['company_data']->cmp_id);
			if(sizeof($jobDataObj)>0){
				$statesList=$this->users_model->getAllStates();
				$industryList=$this->jobs_list->getAllIndustryTypes();
				$functionalityList=$this->jobs_list->getAllIFunctionalTypes();
				$data=array('industryTypes'=>$industryList,'functionalityTypes'=>$functionalityList,'states'=>$statesList,'jobDataObj'=>$jobDataObj[0]);
				loadViewHelper ( 'Company/view_a_job', $data );
			}else{
				redirect ( EMP_JOBS_PATH );
			}
			
			
		}
	}
	
	public function updateprofle(){
		header ( 'Content-Type: application/json' );
		if(isset($_POST)){
				$profileData=$this->candidate_model->updateProfileData($_POST);
				$jobsData=$this->candidate_model->updateJObData($_POST);
		
		if(sizeof($_POST['userSkillId']) >0){
			foreach($_POST['userSkillId'] as $key=>$vals)
				if($vals == 0){
					$jobsData=$this->candidate_model->addSkillsData(
												$_POST['userSkillName'][$key],
												$_POST['userSkillExprYr'][$key],
												$_POST['userSkillExprMn'][$key],
												$_POST['userSkillLstUsed'][$key]
												);
				}else{
					$jobsData=$this->candidate_model->updateSkillsData($_POST['userSkillName'][$key],
												$_POST['userSkillExprYr'][$key],
												$_POST['userSkillExprMn'][$key],
												$_POST['userSkillLstUsed'][$key],
												$_POST['userSkillId'][$key]
												);	
				}
				
		}
		
		if(sizeof($_POST['userJobId']) >0){
			foreach($_POST['userJobId'] as $key=>$vals)
				if($vals == 0){
					$jobsData=$this->candidate_model->addJobsData(
												$_POST['userJobTitle'][$key],
												$_POST['userJobCompany'][$key],
												$_POST['userwrkExpFrom'][$key],
												$_POST['userwrkExpTo'][$key]
												);
				}else{
					$jobsData=$this->candidate_model->updateJobsData($_POST['userJobTitle'][$key],
												$_POST['userJobCompany'][$key],
												$_POST['userwrkExpFrom'][$key],
												$_POST['userwrkExpTo'][$key],
												$_POST['userJobId'][$key]
												);	
				}
				
		}
		
		if(sizeof($_POST['userEdcId']) >0){
			foreach($_POST['userEdcId'] as $key=>$vals)
				if($vals == 0){
					$jobsData=$this->candidate_model->addEdcData(
												$_POST['userEdcDegree'][$key],
												$_POST['userEdcSplz'][$key],
												$_POST['userEdcInistute'][$key],
												$_POST['userEdcState'][$key],
												$_POST['userEdcCity'][$key],
												$_POST['userEdcPassed'][$key],
												$_POST['userEdcPass'][$key]
												);
				}else{
					$jobsData=$this->candidate_model->updateEdcData(
												$_POST['userEdcDegree'][$key],
												$_POST['userEdcSplz'][$key],
												$_POST['userEdcInistute'][$key],
												$_POST['userEdcState'][$key],
												$_POST['userEdcCity'][$key],
												$_POST['userEdcPassed'][$key],
												$_POST['userEdcPass'][$key],
												$_POST['userEdcId'][$key]
												);	
				}
				
		}
		
		echo json_encode ( array (
					'status' => 'success' ,'message'=>'User profile updated successfully'
			) );
		}else{
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Unable to process your request, please try after sometime'
			) );
		}
	}
	
	public function uploadresume(){
		$uploaddir = UPLOADS_JOBSEEKER_RESUME_PATH;
		if ($_FILES["Filedata"]["error"] > 0)
		{
			$returnData=array('status'=>'error','path'=>'','fileName'=>'','fileType'=>'');
		}
		else
		{	
		    $tempPath=$_FILES["Filedata"]["tmp_name"];
			$unixTime = time(); 
			$name = $unixTime.'_'.str_replace(' ', '_',str_replace('&', '_', $_FILES['Filedata']['name']));
			$nameIcon = 'icon_'.$name;
			$uploadfile = $uploaddir . basename($name);
			
			if( $_FILES['Filedata']['type']=='application/msword'){ 
				
				if (move_uploaded_file($tempPath, $uploadfile)) {
					$status="success";
				} else {
					$status="error";
				    
				}
			}else{
				$status="error";
				
			}
			
		$returnData=array('status'=>$status,'path'=>$uploaddir,'fileName'=>$name,'fileType'=>$_FILES['Filedata']['type']);
		}
		
		exit(json_encode($returnData));
	}
}


