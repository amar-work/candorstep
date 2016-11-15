<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {

		parent::__construct();
		
		// Load database
		$this->load->model('jobs_list');
		$this->load->model('users_model');
	} 
	public function index()
	{	
		if (empty($_GET)) {
			$jobsListObj=$this->jobs_list->getAllJobs();	
		}else{
			$searchString= isset($_GET['looking_for']) ? $_GET['looking_for']:"";
			$city=isset($_GET['location']) ? substr($_GET['location'], 0, strpos($_GET['location'], ',')) :"";
			$industry=isset($_GET['industry']) ? $_GET['industry']:"";
			$functionality=isset($_GET['functionality']) ? $_GET['functionality']:"";
			$contract=isset($_GET['contract']) ? $_GET['contract']:"";
			$experince=isset($_GET['experince']) ? $_GET['experince']:"";
			$permit=isset($_GET['permit']) ? $_GET['permit']:"";
			$dateFrom=isset($_GET['dateFrom']) ? $_GET['dateFrom']:"";
			$dateTo=isset($_GET['dateTo']) ? $_GET['dateTo']:"";
			$salaryFrom=isset($_GET['salaryFrom']) ? $_GET['salaryFrom']:"";
			$salaryTo=isset($_GET['salaryTo']) ? $_GET['salaryTo']:"";
			
			$jobsListObj=$this->jobs_list->getJobsByLokingFor($searchString,$city,$industry,$functionality,$contract,$experince,$permit,$dateFrom,$dateTo,$salaryFrom,$salaryTo);
				
		}
		/*echo "<pre>";
		print_r($jobsListObj);
		exit();*/
		//$n=10;
		//$this->output->cache($n);
		$regionsList=$this->users_model->getAllRegions();
		$statesList=$this->users_model->getAllStates();
		$citiesList=$this->users_model->getAllCities();
		$industryList=$this->jobs_list->getAllIndustryTypes();
		$functionalityList=$this->jobs_list->getAllIFunctionalTypes();
		$data=array('industryTypes'=>$industryList,
					'functionalityTypes'=>$functionalityList,
					'regionsList'=>$regionsList,
					'states'=>$statesList,
					'cities'=>$citiesList,
					'jobsListObj'=>$jobsListObj);
		
		loadViewHelper ( 'CMS/jobs', $data );
	}
	public function in_detail(){
		$job_id = $this->uri->segment (3);
		if(!$job_id){
			redirect ( CMS_JOBS_PATH );
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
				
				//$n=10;
				//$this->output->cache($n);
				$data=array('jobDataObj'=>$jobDataObj[0],'companyData'=>$companyData[0]);
				loadViewHelper ( 'CMS/view_a_job', $data );
			}else{
				redirect ( CMS_JOBS_PATH );
			}
			}
	}
	
}
