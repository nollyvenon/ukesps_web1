<?php
class clientOperation
{
	private $user_data;

	public function __construct($ifx_account = '', $email = '')
	{
		if (isset($email) && !empty($email)) {
			$this->user_data = $this->set_user_data($email);
		}
	}

	public function application_detail($application_id = NULL, $email = NULL, $first_name = NULL, $last_name = NULL, $applicant_code = NULL)
	{
		global $db_handle;

		$con = (!empty($application_id) && ($application_id != 'NULL')) ? " WHERE appl.appl_id = '$application_id' " : "";
		if (!empty($con)) {
			$con .= !empty($email) ? " AND us.email = '$email' " : "";
		} else {
			$con .= !empty($email) && ($email != 'NULL') ? " WHERE us.email = '$email' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($first_name) ? " AND us.first_name = '$first_name' " : "";
		} else {
			$con .= !empty($first_name) && ($first_name != 'NULL') ? " WHERE us.first_name = '$first_name' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($last_name) ? " AND us.last_name = '$last_name' " : "";
		} else {
			$con .= !empty($last_name) && ($last_name != 'NULL') ? " WHERE us.last_name = '$last_name' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($applicant_code) ? " AND us.applicant_code = '$applicant_code' " : "";
		} else {
			$con .= !empty($applicant_code) && ($applicant_code != 'NULL') ? " WHERE appl.applicant_code = '$applicant_code' " : "";
		}

		if (!empty($limit)) {
			$con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
		} else {
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

	public function past_applied_jobs($applicant_code = NULL, $recruiter_code = NULL, $jobs_id = NULL)
	{
		global $db_handle;

		$con = (!empty($applicant_code) && ($applicant_code != 'NULL')) ? " WHERE appl.applicant_code = '$applicant_code' " : "";
		if (!empty($con)) {
			$con .= !empty($recruiter_code) ? " AND us.email = '$recruiter_code' " : "";
		} else {
			$con .= !empty($recruiter_code) && ($recruiter_code != 'NULL') ? " WHERE us.recruiter_code = '$recruiter_code' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($jobs_id) ? " AND jbs.jobs_id = '$jobs_id' " : "";
		} else {
			$con .= !empty($jobs_id) && ($jobs_id != 'NULL') ? " WHERE jbs.jobs_id = '$jobs_id' " : "";
		}

		if (!empty($limit)) {
			$con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
		} else {
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

	public function past_applied_jobs_query($applicant_code = NULL, $recruiter_code = NULL, $jobs_id = NULL)
	{
		global $db_handle;

		$con = (!empty($applicant_code) && ($applicant_code != 'NULL')) ? " WHERE appl.applicant_code = '$applicant_code' " : "";
		if (!empty($con)) {
			$con .= !empty($recruiter_code) ? " AND us.email = '$recruiter_code' " : "";
		} else {
			$con .= !empty($recruiter_code) && ($recruiter_code != 'NULL') ? " WHERE appl.recruiter_code = '$recruiter_code' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($jobs_id) ? " AND jbs.jobs_id = '$jobs_id' " : "";
		} else {
			$con .= !empty($jobs_id) && ($jobs_id != 'NULL') ? " WHERE jbs.jobs_id = '$jobs_id' " : "";
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

	public function applicant_detail($applicant_code)
	{
		global $db_handle;
		$con = (!empty($applicant_code) && ($applicant_code != 'NULL')) ? " WHERE us.user_code = '$applicant_code' " : " ";
		$query = "SELECT us.*, appld.* FROM users us
		INNER JOIN student_applicant_details appld ON appld.applicant_code=us.user_code 
		-- INNER JOIN applications appl ON appl.applicant_code=us.user_code 
		$con";

		$result = $db_handle->runQuery($query);
		$content = $db_handle->fetchAssoc($result);

		return $content;
	}

	public function job_detail($job_id, $category_id, $sub_category_id, $jobstype, $joblevel)
	{
		global $db_handle;

		if (!empty($con)) {
			$con .= !empty($job_id) ? " AND jb.jobs_id = '$job_id' " : "";
		} else {
			$con .= !empty($job_id) && ($job_id != 'NULL') ? " WHERE jb.jobs_id = '$job_id' " : "";
		}

		if (!empty($con)) {
			$con .= !empty($category_id) ? " AND jb.job_category = '$category_id' " : "";
		} else {
			$con .= !empty($category_id) && ($category_id != 'NULL') ? " WHERE jb.job_category = '$category_id' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($sub_category_id) ? " AND jb.job_category = '$sub_category_id' " : "";
		} else {
			$con .= !empty($sub_category_id) && ($sub_category_id != 'NULL') ? " WHERE jb.job_subcategory = '$sub_category_id' " : "";
		}

		if (!empty($con)) {
			$con .= !empty($jobstype) ? " AND jbt.jobtype_name = '$jobstype' " : "";
		} else {
			$con .= !empty($jobstype) && ($jobstype != 'NULL') ? " WHERE jbt.jobtype_name = '$jobstype' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($joblevel) ? " AND jb.joblevel = '$joblevel' " : "";
		} else {
			$con .= !empty($joblevel) && ($joblevel != 'NULL') ? " WHERE jb.joblevel = '$joblevel' " : "";
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

		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data[0];
		} else {
			return false;
		}
	}

	public function upload_cv($applicant_code, $resume = NULL, $cover_letter = NULL)
	{
		global $db_handle;

		if (isset($resume)) {
			$query = "UPDATE applicant_details SET resume='$resume' WHERE applicant_code = '$applicant_code'";
			$db_handle->runQuery($query);
		}
		if (isset($cover_letter)) {
			$query = "UPDATE applicant_details SET cover_letter='$cover_letter' WHERE applicant_code = '$applicant_code'";
			$db_handle->runQuery($query);
		}
		return true;
	}
	public function add_biodata($user_code, $place_of_birth = NULL,  $location = NULL, $country_of_residence = NULL, $country_of_nationality = NULL, $languages = NULL, $linkedin_profile = NULL, $twitter_profile = NULL, $hobbies = NULL, $skills = NULL)
	{
		global $db_handle;

		$query = "INSERT INTO student_applicant_details(applicant_code, place_of_birth, location, country_of_residence, country_of_nationality, languages, linkedin_profile, twitter_profile, hobbies, skills) VALUES ('$user_code','$place_of_birth', '$location', '$country_of_residence', '$country_of_nationality','$languages', '$linkedin_profile','$twitter_profile', '$hobbies', '$skills')";
		$db_handle->runQuery($query);
		return true;
	}
	public function update_biodata($user_code, $place_of_birth = NULL,  $location = NULL, $country_of_residence = NULL, $country_of_nationality = NULL, $languages = NULL, $linkedin_profile = NULL, $twitter_profile = NULL, $hobbies = NULL, $skills = NULL)
	{
		global $db_handle;

		$query = "UPDATE student_applicant_details SET  place_of_birth='$place_of_birth', location='$location', country_of_residence='$country_of_residence', country_of_nationality='$country_of_nationality', languages='$languages', linkedin_profile='$linkedin_profile', twitter_profile='$twitter_profile', hobbies='$hobbies', skills='$skills' WHERE applicant_code = '$user_code'";
		$db_handle->runQuery($query);
		return true;
	}

	public function add_edu_experience($applicant_code, $edu_institution_1, $education_period_month_from_1, $education_period_month_to_1, $education_period_year_from_1, $education_period_year_to_1, $education_cert_obtained_1, $education_course_studied_1, $education_course_description_1, $edu_institution_2, $education_period_month_from_2, $education_period_month_to_2, $education_period_year_from_2, $education_period_year_to_2, $education_cert_obtained_2, $education_course_studied_2, $education_course_description_2, $edu_institution_3, $education_period_month_from_3, $education_period_month_to_3, $education_period_year_from_3, $education_period_year_to_3, $education_cert_obtained_3, $education_course_studied_3, $education_course_description_3)
	{
		global $db_handle;

		$query = "UPDATE student_applicant_details SET edu_institution_1='$edu_institution_1', education_period_month_from_1='$education_period_month_from_1', education_period_month_to_1='$education_period_month_to_1', education_period_year_from_1='$education_period_year_from_1', education_period_year_to_1='$education_period_year_to_1', education_cert_obtained_1='$education_cert_obtained_1', education_course_studied_1='$education_course_studied_1', education_course_description_1='$education_course_description_1', edu_institution_2='$edu_institution_2', education_period_month_from_2='$education_period_month_from_2', education_period_month_to_2='$education_period_month_to_2', education_period_year_from_2='$education_period_year_from_2', education_period_year_to_2='$education_period_year_to_2', education_cert_obtained_2='$education_cert_obtained_2', education_course_studied_2='$education_course_studied_2', education_course_description_2='$education_course_description_2', edu_institution_3='$edu_institution_3', education_period_month_from_3='$education_period_month_from_3', education_period_month_to_3='$education_period_month_to_3', education_period_year_from_3='$education_period_year_from_3', education_period_year_to_3='$education_period_year_to_3', education_cert_obtained_3='$education_cert_obtained_3', education_course_studied_3='$education_course_studied_3', education_course_description_3='$education_course_description_3' WHERE applicant_code = '$applicant_code'";

		// $query = "INSERT INTO student_applicant_details(applicant_code, edu_institution_1, education_period_month_from_1, education_period_month_to_1, education_period_year_from_1, education_period_year_to_1, education_cert_obtained_1, education_course_studied_1, education_course_description_1, edu_institution_2, education_period_month_from_2, education_period_month_to_2, education_period_year_from_2, education_period_year_to_2, education_cert_obtained_2, education_course_studied_2, education_course_description_2, edu_institution_3, education_period_month_from_3, education_period_month_to_3, education_period_year_from_3, education_period_year_to_3, education_cert_obtained_3, education_course_studied_3, education_course_description_3) VALUES ('$applicant_code', '$edu_institution_1', '$education_period_month_from_1', '$education_period_month_to_1', '$education_period_year_from_1', '$education_period_year_to_1', '$education_cert_obtained_1', '$education_course_studied_1', '$education_course_description_1', '$edu_institution_2', '$education_period_month_from_2', '$education_period_month_to_2', '$education_period_year_from_2', '$education_period_year_to_2', '$education_cert_obtained_2', '$education_course_studied_2', '$education_course_description_2', '$edu_institution_3', '$education_period_month_from_3', '$education_period_month_to_3', '$education_period_year_from_3', '$education_period_year_to_3', '$education_cert_obtained_3', '$education_course_studied_3', '$education_course_description_3')";
		$db_handle->runQuery($query);
		return true;
	}

	public function add_work_experience(
		$applicant_code,
		$years_of_experience,
		$current_work_experience_company_1,
		$current_work_experience_position_1,
		$current_work_experience_duties_1,
		$current_work_experience_highlights_1,
		$current_work_experience_month_from_1,
		$current_work_experience_year_from_1,
		$previous_work_experience_month_from_1,
		$previous_work_experience_month_to_1,
		$previous_work_experience_year_from_1,
		$previous_work_experience_year_to_1,
		$previous_work_experience_company_1,
		$previous_work_experience_position_1,
		$previous_work_experience_duties_1,
		$previous_work_experience_highlights_1
	) {
		global $db_handle;

		$query = "UPDATE student_applicant_details SET years_of_experience='$years_of_experience', current_work_experience_company_1='$current_work_experience_company_1', current_work_experience_position_1='$current_work_experience_position_1', current_work_experience_duties_1='$current_work_experience_duties_1', current_work_experience_highlights_1='$current_work_experience_highlights_1', current_work_experience_month_from_1='$current_work_experience_month_from_1',  current_work_experience_year_from_1='$current_work_experience_year_from_1', previous_work_experience_company_1='$previous_work_experience_company_1', 
		previous_work_experience_month_from_1='$previous_work_experience_month_from_1', previous_work_experience_month_to_1='$previous_work_experience_month_to_1', previous_work_experience_year_from_1='$previous_work_experience_year_from_1', previous_work_experience_year_to_1='$previous_work_experience_year_to_1', previous_work_experience_position_1='$previous_work_experience_position_1', previous_work_experience_duties_1='$previous_work_experience_duties_1', previous_work_experience_highlights_1='$previous_work_experience_highlights_1'
		 WHERE applicant_code = '$applicant_code'";
		return $db_handle->runQuery($query);
		// return true;
	}


	public function apply_now($course_id = NULL, $application_title = NULL, $couprov_code = NULL, $applicant_code = NULL, $mode_of_study = NULL, $study_level = NULL, $duration = NULL, $universities = NULL, $courses = NULL, $student = NULL, $student_id = NULL, $start_date = NULL, $dob = NULL)
	{
		global $db_handle;

		$query = "INSERT INTO course_applications(course_id, application_title, couprov_code, applicant_code, mode_of_study, study_level, duration, universities, courses, student, student_id, start_date, dob) VALUES ('$course_id','$application_title', '$couprov_code', '$applicant_code', '$mode_of_study', '$study_level', '$duration', '$universities', '$courses', '$student', '$student_id', '$start_date', '$dob')";
		return $db_handle->runQuery($query);
	}

	public function set_job_prefs($seeker_code, $job_category = NULL, $sub_category_id = NULL)
	{
		global $db_handle;

		$query = "UPDATE jobseekers SET job_category_preference='$job_category', job_subcategory_preference='$sub_category_id' WHERE seeker_code = '$seeker_code'";
		$db_handle->runQuery($query);
		return true;
	}

	public function add_to_order($total_price = NULL, $total_qty = NULL, $unique = NULL, $user_code = NULL)
	{
		global $db_handle;

		$query = "INSERT INTO course_subscription_orders (uid,  session_id, total_price, total_qty, orderstatus) VALUES
        ('$user_code', '$unique', '$total_price','$total_qty','0')";
		$db_handle->runQuery($query);

		return $db_handle->insertedId();
	}

	public function add_to_cart($course_id = NULL, $amount = NULL, $quantity = NULL, $orderId = NULL, $unique = NULL, $currency = NULL)
	{
		global $db_handle;

		if ($db_handle->numRows("SELECT session_id FROM course_subscription_orderitems WHERE session_id = '$unique' AND  orderid = '$orderId' AND pid = '$course_id' ") > 0) {
			$query = "UPDATE course_subscription_orderitems SET pquantity = '$quantity', productprice = '$amount' WHERE  session_id = '$unique' AND  orderid = '$orderId' AND pid = '$course_id'";
		} else {

			$query = "INSERT INTO course_subscription_orderitems (pid, productprice, pquantity, orderid, session_id, currency) VALUES ('$course_id', '$amount', '$quantity', '$orderId', '$unique', '$currency')";
		}
		$db_handle->runQuery($query);
		return true;
	}

	public function get_cart_info($sid = NULL)
	{
		global $db_handle;

		$query = "SELECT * FROM course_subscription_orders WHERE session_id = '$sid' OR uid='$sid' OR id='$sid'";
		$result = $db_handle->runQuery($query);

		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data[0];
		} else {
			return false;
		}
	}

	public function get_cart_total($sid = NULL)
	{
		global $db_handle;

		$query = "SELECT total_price FROM course_subscription_orders WHERE session_id = '$sid' OR uid='$sid' OR id='$sid'";
		$result = $db_handle->runQuery($query);

		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data[0]['total_price'];
		} else {
			return false;
		}
	}

	public function get_order_items($sid = NULL)
	{
		global $db_handle;

		$query = "SELECT * FROM course_subscription_orderitems WHERE session_id = '$sid' OR orderid = '$sid'";
		$result = $db_handle->runQuery($query);

		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data;
		} else {
			return false;
		}
	}

	public function delete_cart_item($unique = NULL, $sid = NULL)
	{
		global $db_handle;

		$query = "DELETE FROM course_subscription_orderitems WHERE session_id = '$unique' AND pid='$sid' ";
		$db_handle->runQuery($query);
		return 'Cart item was successfully deleted';
	}

	public function is_subscription_plan_valid($user_code = NULL)
	{
		global $db_handle;

		$current_time = date('Y-m-d H:i:s');
		$query = "SELECT * FROM jobseekers WHERE (username='$user_code' OR user_code='$user_code') AND course_valid_until>='$current_time'";
		$result = $db_handle->runQuery($query);

		return $db_handle->numOfRows($result) > 0 ? true : false;
	}

	public function paystack_payment($user_code, $reference = NULL, $trxref = NULL, $status = NULL, $amount = NULL, $email = NULL, $unique_id = NULL, $payment_category = NULL, $currency = NULL)
	{
		$zentaOperation = new zentabooksOperation();
		global $db_handle;
		$query = "INSERT INTO payments SET user_code='" . $user_code . "', OrderID='" . $trxref . "', payer_email='" . $email . "', payment_status='1', payment_amount='" . $amount . "', txn_id='" . $unique_id . "', payment_currency='" . $currency . "', payment_category='$payment_category', gateway='2'";
		$payment = $db_handle->runQuery($query);
		if ($payment_category == '4') { //course subcription
			//get the order item details and update them with the subscription periods
			$query = "SELECT * FROM course_subscription_orderitems WHERE session_id = '$unique_id'";
			$result = $db_handle->runQuery($query);
			$content = $db_handle->fetchAssoc($result);
			if (isset($content) && !empty($content)) {
				foreach ($content as $row) {
					$course_id = $row['pid'];
					$pquantity = $row['pquantity'];
					$course_fee_period = $zentaOperation->get_course_by_id($course_id)['fee_period'];
					$course_valid_until = date('Y-m-d H:i:s', time() + $pquantity * $course_fee_period * 30 * 24 * 60 * 60);

					$query = "UPDATE course_subscription_orders SET orderstatus='1',paymentmode='paystack' where session_id = '$unique_id'";
					$query = "UPDATE course_subscription_orderitems SET course_valid_until='$course_valid_until' where session_id = '$unique_id' AND pid='$course_id'";
					$db_handle->runQuery($query);
				}
			}

			//SEND EMAIL TO COURSE PROVIDER

			//SEND EMAIL TO COURSE SUBCRIBER
		}
		return $payment;
	}

	public function get_all_past_payments($couprov_code = NULL, $orderID = NULL, $payer_email = NULL, $payment_status = NULL, $gateway = NULL, $payment_currency = NULL)
	{
		global $db_handle;

		$con = (!empty($couprov_code) && ($couprov_code != 'NULL')) ? " WHERE couprov_code = '$couprov_code' " : "";
		if (!empty($con)) {
			$con .= !empty($orderID) ? " AND OrderID = '$orderID' " : "";
		} else {
			$con .= !empty($orderID) && ($orderID != 'NULL') ? " WHERE OrderID = '$orderID' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($payer_email) ? " AND payer_email = '$payer_email' " : "";
		} else {
			$con .= !empty($payer_email) && ($payer_email != 'NULL') ? " WHERE payer_email = '$payer_email' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($payment_status) ? " AND payment_status = '$payment_status' " : "";
		} else {
			$con .= !empty($payment_status) ? " WHERE payment_status = '$payment_status' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($gateway) ? " AND gateway = '$gateway' " : "";
		} else {
			$con .= !empty($gateway) ? " WHERE gateway = '$gateway' " : "";
		}
		if (!empty($con)) {
			$con .= !empty($payment_currency) ? " AND payment_currency = '$payment_currency' " : "";
		} else {
			$con .= !empty($payment_currency) ? " WHERE payment_currency = '$payment_currency' " : "";
		}
		if (!empty($limit)) {
			$con .= " ORDER BY id DESC LIMIT $limit";
		} else {
			$con .= " ORDER BY id DESC";
		}
		$query = "SELECT * FROM payments $con";
		$result = $db_handle->runQuery($query);

		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data;
		} else {
			return false;
		}
	}

	public function update_cart_with_user_code($user_code, $unique = NULL, $payment_category = NULL)
	{
		global $db_handle;
		if ($_SESSION['payment_category'] == '4') {
			$query = "UPDATE course_subscription_orders SET uid='$user_code' where session_id='$unique'";
			$db_handle->runQuery($query);
		}
	}

	public function get_user_by_code($user_code)
	{
		global $db_handle;
		$query = "SELECT * FROM users WHERE user_code='$user_code'";
		$result = $db_handle->runQuery($query);
		if ($db_handle->numOfRows($result) > 0) {
			$fetched_data = $db_handle->fetchAssoc($result);
			return $fetched_data;
		} else {
			return false;
		}
	}
}
