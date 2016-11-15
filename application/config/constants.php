<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('PROJECT_NAME', '/dev');
define("ADMIN_SITEURL","http://".$_SERVER['SERVER_NAME'].PROJECT_NAME);
define("HOME_URL",ADMIN_SITEURL);
define("ROOT_URL","http://".$_SERVER['SERVER_NAME'].PROJECT_NAME);
define("ADMIN_ROOT_FOLDER",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/application/");
define("ADMIN_HOME_URL",ADMIN_SITEURL);
define("ADMIN_ASSETS_PATH",ROOT_URL."/assets/");
define("ADMIN_IMG_PATH",ROOT_URL."/assets/img/");
define("ADMIN_JS_PATH",ROOT_URL."/assets/js/");
define("ADMIN_CSS_PATH",ROOT_URL."/assets/css/");
define("LIBRARIES_FOLDER",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/application/libraries/");
define("ADMIN_DATATABLE_PATH",ROOT_URL."/assets/plugins/datatables"); 
define("UPLOADS_COMPANY_AVATAR_PATH",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/uploads/company_avatar/");
define("UPLOADS_COMPANY_VIDEO_PATH",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/uploads/comapny_video/");
define("UPLOADS_JOBSEEKER_AVATAR_PATH",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/uploads/jobseeker_avatar/");
define("UPLOADS_JOBSEEKER_RESUME_PATH",$_SERVER['DOCUMENT_ROOT'].PROJECT_NAME."/uploads/jobseeker_resumes/");

define("COMPANY_AVATAR_PATH",ROOT_URL."/uploads/company_avatar/");
define("COMPANY_VIDEO_PATH",ROOT_URL."/uploads/comapny_video/");
define("JOBSEEKER_AVATAR_PATH",ROOT_URL."/uploads/jobseeker_avatar/");
define("JOBSEEKER_RESUME_PATH",ROOT_URL."/uploads/jobseeker_resumes/");


define("CMS_HOME_PATH",ADMIN_SITEURL); 
define("USER_DASHBOARD_PATH",ADMIN_SITEURL."/dashboard"); 
define("CMS_JOBS_PATH",ADMIN_SITEURL."/jobs"); 
define("CMS_ABOUT_US_PATH",ADMIN_SITEURL."/about-us"); 
define("CMS_PLANS_PATH",ADMIN_SITEURL."/plans"); 
define("SIGNUP_CANDIDATE_PATH",ADMIN_SITEURL."/signup/candidate"); 
define("SIGNUP_EMPLOYER_PATH",ADMIN_SITEURL."/signup/employer"); 
define("USER_LOGOUT_PATH",ADMIN_SITEURL."/signup/logout"); 
define("JOB_DETAILS_PATH",ADMIN_SITEURL."/jobs/in_detail"); 

define('EMP_COMPANY_PATH',ADMIN_SITEURL.'/company/');
define('EMP_POST_JOB',ADMIN_SITEURL.'/company/posting');
define('EMP_SEARCH_RESUME',ADMIN_SITEURL.'/company/search-resume');
define('EMP_PROFILE',ADMIN_SITEURL.'/company/profile');
define("EMP_JOBS_PATH",ADMIN_SITEURL.'/company/jobs'); 
define("EMP_VIEW_JOBS_PATH",ADMIN_SITEURL.'/company/viewjob'); 
define("EMP_EDIT_JOBS_PATH",ADMIN_SITEURL.'/company/editjob'); 
define("EMP_SUBSCRIPTION_PATH",ADMIN_SITEURL.'/company/subscriptions'); 
define("EMP_SAVED_RESUMES_PATH",ADMIN_SITEURL.'/company/saved_resumes'); 
define("EMP_APPLICATION_TRACK_PATH",ADMIN_SITEURL.'/company/application_track'); 
define("EMP_SUB_ACCOUNTS_PATH",ADMIN_SITEURL.'/company/jobs'); 
define("EMP_ALERTS_PATH",ADMIN_SITEURL.'/company/alerts'); 
define("EMP_SCREENING_PATH",ADMIN_SITEURL.'/company/jobs'); 
define("EMP_NOTIFICATIONS_PATH",ADMIN_SITEURL.'/company/jobs'); 
define("EMP_MESSAGNING_PATH",ADMIN_SITEURL.'/company/jobs'); 




define('CAND_SEARCH_JOB',ADMIN_SITEURL.'/search-job');
define('CAND_UPDATE_RESUME',ADMIN_SITEURL.'/dashboard');
define('CAND_PROFILE',ADMIN_SITEURL.'/dashboard');
define('CAND_EDIT_PROFILE',ADMIN_SITEURL.'/candidate/edit');
define('CAND_VIEW_PROFILE',ADMIN_SITEURL.'/candidate/edit');
define('CAND_UPDATE_PROFILE',ADMIN_SITEURL.'/candidate/updateprofle');


define("TBL_USERS","tbl_users");
define("TBL_CANDIDATE_DETAILS","tbl_candidate_details");
define("TBL_COUTRIES","tbl_coutries");
define("TBL_USA_STATES","tbl_usa_states");
define("TBL_USA_CITIES","tbl_usa_cities");
define("TBL_EMPLOYEE_COMPANY_DETAILS","tbl_employee_company_details");
define("TBL_USERS_LOGIN_LOGS","tbl_users_login_logs");
define("TBL_JOB_INDUSTRY_TYPES","tbl_job_industry_types");
define("TBL_JOB_FUNCTIONAL_TYPES","tbl_job_functional_types");
define("TBL_JOBS_LIST","tbl_jobs_list");
define("TBL_CANDIDATE_EDICATOIN_DETAILS","tbl_candidate_edicatoin_details");
define("TBL_CANDIDATE_JOB_DETAILS","tbl_candidate_job_details");
define("TBL_CANDIDATE_PROFILE_DETAILS","tbl_candidate_profile_details");
define("TBL_CANDIDATE_SKILL_SET","tbl_candidate_skill_set");
define("TBL_CANDIDATE_WORK_EXP","tbl_candidate_work_exp");
define("TBL_USA_REGION","tbl_usa_region");