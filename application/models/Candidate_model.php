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
class Candidate_model extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}
	public function getEducationDetails($userId){
		$query = $this->db->get_where(TBL_CANDIDATE_EDICATOIN_DETAILS, array('ced_user_id' =>$userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	public function getJobDetails($userId){
		$query = $this->db->get_where(TBL_CANDIDATE_JOB_DETAILS, array('cjd_user_id' =>$userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	public function getProfileDetails($userId){
		$query = $this->db->get_where(TBL_CANDIDATE_PROFILE_DETAILS, array('cpd_user_id' =>$userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	public function getSkillsDetails($userId){
		$query = $this->db->get_where(TBL_CANDIDATE_SKILL_SET, array('css_user_id' =>$userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function getWorkExpDetails($userId){
		$query = $this->db->get_where(TBL_CANDIDATE_WORK_EXP, array('cwe_user_id' =>$userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function updateProfileData($profileData){
		$profileObj = array(
		   'cpd_dob' => $profileData['userDob'],
		   'cpd_state_id'=>$profileData['userState'],
		   'cpd_city_id' => $profileData['userCity'] ,
		   'cpd_zip' => $profileData['userZip'],
		   'cpd_linkedin_url'=>$profileData['userLnUrl'],
		   'cpd_twitter_url'=>$profileData['userTwUrl'],
		   'cpd_facebook_url'=>$profileData['userFbUrl'],
		   'cpd_personal_web_url'=>$profileData['userSlUrl'],
		   'cpd_user_avatar'=>$profileData['upload_file'],
		   'cpd_resume_path'=>$profileData['resume_path'],
		   'cpd_resume_title'=>$profileData['resume_cover_title'],
		   'cpd_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		);
		$this->db->where('cpd_user_id', $this->session->userdata['logged_in']['usr_id']);
		$this->db->update ( TBL_CANDIDATE_PROFILE_DETAILS, $profileObj );
	}
	
	public function updateJObData($jobData){
		$jobDataObj = array(
		   'cjd_job_title' => $jobData['userCrntJobTitle'],
		   'cjd_experience_yr'=>$jobData['userJobExprYr'],
		   'cjd_experience_mn'=>$jobData['userJobExprMn'],
		   'cjd_job_type' => $jobData['userJobType'] ,
		   'cjd_relocate' => $jobData['userJobRelocate'],
		   'cjd_current_city'=>$jobData['userJobCity'],
		   'cjd_security_clearence'=>$jobData['userJobSecClr'],
		   'cjd_salary'=>$jobData['userJobSalary'],
		   'cjd_hourly_rate'=>$jobData['userJobHrRate'],
		   'cjd_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		);
		$this->db->where('cjd_user_id', $this->session->userdata['logged_in']['usr_id']);
		$this->db->update (  TBL_CANDIDATE_JOB_DETAILS, $jobDataObj );
	}
	
	public function addSkillsData($skillName,$skillExprYr,$skillExprMn,$skillUsedOn){
		$skillDataObj = array(
		   'css_skill' => $skillName,
		   'css_experience_yr'=>$skillExprYr,
		   'css_experience_mn'=>$skillExprMn,
		   'css_last_used' => $skillUsedOn,
		   'css_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'css_created_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'css_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'css_created_on'=>date("Y-m-d H:i:s")
		   
		);
		$this->db->insert ( TBL_CANDIDATE_SKILL_SET, $skillDataObj);
		$user_id = $this->db->insert_id ();
	}
	
	public function updateSkillsData($skillName,$skillExprYr,$skillExprMn,$skillUsedOn,$skillId){
		$skillDataObj = array(
		   'css_skill' => $skillName,
		   'css_experience_yr'=>$skillExprYr,
		   'css_experience_mn'=>$skillExprMn,
		   'css_last_used' => $skillUsedOn,
		   'css_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'css_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		);
		$this->db->where('css_id', $skillId);
		$this->db->update ( TBL_CANDIDATE_SKILL_SET, $skillDataObj );
	}

	public function addJobsData($wrkTitle,$wrkCompany,$wrkExpFrom,$wrkExpTo){
		$expDataObj = array(
		   'cwe_job_title' => $wrkTitle,
		   'cwe_job_company'=>$wrkCompany,
		   'cwe_job_from_date'=>$wrkExpFrom,
		   'cwe_job_to_date' => $wrkExpTo,
		   'cwe_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'cwe_created_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'cwe_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'cwe_created_on'=>date("Y-m-d H:i:s")
		   
		);
		$this->db->insert ( TBL_CANDIDATE_WORK_EXP, $expDataObj);
		$user_id = $this->db->insert_id ();
	}
	
	public function updateJobsData($wrkTitle,$wrkCompany,$wrkExpFrom,$wrkExpTo,$wrkExpId){
		$expDataObj = array(
		   'cwe_job_title' => $wrkTitle,
		   'cwe_job_company'=>$wrkCompany,
		   'cwe_job_from_date'=>$wrkExpFrom,
		   'cwe_job_to_date' => $wrkExpTo,
		   'cwe_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'cwe_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		);
		$this->db->where('cwe_id', $wrkExpId);
		$this->db->update ( TBL_CANDIDATE_WORK_EXP, $expDataObj );
	}

	public function addEdcData($degree,$splztn,$inst,$state,$city,$passyr,$passPercent){
		$edcDataObj = array(
		   'ced_degree' => $degree,
		   'ced_specializations'=>$splztn,
		   'ced_institute'=>$inst,
		   'ced_state' => $state,
		   'ced_city' => $city,
		   'ced_pass_year' => $passyr,
		   'ced_pass_percentage' => $passPercent,		   
		   'ced_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'ced_created_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'ced_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		   'ced_created_on'=>date("Y-m-d H:i:s")
		   
		);
		$this->db->insert ( TBL_CANDIDATE_EDICATOIN_DETAILS, $edcDataObj);
		$user_id = $this->db->insert_id ();
	}
	
	public function updateEdcData($degree,$splztn,$inst,$state,$city,$passyr,$passPercent,$edcId){
		$edcDataObj = array(
		   'ced_degree' => $degree,
		   'ced_specializations'=>$splztn,
		   'ced_institute'=>$inst,
		   'ced_state' => $state,
		   'ced_city' => $city,
		   'ced_pass_year' => $passyr,
		   'ced_pass_percentage' => $passPercent,		   
		   'ced_user_id'=>$this->session->userdata['logged_in']['usr_id'],
		   'ced_modified_by'=>$this->session->userdata['logged_in']['usr_id'],
		);
		$this->db->where('ced_id', $edcId);
		$this->db->update ( TBL_CANDIDATE_EDICATOIN_DETAILS, $edcDataObj );
	}


	
}

?>