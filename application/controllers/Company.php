<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends My_Controller {

	public function __construct() {

		parent::__construct();
		
		$this->redirectToLoginPage();
		if($this->session->userdata['logged_in']['usr_role']!="employee"){
			$this->redirectToLoginPage();
		}
		// Load database
		$this->load->model('users_model');
		$this->load->model('jobs_list');
	}

	public function profile(){
		$data=array();
		loadViewHelper ( 'Company/profile', $data );
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
			$jobDataObj=$this->jobs_list->getJobDetails($job_id);
			if(sizeof($jobDataObj)>0){
				$functionalityList=$this->jobs_list->getFunctionalityNameByID($jobDataObj[0]->job_type);
				$jobDataObj[0]->job_functionality_type=$functionalityList[0]->fnt_functional_type;
				
				$industryList=$this->jobs_list->getIndustryNameByID($jobDataObj[0]->job_industry);
				$jobDataObj[0]->job_industry_type=$industryList[0]->int_Industry_type;
				
				$statesList=$this->users_model->getStateCityById($jobDataObj[0]->job_location_city);
				$jobDataObj[0]->job_state_name=$statesList[0]->stt_state_name;
				$jobDataObj[0]->job_city_name=$statesList[0]->cty_city_name;
				
				// getting company details
				$companyData=$this->jobs_list->getCompanyDetailsById($jobDataObj[0]->job_company_id);
				
				$data=array('jobDataObj'=>$jobDataObj[0],'companyData'=>$companyData[0]);
				loadViewHelper ( 'Company/view_a_job', $data );
			}else{
				redirect ( EMP_JOBS_PATH );
			}
			}
	}
	public function editjob(){
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
				loadViewHelper ( 'Company/edit_a_job', $data );
			}else{
				redirect ( EMP_JOBS_PATH );
			}
			
			
		}
	}
}


