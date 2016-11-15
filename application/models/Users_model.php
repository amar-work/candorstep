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
class Users_model extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}
	public function checkEmail($email){
		return $query = $this->db->get_where(TBL_USERS, array('usr_email' => $email))->num_rows();
		
	}
	public function addUser($userData,$role){
		$user_uniqueID=gen_uuid(16);
		$usr_login_act_token=gen_uuid(64);
		$usrObj = array(
		   'usr_unique_id' => $user_uniqueID ,
		   'usr_role' => $role ,
		   'usr_first_name' => $userData['userFstName'],
		   'usr_last_name'=>$userData['userLstName'],
		   'usr_email' => $userData['userEmail'] ,
		   'usr_mobile' => $userData['userMobile'],
		   'usr_password'=>md5($userData['userPassword']),
		   'usr_login_act_token'=>$usr_login_act_token,
		   'usr_status'=>'not-activated',
		   'usr_created_on'=>date("Y-m-d H:i:s")
		   
		);
		$this->db->insert ( TBL_USERS, $usrObj );
		$user_id = $this->db->insert_id ();
		
		if($user_id!=null){
			if($role=='employee'){
				$empDetails=array(
							'cmp_user_id'=>$user_id,
							'cmp_company_name'=>$userData['cmpName'],
							'cmp_contact_work'=>$userData['empWork'],
							'cmp_contact_fax'=>$userData['empFax'],
							'cmp_address_one'=>$userData['cmpAddressOne'],
							'cmp_address_two'=>$userData['cmpAddressTwo'],
							'cmp_state_id'=>$userData['empState'],
							'cmp_city_id'=>$userData['empCity'],
							'cmp_zip'=>$userData['empZip'],
							'cmp_logo_image_path'=>$userData['comany_profile_pic'],
							'cmp_video_path'=>null,
							'cmp_created_on'=>date("Y-m-d H:i:s")
							
							);
				
				$this->db->insert ( TBL_EMPLOYEE_COMPANY_DETAILS, $empDetails );
			}else{
				
				$cndDetails=array('cand_user_id'=>$user_id);
				$this->db->insert ( TBL_CANDIDATE_DETAILS, $cndDetails );
				
				/*$cndDetails=array('ced_user_id'=>$user_id,'ced_created_on'=>date("Y-m-d H:i:s"));
				$this->db->insert ( TBL_CANDIDATE_EDICATOIN_DETAILS, $cndDetails );*/
				
				$cndDetails=array('cjd_user_id'=>$user_id,'cjd_created_on'=>date("Y-m-d H:i:s"));
				$this->db->insert ( TBL_CANDIDATE_JOB_DETAILS, $cndDetails );
				
				$cndDetails=array('cpd_user_id'=>$user_id,'cpd_created_on'=>date("Y-m-d H:i:s"));
				$this->db->insert ( TBL_CANDIDATE_PROFILE_DETAILS, $cndDetails );
				
				/*$cndDetails=array('css_user_id'=>$user_id,'css_created_on'=>date("Y-m-d H:i:s"));
				$this->db->insert ( TBL_CANDIDATE_SKILL_SET, $cndDetails );*/
				
				/*$cndDetails=array('cwe_user_id'=>$user_id,'cwe_created_on'=>date("Y-m-d H:i:s"));
				$this->db->insert ( TBL_CANDIDATE_WORK_EXP, $cndDetails );*/
				
				
			}
			$data = array('from'=>'candorstep.info@gmail.com',
					'from_role'=>'Candorstep Admin',
					'send_to'=>$userData['userEmail'],
					'subject'=>'New User Registration-'.ucfirst($role),
					'user_name'=>ucfirst($userData['userLstName'].' '.$userData['userFstName']),
					'action'=>'loginActivation',
					'reference_link'=>'accountauth/'.base64_encode($user_uniqueID).'/'.$usr_login_act_token,
					'message'=>'<br> Welcome to Candorstep. <br/> your new account has been created please click  you  and below are the login details.');
		mailcurl($data);
		return	$user_id;
		}else{
		return null;	
		}
	}
	public function getEmpCompanyData($userId){
		$query = $this->db->get_where(TBL_EMPLOYEE_COMPANY_DETAILS, array('cmp_user_id' => $userId));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function trackLoginData($userId,$action){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		$data = array(
		   'log_user_id' => $userId ,
		   'log_action' => $action ,
		   'log_IP' => $ip
		);
		$this->db->insert(TBL_USERS_LOGIN_LOGS, $data); 
	}
	public function userEmailPasswordAuth($email,$password){
		$this -> db -> select('*');
		$this -> db -> from(TBL_USERS);
		$this -> db -> where('usr_email', $email);
		$this -> db -> where('usr_password', MD5($password));
		$this -> db -> limit(1);
		$this->db->limit(1);
		$query = $this->db->get();
	
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return "invalid credentials";
		}
	}
	public function resetPaasword($userEmail){
		$usr_password_act_token=gen_uuid(64);
		$usrData = array(
			   'usr_password_act_token' => $usr_password_act_token,
			);
			$this->db->where('usr_email', $userEmail);
			$this->db->update(TBL_USERS, $usrData);
		$query = $this->db->get_where(TBL_USERS, array('usr_email' => $userEmail));
		if ($query->num_rows() > 0) {
			$result= $query->result();
		}			
		$data = array('from'=>'candorstep.info@gmail.com',
					'from_role'=>'Candorstep Admin',
					'send_to'=>$userEmail,
					'subject'=>'Password Reset Request',
					'user_name'=>ucfirst($result[0]->usr_last_name.' '.$result[0]->usr_first_name),
					'action'=>'resetPaaswordRequest',
					'reference_link'=>'resetauth/'.base64_encode($result[0]->usr_unique_id).'/'.$usr_password_act_token,
					'message'=>'<br>Forgot your password? Let us help you get back on track.<br/> To reset your password, click on the following button.');
		mailcurl($data);		
	}
	public function authUser($userId,$loginToken){
		
		$this -> db -> select('*');
		$this -> db -> from(TBL_USERS);
		$this -> db -> where('usr_unique_id', $userId);
		$this -> db -> where('usr_login_act_token', $loginToken);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result= $query->result();
			$usrData = array(
			   'usr_login_act_token' => '',
			   'usr_status' => 'activated',
			);
			$this->db->where('usr_unique_id', $userId);
			$this->db->update(TBL_USERS, $usrData); 
			return "activated";
		} else {
			return "invalid params";
		}
		
		//echo  $query = $this->db->get_where(TBL_USERS, array('usr_unique_id' => $userId,'usr_login_act_token'=>$loginToken))->num_rows();
	}
	public function authResetPassword($userId,$paswdToken){
		$this -> db -> select('*');
		$this -> db -> from(TBL_USERS);
		$this -> db -> where('usr_unique_id', $userId);
		$this -> db -> where('usr_password_act_token', $paswdToken);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result= $query->result();
			$usrData = array(
			   'usr_password_act_token' => ''
			);
			$this->db->where('usr_unique_id', $userId);
			$this->db->update(TBL_USERS, $usrData); 
			return "authenticated";
		} else {
			return "invalid params";
		}
	}
	public function getCountries(){
	$query = $this->db->get_where(TBL_COUTRIES, array('cnt_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getAllStates(){
	$query = $this->db->get_where(TBL_USA_STATES, array('stt_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getAllRegions(){
	$query = $this->db->get_where(TBL_USA_REGION, array('reg_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getAllCities(){
	$query = $this->db->order_by('cty_city_name', 'ASC')->group_by('cty_city_name')->get_where(TBL_USA_CITIES, array('cty_is_active' => 1));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	
	public function getCitieByState($sateId){
		$query =$this->db->select('*')
				->where('cty_state_id=', $sateId)
				->distinct('cty_city_name')
				->from(TBL_USA_CITIES)
				->group_by('cty_city_name');
		$query = $this->db->get();		
		//$query = $this->db->get_where(TBL_USA_CITIES, array('cty_state_id' =>$sateId))->distinct('cty_city_name');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
	}
	public function getStateCityById($cityID)
	{
		$query =$this->db->select('city.cty_city_name, state.stt_state_name')
         ->from(TBL_USA_CITIES.' as city')
		 ->where('cty_id=', $cityID)
         ->join(TBL_USA_STATES.' as state', 'state.stt_id = city.cty_state_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return null;
		}
		
	}
}

?>