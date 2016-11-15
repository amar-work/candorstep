<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct() {

		parent::__construct();
		$this->redirectToLoginPage();
		
		// Load database
		//$this->load->model('dashboard_model');
		$this->load->model('candidate_model');
		$this->load->model('users_model');
	
	}

	public function index()	{
		//echo "<h1>welcome to ".($this->session->userdata['logged_in']['usr_first_name']).' '.($this->session->userdata['logged_in']['usr_last_name'])."</h1>";
		//echo "<a href='".USER_LOGOUT_PATH."'>Logout</a>";
		if($this->session->userdata['logged_in']['usr_role']=='candidate'){
			$educationDetails=$this->candidate_model->getEducationDetails($this->session->userdata['logged_in']['usr_id']);
			$jobDetails=$this->candidate_model->getJobDetails($this->session->userdata['logged_in']['usr_id']);
			$profileDetails=$this->candidate_model->getProfileDetails($this->session->userdata['logged_in']['usr_id']);
			$skillsDetails=$this->candidate_model->getSkillsDetails($this->session->userdata['logged_in']['usr_id']);
			$workExpDetails=$this->candidate_model->getWorkExpDetails($this->session->userdata['logged_in']['usr_id']);
			
			if($profileDetails[0]->cpd_city_id!=NULL){
				$statesList=$this->users_model->getStateCityById($profileDetails[0]->cpd_city_id);
					$profileDetails[0]->cpd_state_name=$statesList[0]->stt_state_name;
					$profileDetails[0]->cpd_city_name=$statesList[0]->cty_city_name;
					
					$profileDetails[0]->cpd_age=date_diff(date_create($profileDetails[0]->cpd_dob), date_create('today'))->y." Yrs [".$profileDetails[0]->cpd_dob."]";
					
					$selectedCityList=$this->users_model->getCitieByState($profileDetails[0]->cpd_state_id);
					
					
			}else{
					$profileDetails[0]->cpd_state_name='';
					$profileDetails[0]->cpd_city_name='';
					$profileDetails[0]->cpd_age='';
					$selectedCityList="";
			}
			//print_r($profileDetails);exit();
			$statesList=$this->users_model->getAllStates();
			$citiesList=$this->users_model->getAllCities();
			$data=array("educationDetails"=>$educationDetails,
						"jobDetails"=>$jobDetails,
						"profileDetails"=>$profileDetails,
						"skillsDetails"=>$skillsDetails,
						"workExpDetails"=>$workExpDetails,
						"statesList"=>$statesList,
						"citiesList"=>$citiesList,
						"selectedCityList"=>$selectedCityList
						);
			loadViewHelper ( 'Dashboard/candidate', $data );	
		}else{
			$data=array();
			loadViewHelper ( 'Dashboard/company', $data );	
		}
		
		
		
	}
}