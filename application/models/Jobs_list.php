<?php
/**
 * This class contains the information about User actions performed in the application
 *
 *
 *
 * @copyright
 * @license
 * @version
 * @link
 * @since
 */
class Jobs_list extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}
	public function getAllIndustryTypes(){
		$query = $this->db->order_by('int_Industry_type', 'ASC')->get_where(TBL_JOB_INDUSTRY_TYPES, array('int_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function getAllIFunctionalTypes(){
		$query = $this->db->order_by('fnt_functional_type', 'ASC')->get_where(TBL_JOB_FUNCTIONAL_TYPES, array('fnt_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	public function getAllJobsByCompany($cmpId){
		$query = $this->db->order_by('job_created_by', 'ASC')->get_where(TBL_JOBS_LIST, array('job_is_active' => 1,'job_company_id'=>$cmpId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function createNewJob($jobData){
		$job_uuid=gen_uuid(64);
		$job_reference_id= $this->generateUserId($this->session->userdata['logged_in']['company_data']->cmp_company_name,10);
		if($jobData['jobApplicationType']=='by-email'){
			$jobByEmailTo=$jobData['jobByEmailTo'];
			$jobByEmailCC=$jobData['jobByEmailCC'];
			$jobByEmailCompanyURL='';
		}else{
			$jobByEmailCompanyURL=$jobData['jobByEmailCompanyURL'];
			$jobByEmailTo=null;
			$jobByEmailCC=null;
		}	
		$usrObj = array(
		   'job_uuid' => $job_uuid ,
		   'job_reference_id'=>$job_reference_id,
		   'job_company_id'=>$this->session->userdata['logged_in']['company_data']->cmp_id,
		   'job_company_user_id' => $this->session->userdata['logged_in']['usr_id'],
		   'job_title' => $jobData['jobTitle'],
		   'job_key_skills'=>$jobData['jobKeySkills'],
		   'job_description' => $jobData['jobDesc'] ,
		   'job_application_type' => $jobData['jobApplicationType'],
		   'job_emp_type'=>$jobData['jobEmpType'],
		   'job_application_by_email_to' => $jobByEmailTo ,
		   'job_application_by_email_cc' => $jobByEmailCC,
		   'job_application_web_url'=>$jobByEmailCompanyURL,
		   'job_salary' => $jobData['jobSalary'] ,
		   'job_salary_per' => $jobData['jobSalaryPer'] ,
		   'job_industry' => $jobData['jobIndustry'] ,
		   'job_type' => $jobData['jobFunctional'] ,
		   'job_work_exp_type' => $jobData['jobExpType'] ,
		   'job_role' => $jobData['jobRole'] ,
		   'job_qualification' => $jobData['jobEducationalQlc'] ,
		   'job_min_experience' => $jobData['jobMinExp'] ,
		   'job_max_experience' => $jobData['jobMaxExp'] ,
		   'job_location_state' => $jobData['empState'] ,
		   'job_location_city' => $jobData['empCity'] ,
		   'job_location_zip' => $jobData['empZip'] ,
		   'job_contact_person' => $jobData['jobContactPerson'] ,
		   'job_contact_email' => $jobData['jobContactpersoneEmail'] ,
		   'job_contact_phone' => $jobData['jobConactPersonPhone'] ,
		   'job_reference_url' => $jobData['jobCompanyWebsite'] ,
		   'job_created_by' => $this->session->userdata['logged_in']['usr_id'] ,
		   'job_created_on'=>date("Y-m-d H:i:s")
		   
		);
		$this->db->insert ( TBL_JOBS_LIST, $usrObj );
		$job_id = $this->db->insert_id ();
		
		if($job_id!=null){
			return	$job_id;
		}else{
			return null;	
		}
	}
	public function generateUserId($string,$requiredLength){
		$string = str_replace(' ', '', $string); 
		$userrName=preg_replace('/[^A-Za-z0-9\-]/', '', $string);
		$userrNameLength=strlen($userrName);
		if($userrNameLength < 5){
			$timeLength=$requiredLength-$userrNameLength;
			$nameLegth=$userrNameLength;
		}else{
			$timeLength=5;
			$nameLegth=5;
		}
		return $userId=substr(strtolower($userrName),0,$nameLegth).'-'.date("YmdHis");	
	}
	
	public function checkJobBYCompany($jobId,$cmpId){
		
		$query = $this->db->get_where(TBL_JOBS_LIST, array('job_is_active' => 1,'job_company_id'=>$cmpId,'job_uuid'=>$jobId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getIndustryNameByID($Id){
		
		$query = $this->db->get_where(TBL_JOB_INDUSTRY_TYPES, array('int_id' =>$Id));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getFunctionalityNameByID($Id){
		
		$query = $this->db->get_where(TBL_JOB_FUNCTIONAL_TYPES, array('fnt_id' =>$Id));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getJobDetails($jobId){
		
		$query = $this->db->get_where(TBL_JOBS_LIST, array('job_is_active' => 1,'job_uuid'=>$jobId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getCompanyDetailsById($compId){
		
		$query = $this->db->get_where(TBL_EMPLOYEE_COMPANY_DETAILS, array('cmp_id' =>$compId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getJobsByLokingFor($searchString,$city,$industry,$functionality,$contract,$experince,$permit,$dateFrom,$dateTo,$salaryFrom,$salaryTo){
		$query=$this->db->select('jls.*,cmp.cmp_company_name,cmp.cmp_website,cmp.cmp_logo_image_path,stt.stt_state_name,cty.cty_city_name')
						->from(TBL_JOBS_LIST." jls")
						->where("job_title like '%$searchString%' 
								or job_description like '%$searchString%'  
								or job_key_skills like '%$searchString%' 
								or job_role like '%$searchString%' ")
						->where("job_is_active = 1 ")
						->where("cty.cty_city_name like '%$city%' ")
						->order_by('job_created_by', 'DESC')
						->join(TBL_EMPLOYEE_COMPANY_DETAILS.' cmp', 'cmp.cmp_id = jls.job_company_id', 'left')
						->join(TBL_USA_STATES.' stt', 'stt.stt_id = jls.job_location_state', 'left')
						->join(TBL_USA_CITIES.' cty', 'cty.cty_id = jls.job_location_city', 'left')
						->get();
		//echo "<pre>";var_dump( $this->db );echo "<pre/>";
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	
	public function getAllJobs(){
		$query=$this->db->select('jls.*,cmp.cmp_company_name,cmp.cmp_website,cmp.cmp_logo_image_path,stt.stt_state_name,cty.cty_city_name')
						->from(TBL_JOBS_LIST." jls")
						->where("job_is_active = 1 ")
						->order_by('job_created_by', 'DESC')
						->join(TBL_EMPLOYEE_COMPANY_DETAILS.' cmp', 'cmp.cmp_id = jls.job_company_id', 'left')
						->join(TBL_USA_STATES.' stt', 'stt.stt_id = jls.job_location_state', 'left')
						->join(TBL_USA_CITIES.' cty', 'cty.cty_id = jls.job_location_city', 'left')
						->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
}

?>