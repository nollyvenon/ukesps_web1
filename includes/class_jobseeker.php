<?php
class jobseekerOperation {
    private $user_data;
    
    public function __construct($ifx_account = '', $email = '') {
        if(isset($email) && !empty($email)) {
            $this->user_data = $this->set_user_data($email);
        }
    }
	
	public function authenticate($username = "", $password = "") {
        global $db_handle;
        $username = $db_handle->sanitizePost($username);

        $query = "SELECT password FROM jobseekers WHERE email = '{$username}'  or  username = '{$username}' LIMIT 1";
        
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['password'];
			$pwdver=verify($password,$pass_salt);
            if (strlen($username) > 4 and ($pwdver == 1)){
            $query = "SELECT * FROM jobseekers WHERE (seeker_code='" . $username. "' or email='" . $username. "' or username='" . $username. "') LIMIT 1";
            $result = $db_handle->runQuery($query);
            
			  if($db_handle->numOfRows($result) == 1) {
				  $found_user = $db_handle->fetchAssoc($result);
				  return $found_user;
			  } else {
				  return false;
			  }
			}
        } else {
            return false;
        }
    }
	
	public function user_is_active($seeker_code) {
        global $db_handle;
        
        $query = "SELECT status FROM jobseekers WHERE seeker_code = '$seeker_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data[0]['status'] == '1') {
			$lastlogin = time();
			$query = "UPDATE jobseekers SET active='$lastlogin' WHERE seeker_code = '$seeker_code'";
			$db_handle->runQuery($query);
            return true;
			
        } else {
            return false;
        }
    }
	
	 public function get_user_by_code($seeker_code) {
        global $db_handle;

        $query = "SELECT * FROM jobseekers WHERE seeker_code = '$seeker_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        if($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }	
	
	public function new_user($last_name=NULL, $middle_name=NULL, $first_name=NULL, $gender=NULL, $email=NULL, $phone=NULL, $password=NULL, $country=NULL, $source=NULL, $mailing_address=NULL, $mailing_address2=NULL, $billing_city=NULL, $billing_state=NULL) {
		
		$system_object = new SystemObject();
        global $db_handle;
        
        // Check whether the email is existing
        $query = "SELECT seeker_code FROM jobseekers WHERE email = '$email' LIMIT 1";
        $result = $db_handle->runQuery($query);
		$full_name = $first_name.' '.$middle_name.' '.$last_name;
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            $seeker_code = $fetched_data[0]['seeker_code'];
           
        } else {
			//$password = rand_string(7);
			$pass_salt = generateHash($password);
			
			seekercode:
			$seeker_code = rand_string(11);
            if($db_handle->numRows("SELECT seeker_code FROM jobseekers WHERE seeker_code = '$seeker_code'") > 0) { goto seekercode; };

			$query = "INSERT INTO jobseekers (seeker_code, email, phone, first_name, middle_name, last_name, password, gender, mailing_address, country, source, mailing_address2, city, state) VALUES ('$seeker_code', '$email', '$phone', '$first_name', '$middle_name', '$last_name', '$pass_salt', '$gender', '$mailing_address', '$country', '$source', '$mailing_address2', '$billing_city', '$billing_state')";
			 $db_handle->runQuery($query);
        // Send activation link to email
        $subject = "Welcome to UKESPS";
        $body = "
Dear " . $first_name . "

Congratulation ! 
You are now a member of UKESPS Network

Hi $username,
Thank You for your interest in this program.
Below is you account information :
Email: $email
Password: $password (please change after login)
Login: https://ukesps.com/job_panel/login

What is my next step?

i - Login to your account using the username and password.
ii - If you haven't provided help already, do so by clicking the Provide Help Menu
iii - Ensure to always check from time to time. You could be merged to provide help anytime
iv.  Always observe notifications on the dashboard.


Best Regards,
UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $email, $full_name);	
	/*	$headers = array("From: info@ukesps.com",
    "Reply-To: support@ukesps.com",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);*/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ". $from. "\r\n";
$headers .= "Reply-To: ". $from. "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "X-Priority: 1" . "\r\n"; 

$my_mail = "info@ukesps.com";
$my_replyto = "info@ukesps.com";


	mail_attachment($my_file, $my_path, $email, $my_mail, $my_name, $my_replyto, $subject, $body);
	//	mail($email, $subject, $body, $headers);
		
        }
           
        return "An email was sent to $email containing your password and registration information. It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, Email: $email <br> Password: $password. <br> To login, <a href='login'>Click here</a>.<br>Regards.";
    }
	
	public function forgot_password($email) {

        global $db_handle;
		$gen_pass = rand_string(7);
		$pass_salt = generateHash($gen_pass);
		
	    $query = "UPDATE jobseekers set password = '$pass_salt' where email = '$email'";
        $db_handle->runQuery($query);
		
		$to=$email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: UKESPS Admin <no-reply@ukesps.com>' . "\r\n";
$subject="Password Request";
$message.="This is your new password : <b> $gen_pass </b><br><br>";
mail($to,$subject,$message,$headers);

        return "Your password is $gen_pass. Your password has been sent to your registered email. Please check your junk or spam folder if you do not find in your inbox.";
	}


	public function application_detail($application_id=NULL, $email=NULL, $first_name=NULL, $last_name=NULL, $applicant_code=NULL) {
		global $db_handle;
		
		$con = (!empty($application_id) && ($application_id != 'NULL'))?" WHERE appl.appl_id = '$application_id' ": "";
    	if (!empty($con)){
			$con .= !empty($email)?" AND us.email = '$email' ":"";
		}else{
        	$con .= !empty($email) && ($email != 'NULL')?" WHERE us.email = '$email' ":"";
		}
		if (!empty($con)){
			$con .= !empty($first_name)?" AND us.first_name = '$first_name' ":"";
		}else{
        	$con .= !empty($first_name) && ($first_name != 'NULL')?" WHERE us.first_name = '$first_name' ":"";
		}
		if (!empty($con)){
			$con .= !empty($last_name)?" AND us.last_name = '$last_name' ":"";
		}else{
        	$con .= !empty($last_name) && ($last_name != 'NULL')?" WHERE us.last_name = '$last_name' ":"";
		}
		if (!empty($con)){
			$con .= !empty($applicant_code)?" AND us.applicant_code = '$applicant_code' ":"";
		}else{
        	$con .= !empty($applicant_code) && ($applicant_code != 'NULL')?" WHERE appl.applicant_code = '$applicant_code' ":"";
		}
        
		if (!empty($limit)){
			$con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
		}else{
			$con .= "ORDER BY appl.appl_id DESC";	
		}
		$query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.first_name AS first_name, us.email AS appl_email, jbs.job_title, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, co.country_name AS appl_country FROM applications appl 
		INNER JOIN countries co ON us.country=co.country_id 
		INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
		INNER JOIN users us ON appl.applicant_code=us.user_code
		INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
		INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory $con";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
	}
	
	public function past_applied_jobs($applicant_code=NULL, $recruiter_code=NULL, $jobs_id=NULL) {
		global $db_handle;
		
		$con = (!empty($applicant_code) && ($applicant_code != 'NULL'))?" WHERE appl.applicant_code = '$applicant_code' ": "";
    	if (!empty($con)){
			$con .= !empty($recruiter_code)?" AND us.email = '$recruiter_code' ":"";
		}else{
        	$con .= !empty($recruiter_code) && ($recruiter_code != 'NULL')?" WHERE us.recruiter_code = '$recruiter_code' ":"";
		}
		if (!empty($con)){
			$con .= !empty($jobs_id)?" AND jbs.jobs_id = '$jobs_id' ":"";
		}else{
        	$con .= !empty($jobs_id) && ($jobs_id != 'NULL')?" WHERE jbs.jobs_id = '$jobs_id' ":"";
		}
        
		if (!empty($limit)){
			$con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
		}else{
			$con .= "ORDER BY appl.appl_id DESC";	
		}
		$query = "SELECT jbs.job_title, jbs.descript, jbs.job_img, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, jbs.descript, co.country_name AS appl_country FROM applications appl 
		INNER JOIN countries co ON us.country=co.country_id 
		INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
		INNER JOIN users us ON appl.applicant_code=us.user_code
		INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
		INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory $con";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
	}
	
	public function past_applied_jobs_query($applicant_code=NULL, $recruiter_code=NULL, $jobs_id=NULL) {
		global $db_handle;
		
		$con = (!empty($applicant_code) && ($applicant_code != 'NULL'))?" WHERE appl.applicant_code = '$applicant_code' ": "";
    	if (!empty($con)){
			$con .= !empty($recruiter_code)?" AND us.email = '$recruiter_code' ":"";
		}else{
        	$con .= !empty($recruiter_code) && ($recruiter_code != 'NULL')?" WHERE appl.recruiter_code = '$recruiter_code' ":"";
		}
		if (!empty($con)){
			$con .= !empty($jobs_id)?" AND jbs.jobs_id = '$jobs_id' ":"";
		}else{
        	$con .= !empty($jobs_id) && ($jobs_id != 'NULL')?" WHERE jbs.jobs_id = '$jobs_id' ":"";
		}
        
		$con .= "ORDER BY appl.appl_id DESC ";	
		$query = "SELECT jbs.job_title, jbs.descript, jbs.job_img, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, jbs.descript, co.country_name AS appl_country FROM applications appl 
		INNER JOIN countries co ON us.country=co.country_id 
		INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
		INNER JOIN users us ON appl.applicant_code=us.user_code
		INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
		INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory $con";
		
		return $query;
	}
	
	public function applicant_detail($applicant_code=NULL, $email=NULL, $first_name=NULL, $last_name=NULL) {
		global $db_handle;
		
		$con = (!empty($applicant_code) && ($applicant_code != 'NULL'))?" WHERE appld.applicant_code = '$applicant_code' ": " ";
    	if (!empty($con)){
			$con .= !empty($email)?" AND us.email = '$email' ":"";
		}else{
        	$con .= !empty($email) && ($email != 'NULL')?" WHERE us.email = '$email' ":" ";
		}
		if (!empty($con)){
			$con .= !empty($first_name)?" AND us.first_name = '$first_name' ":"";
		}else{
        	$con .= !empty($first_name) && ($first_name != 'NULL')?" WHERE us.first_name = '$first_name' ":" ";
		}
		if (!empty($con)){
			$con .= !empty($last_name)?" AND us.last_name = '$last_name' ":"";
		}else{
        	$con .= !empty($last_name) && ($last_name != 'NULL')?" WHERE us.last_name = '$last_name' ":" ";
		}
        
		if (!empty($limit)){
			$con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
		}else{
			$con .= "ORDER BY appl.appl_id DESC";	
		}
		$query = "SELECT appl.*, appld.* FROM applications appl 
		INNER JOIN applicant_details appld ON appld.applicant_code=appl.applicant_code 
		INNER JOIN jobseekers us ON appl.applicant_code=us.seeker_code $con";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
	}
	
	public function job_detail($job_id, $category_id, $sub_category_id, $jobstype, $joblevel){
		global $db_handle;
		
		if (!empty($con)){
			$con .= !empty($job_id)?" AND jb.jobs_id = '$job_id' ":"";
		}else{
        	$con .= !empty($job_id) && ($job_id != 'NULL')?" WHERE jb.jobs_id = '$job_id' ":"";
		}
		
		if (!empty($con)){
			$con .= !empty($category_id)?" AND jb.job_category = '$category_id' ":"";
		}else{
        	$con .= !empty($category_id) && ($category_id != 'NULL')?" WHERE jb.job_category = '$category_id' ":"";
		}
		if (!empty($con)){
			$con .= !empty($sub_category_id)?" AND jb.job_category = '$sub_category_id' ":"";
		}else{
        	$con .= !empty($sub_category_id) && ($sub_category_id != 'NULL')?" WHERE jb.job_subcategory = '$sub_category_id' ":"";
		}
		
		if (!empty($con)){
			$con .= !empty($jobstype)?" AND jbt.jobtype_name = '$jobstype' ":"";
		}else{
        	$con .= !empty($jobstype) && ($jobstype != 'NULL')?" WHERE jbt.jobtype_name = '$jobstype' ":"";
		}
		if (!empty($con)){
			$con .= !empty($joblevel)?" AND jb.joblevel = '$joblevel' ":"";
		}else{
        	$con .= !empty($joblevel) && ($joblevel != 'NULL')?" WHERE jb.joblevel = '$joblevel' ":"";
		}	
	
		
		$query = "SELECT jb.*, jc.category_name, jsc.sub_category_name, jlo.location_name, co.country_name, jbs.sector_name, jbt.jobtype_name, jbl.joblevel_name, jbc.company_name FROM jobs jb 
	INNER JOIN countries co ON jb.country_id=co.country_id 
	INNER JOIN job_categories jc ON jb.job_category=jc.category_id 
	INNER JOIN job_sub_categories jsc ON jb.job_subcategory=jsc.category_id 
	INNER JOIN job_sectors jbs ON jb.job_sector=jbs.sector_id 
	INNER JOIN job_types jbt ON jb.jobstype=jbt.jobtype_id 
	INNER JOIN job_levels jbl ON jb.joblevel=jbl.joblevel_id 
	INNER JOIN job_companies jbc ON jb.job_company=jbc.company_id 
	INNER JOIN job_locations jlo ON jb.location_id=jlo.location_id $con";
		$result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
		
	}
	
	public function get_job_categories($limit=NULL) {
		global $db_handle; $con = "";
		if (!empty($limit)){
			$con .= "ORDER BY category_name DESC LIMIT $limit";
		}else{
			$con .= "ORDER BY category_name DESC";	
		}
		$query = "SELECT * FROM job_categories $con";
        $result = $db_handle->runQuery($query);
		
		$job_categories = $db_handle->fetchAssoc($result);
		return $job_categories;
		
	}
	
	// public function get_job_sub_categories($limit=NULL) {
	// 	global $db_handle; $con = "";
	// 	if (!empty($limit)){
	// 		$con .= "ORDER BY category_name DESC LIMIT $limit";
	// 	}else{
	// 		$con .= "ORDER BY category_name DESC";	
	// 	}
	// 	$query = "SELECT * FROM job_sub_categories $con";
    //     $result = $db_handle->runQuery($query);
		
	// 	$job_categories = $db_handle->fetchAssoc($result);
	// 	return $job_categories;
		
    // }
    public function get_job_sub_categories($parent_id=NULL, $limit=NULL) {
		global $db_handle;
		if (!empty($parent_id)){
	 		$con .= " WHERE category_parent='$parent_id' ";
	 	}
		if (!empty($limit)){
	 		$con .= "ORDER BY category_name DESC LIMIT $limit ";
	 	}else{
	 		$con .= "ORDER BY category_name DESC ";	
	 	}
		
		$query = "SELECT * FROM job_sub_categories $con";
        $result = $db_handle->runQuery($query);
		
		$job_categories = $db_handle->fetchAssoc($result);
		return $job_categories;
		
	}
	
	public function get_job_reviews_by_jobID($jobID=NULL, $limit=NULL) {
        global $db_handle;

		if(!empty($courseID)){
			$con .= " WHERE jobs_id='$jobID'";	
		}
		if(!empty($limit)){
			$con .= " ORDER BY RAND() DESC LIMIT $limit";	
		}else{
			$con .= " ORDER BY RAND() DESC";	
		}
		$query = "SELECT * FROM job_reviews $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        return $fetched_data;
    }
	
	
	
	public function add_view_job($job_id, $user_id) {
        global $db_handle;
        
        $query = "INSERT INTO viewed_jobs(jobs_id,user_id) VALUES ('$job_id','$user_id')";
        $db_handle->runQuery($query);
        return true;
    }
	
	
	public function add_biodata($user_code, $resume=NULL, $cover_letter=NULL, $place_of_birth=NULL,  $location=NULL,$country_of_residence=NULL, $country_of_nationality=NULL, $languages=NULL, $linked_profile=NULL, $twitter_profile=NULL, $hobbies=NULL, $skills=NULL) {
        global $db_handle;
        
        $query = "INSERT INTO applicant_details(user_code,resume, cover_letter, place_of_birth, location, country_of_residence, country_of_nationality, languages, linked_profile, twitter_profile, hobbies, skills) VALUES ('$user_code', '$resume', '$cover_letter','$place_of_birth', '$location', '$country_of_residence', '$country_of_nationality','$languages', '$linked_profile','$twitter_profile', '$hobbies', '$skills')";
        $db_handle->runQuery($query);
        return true;
    }
	
	public function add_edu_experience($user_code, $edu_institution_1, $education_period_month_from_1, $education_period_month_to_1, $education_period_year_from_1, $education_period_year_to_1, $education_cert_obtained_1, $education_course_studied_1, $education_course_description_1, $edu_institution_2, $education_period_month_from_2, $education_period_month_to_2, $education_period_year_from_2, $education_period_year_to_2, $education_cert_obtained_2, $education_course_studied_2, $education_course_description_2, $edu_institution_3, $education_period_month_from_3, $education_period_month_to_3, $education_period_year_from_3, $education_period_year_to_3, $education_cert_obtained_3, $education_course_studied_3, $education_course_description_3){
		global $db_handle;
        
        $query = "INSERT INTO applicant_details(user_code, edu_institution_1, education_period_month_from_1, education_period_month_to_1, education_period_year_from_1, education_period_year_to_1, education_cert_obtained_1, education_course_studied_1, education_course_description_1, edu_institution_2, education_period_month_from_2, education_period_month_to_2, education_period_year_from_2, education_period_year_to_2, education_cert_obtained_2, education_course_studied_2, education_course_description_2, edu_institution_3, education_period_month_from_3, education_period_month_to_3, education_period_year_from_3, education_period_year_to_3, education_cert_obtained_3, education_course_studied_3, education_course_description_3) VALUES ('$user_code', '$edu_institution_1', '$education_period_month_from_1', '$education_period_month_to_1', '$education_period_year_from_1', '$education_period_year_to_1', '$education_cert_obtained_1', '$education_course_studied_1', '$education_course_description_1', '$edu_institution_2', '$education_period_month_from_2', '$education_period_month_to_2', '$education_period_year_from_2', '$education_period_year_to_2', '$education_cert_obtained_2', '$education_course_studied_2', '$education_course_description_2', '$edu_institution_3', '$education_period_month_from_3', '$education_period_month_to_3', '$education_period_year_from_3', '$education_period_year_to_3', '$education_cert_obtained_3', '$education_course_studied_3', '$education_course_description_3')";
        $db_handle->runQuery($query);
        return true;
	}
	
	public function add_work_experience($user_code, $years_of_experience, $current_work_experience_company_1, $current_work_experience_position_1, $current_work_experience_duties_1, $current_work_experience_highlights_1, $current_work_experience_month_from_1, $current_work_experience_month_to_1, $current_work_experience_year_from_1, $current_work_experience_year_to_1, $current_work_experience_level_1, $current_work_experience_company_2, $current_work_experience_position_2, $current_work_experience_duties_2, $current_work_experience_highlights_2, $current_work_experience_month_from_2, $current_work_experience_month_to_2, $current_work_experience_year_from_2, $current_work_experience_year_to_2, $current_work_experience_level_2, $current_work_experience_company_3, $current_work_experience_position_3, $current_work_experience_duties_3, $current_work_experience_highlights_3, $current_work_experience_month_from_3, $current_work_experience_month_to_3, $current_work_experience_year_from_3, $current_work_experience_year_to_3, $current_work_experience_level_3 ){
		global $db_handle;
        
        $query = "INSERT INTO applicant_details(user_code, years_of_experience, current_work_experience_company_1, current_work_experience_position_1, current_work_experience_duties_1, current_work_experience_highlights_1, current_work_experience_month_from_1, current_work_experience_month_to_1, current_work_experience_year_from_1, current_work_experience_year_to_1, current_work_experience_level_1, previous_work_experience_company_1, previous_work_experience_position_1, previous_work_experience_duties_1, previous_work_experience_highlights_1, previous_work_experience_month_from_1, previous_work_experience_month_to_1, previous_work_experience_year_from_1, previous_work_experience_year_to_1, previous_work_experience_level_1, previous_work_experience_company_2, previous_work_experience_position_2, previous_work_experience_duties_2, previous_work_experience_highlights_2, previous_work_experience_month_from_2, previous_work_experience_month_to_2, previous_work_experience_year_from_2, previous_work_experience_year_to_2, previous_work_experience_level_2) VALUES ('$user_code', '$years_of_experience', '$current_work_experience_company_1', '$current_work_experience_position_1', '$current_work_experience_duties_1', '$current_work_experience_highlights_1', '$current_work_experience_month_from_1', '$current_work_experience_month_to_1', '$current_work_experience_level_1', '$current_work_experience_year_from_2', '$current_work_experience_year_to_2', '$current_work_experience_company_2', '$current_work_experience_position_2', '$current_work_experience_duties_2', '$current_work_experience_highlights_2', '$current_work_experience_month_from_2', '$current_work_experience_month_to_2', '$current_work_experience_year_from_2', '$current_work_experience_year_to_2', '$current_work_experience_level_2', '$current_work_experience_company_3', '$current_work_experience_position_3', '$current_work_experience_duties_3', '$current_work_experience_highlights_3', '$current_work_experience_month_from_3', '$current_work_experience_month_to_3', '$current_work_experience_year_from_3', '$current_work_experience_year_to_3','$current_work_experience_level_3')";
        $db_handle->runQuery($query);
        return true;
	}
	
	public function set_job_prefs($seeker_code, $job_category=NULL, $sub_category_id=NULL) {
        global $db_handle;
        
        $query = "UPDATE jobseekers SET job_category_preference='$job_category', job_subcategory_preference='$sub_category_id' WHERE seeker_code = '$seeker_code'";
        $db_handle->runQuery($query);
        return true;
    }
	
	public function get_user_detail($id) {
        global $db_handle;
        
        $query = "SELECT * FROM jobseekers where seeker_code = '$id' OR id='$id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $desi_det = $fetched_data[0];
        
        return $desi_det;
    }
}
