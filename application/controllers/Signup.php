<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		parent::__construct ();
		// Load database
		$this->load->library('session');
		$this->load->model ( 'users_model' );
		//$this->load->model ( 'organization_model' );
		//$this->load->model ( 'customers_model' );
		//$this->load->model ( 'base_model' );
		
	}
	public function employer()
	{	
		//$contriesList=$this->users_model->getCountries();
		$statesList=$this->users_model->getAllStates();
		$data=array("states"=>$statesList);
		loadViewHelper ( 'Signup/employer', $data );
	}
	public function candidate(){
		$data=array();
		loadViewHelper ( 'Signup/candidate', $data );
	}
	public function getcitybystate(){
		header ( 'Content-Type: application/json' );
		$cityByState=$this->users_model->getCitieByState($_REQUEST['stateId']);
		if($cityByState > 0){
		echo json_encode ( array (
					'status' => 'success' ,'cityData'=>$cityByState
			) );
		}else{
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'no data found'
			) );
		}
	}
	public function candidatesignup(){
		header ( 'Content-Type: application/json' );
		$checkEmail=$this->users_model->checkEmail($_REQUEST['userEmail']);
		if($checkEmail > 0){
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'This email is already regestered'
			) );
		}else{
		
		$result = $this->users_model->addUser($_REQUEST,'candidate');
		if ($result == 'NULL') {
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Please try after some time'
			) );
		} else {
			echo json_encode ( array (
					'status' => 'success' ,'message'=>"Please check your email"
			) );
		}
		}
	}
	public function employeesignup(){
		
		header ( 'Content-Type: application/json' );
		$checkEmail=$this->users_model->checkEmail($_REQUEST['userEmail']);
		if($checkEmail > 0){
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'This email is already regestered'
			) );
		}else{
		
		$result = $this->users_model->addUser($_REQUEST,'employee');
		if ($result == 'NULL') {
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Please try after some time'
			) );
		} else {
			echo json_encode ( array (
					'status' => 'success' ,'message'=>"Please check your email"
			) );
		}
		}
	}
	public function resetpassword(){
		header ( 'Content-Type: application/json' );
		$checkEmail=$this->users_model->checkEmail($_REQUEST['userEmail']);
		if($checkEmail > 0){
		$result = $this->users_model->resetPaasword($_REQUEST['userEmail']);	
			echo json_encode ( array (
					'status' => 'success' ,'message'=>"Please check your email"
			) );
		}else{
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'This is email is not regestered'
			) );
		}
		
	}
	
	public function userloginauth(){
		header ( 'Content-Type: application/json' );
		$checkEmail=$this->users_model->userEmailPasswordAuth($_REQUEST['userEmail'],$_REQUEST['userPassword']);
		
		if($checkEmail=='invalid credentials'){
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Email or password is not matched'
			) );
			exit();
		}
		if($checkEmail[0]->usr_status=='not-activated'){
			echo json_encode ( array (
					'status' => 'sorry',
					'message'=>'Your account is not authorised, Please check your email'
			) );
			exit();
		}
		if($checkEmail > 0){
				$sess_array = array(
						'usr_id'  => $checkEmail[0]->usr_id,
						'usr_unique_id'  => $checkEmail[0]->usr_unique_id,
						'usr_first_name' => $checkEmail[0]->usr_first_name,
						'usr_last_name'  => $checkEmail[0]->usr_last_name,
						'usr_email'  => $checkEmail[0]->usr_email,
						'usr_role'=>$checkEmail[0]->usr_role,
						'usr_mobile'=>$checkEmail[0]->usr_mobile,
						'usr_created_on'=>$checkEmail[0]->usr_created_on,
						'usr_is_active'  => $checkEmail[0]->usr_is_active,
						'usr_status'=>$checkEmail[0]->usr_status
				);
				$updateLogdata = $this->users_model->trackLoginData($sess_array['usr_unique_id'],'login');
				
				
				if($sess_array['usr_role']=='candidate'){
					
					// set candidate role
				}if($sess_array['usr_role']=='employee'){
					$comapnyLogdata = $this->users_model->getEmpCompanyData($sess_array['usr_id']);
					$sess_array['company_data']=$comapnyLogdata[0];	
					$companyCity = $this->users_model->getStateCityById($comapnyLogdata[0]->cmp_city_id);
					$sess_array['company_data']->city_name=$companyCity[0]->cty_city_name;
					$sess_array['company_data']->state_name=$companyCity[0]->stt_state_name;
				}
				// Add user data in session
				$this->session->set_userdata('logged_in',$sess_array);
				//redirect(ADMIN_SITEURL.'/dashboard');
				
			
			echo json_encode ( array (
					'status' => 'success' ,'message'=>"redirect to dashboard",
					'location'=>ADMIN_SITEURL.'/dashboard'
			) );
		}
		
	}
	public function logout(){
	if(!isset($this->session->userdata['logged_in']['usr_id'])){
		$data['message_display'] = 'Successfully Logout';
		loadViewHelper ( 'CMS/home', $data );
	}else{	
		$sess_array = array('username' => '');
		$updateLogdata = $this->users_model->trackLoginData($this->session->userdata['logged_in']['usr_unique_id'],'logout');
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->unset_userdata('default_school_id');
		$data['message_display'] = 'Successfully Logout';
		//loadViewHelper ( 'CMS/home', $data );
		redirect(CMS_HOME_PATH);
	}
		
	}
	public function accountauth(){
		if(!($this->uri->segment ( 3 )) || !$this->uri->segment ( 4 )){
			$returnMessage=array("status"=>"error","message"=>"Invalid params");
			
		}else{
			$authUser=$this->users_model->authUser(base64_decode($this->uri->segment ( 3 )),$this->uri->segment ( 4 ));
			if($authUser=='activated'){
				$returnMessage=array("status"=>"sucess","message"=>"Account verfied successfully");
			}else{
				$returnMessage=array("status"=>"error","message"=>"Your account already verfied");
			}
		}
		
		loadViewHelper ( 'Signup/accountauth', array("status"=>$returnMessage ));
	}
	public function resetauth(){
		if(!($this->uri->segment ( 3 )) || !$this->uri->segment ( 4 )){
			$returnMessage=array("status"=>"error","message"=>"Invalid params");
			
		}else{
			$authUser=$this->users_model->authResetPassword(base64_decode($this->uri->segment ( 3 )),$this->uri->segment ( 4 ));
			if($authUser=='authenticated'){
				$returnMessage=array("status"=>"sucess","message"=>"authenticated  successfully");
			}else{
				$returnMessage=array("status"=>"error","message"=>"Invalid Params");
			}
		}
		
		loadViewHelper ( 'Signup/changepassword', array("status"=>$returnMessage ));
	}
	public function userimgupload(){
		
		$uploaddir =$_REQUEST['imageFor']=='company'?UPLOADS_COMPANY_AVATAR_PATH: UPLOADS_JOBSEEKER_AVATAR_PATH;
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
			if( $_FILES['Filedata']['type']=='image/jpg'|| $_FILES['Filedata']['type']=='image/png'|| $_FILES['Filedata']['type']=='image/jpeg' || $_FILES['Filedata']['type']=='image/gif'){ 
				
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
