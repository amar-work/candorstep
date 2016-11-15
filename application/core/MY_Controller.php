<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	function __construct()
    {

	
        // Call the Model constructor
        parent::__construct();
	
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('email');
	
        $this->load->library('session');
		$this->load->helper('url');
		
		
    }
	
    
	/**
	 * Method to check whether user already logged in to the site,return true is session already exists else false
	 *
	 */
	public function isUserLoggedIn()
	{
		if($this->session->userdata["logged_in"]['username']!= '')
		{
			return true;
		}
		else
		{
			return false;	
		}
	}
	/**
	 * Method to logout the user and redirect to home page
	 *
	 */
	public function logout()
	{
	    //if($this->session->userdata('userName') !='')
	    {
			
	    	$this->session->sess_destroy();
	    	$this->session->set_userdata(array('username' => ''));
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();			
			$this->redirectToLoginPage();
	    }
	}
	
	/**
	 * Method to redirect the user to login page
	 *
	 */
	protected function redirectToHomeOrLoginPage()
	{
		
		if($this->session->userdata['logged_in']['admin_id'] > 0)
		{
			redirect(HOME_URL, 'refresh');
		}
		else
		{
			redirect(ADMIN_SITEURL, 'refresh');
		}
	}
	
	protected function redirectToHomePage()
	{
		if($this->session->userdata['logged_in']['admin_id'] > 0)
		{
			redirect(HOME_URL, 'refresh');
		}
		
	}
	protected function redirectToLoginPage()
	{
		if(!isset($this->session->userdata['logged_in']))
		{
			redirect(ADMIN_SITEURL, 'refresh');
		}
	
	}
	
	/**
	 * Method to redirect the loggedin user name
	 *
	 */
	public function getLoggedInUserName()
	{
		return $this->session->userdata['logged_in']['username'];
	}
	/**
	 * Method to log the exception
	 *
	 */
	protected function logExceptionMessage($exception)
	{
		$errorMessage = 'Exception of type \'' . get_class($exception) . 
					'\' occurred with message: ' . $exception->getMessage() . 
					' in file ' . $exception->getFile() . 
					' at line ' . $exception->getLine();
					
					// Add backtrace:					
					$errorMessage .= "\r\n Backtrace: \r\n";
					$errorMessage .= $exception->getTraceAsString();
					log_message('error',$errorMessage,TRUE);
	}
	
	/**
	 * Method to get the request token
	 *
	 * @return (string) request token
	 */
	public function getToken()
	{
	  try
	  {
		  $token = md5(uniqid(rand(),true));	  
		  $this->session->set_userdata('csrf_test_name',$token);	  
		  return $token;
	  }
	  catch (Exception $exception ) 
	  {
		 $this->logExceptionMessage ($exception);
	  }
	}
	/**
	 * Method to validate the user request to avoid the csrf,returns true if valid user else false
	 *
	 * @return (bool) true/false
	 */
	public function isValidRequest()
	{
		//varDumpDie($this->session->userdata('csrf_test_name').'>>>>>>'.$this->input->post('csrf_test_name'));
		try
		{
			 if(trim($this->input->post('csrf_test_name')) == $this->session->userdata('csrf_test_name'))
			 {
				return true;
			 }
			 return false;
		}
	  catch (Exception $exception ) 
	  {
		 $this->logExceptionMessage ($exception);
	  }
	}
	
	
	
}

