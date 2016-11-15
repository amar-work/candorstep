<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends My_Controller {

	public function __construct() {

		parent::__construct();
		$this->redirectToLoginPage();
		
		// Load database
		//$this->load->model('dashboard_model');
	}

	public function index()	{
		//echo "<h1>welcome to ".($this->session->userdata['logged_in']['usr_first_name']).' '.($this->session->userdata['logged_in']['usr_last_name'])."</h1>";
		//echo "<a href='".USER_LOGOUT_PATH."'>Logout</a>";
		if($this->session->userdata['logged_in']['usr_role']=='candidate'){
			$data=array();
			loadViewHelper ( 'Dashboard/candidate', $data );	
		}else{
			$data=array();
			loadViewHelper ( 'Dashboard/employer', $data );	
		}
		
		
		
	}
}