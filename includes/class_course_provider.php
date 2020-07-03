<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
//require_once(LIB_PATH.DS.'class_database.php');

class CoursProvUser {
    private $user_data;
    
    public function __construct($ifx_account = '', $email = '') {
        if(isset($email) && !empty($email)) {
            $this->user_data = $this->set_user_data($email);
        }
    }
	

    public function authenticate($username = "", $password = "") {
        global $db_handle;
        $username = $db_handle->sanitizePost($username);

        $query = "SELECT pass_salt FROM course_providers WHERE email = '{$username}'  or  username = '{$username}' LIMIT 1";
        
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['pass_salt'];
			$pwdver=verify($password,$pass_salt);
            if (strlen($username) > 4 and ($pwdver == 1)){
            $query = "SELECT couprov_code, email, first_name, last_name, active, status FROM course_providers WHERE (couprov_code='" . $username. "' or email='" . $username. "' or username='" . $username. "') LIMIT 1";
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

    public function course_provider_plan_detail_by_id($plan_id) {
        global $db_handle;
        
        $query = "SELECT * FROM course_provider_plans WHERE plan_id = '$plan_id' ";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }
	
    public function get_all_course_providers() {
        global $db_handle;
        
        $query = "SELECT * FROM course_providers";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
    }
    

    public function get_course_provider_detail($couprov_code = NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM course_providers WHERE username = '$couprov_code' OR couprov_code = '$couprov_code' ";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }
	
    public function update_course_provider_password($username = "", $password = "") {
        global $db_handle;
        
        $query = "SELECT pass_salt FROM course_providers WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $user = $db_handle->fetchAssoc($result);
        $pass_salt = $user[0]['pass_salt'];
        $hashed_password = hash("SHA512", "$pass_salt.$password");
        
        $query = "UPDATE course_providers SET password = '{$hashed_password}' WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_course_provider_name_by_code($couprov_code=NULL) {
        global $db_handle;
        
        $query = "SELECT CONCAT(last_name, ' ', first_name) AS full_name FROM course_providers WHERE couprov_code = '$couprov_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        $full_name = $fetched_data[0]['full_name'];
        return $full_name;
    }
    
    public function get_course_provider_detail_by_code($couprov_code=NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM course_providers WHERE couprov_code = '$couprov_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
        
    }
    
    public function get_privileges($couprov_code=NULL) {
        global $db_handle;
        
        $query = "SELECT allowed_pages FROM course_provider_privilege WHERE couprov_code = '$couprov_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }
    
    // Confirm that the email address is not existing
    public function course_provider_is_duplicate($email=NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM course_providers WHERE email = '$email'";
        $result = $db_handle->numRows($query);
        
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    // Add a new course_providers profile
    public function add_new_course_provider($first_name=NULL, $last_name=NULL, $phone=NULL, $email, $username='', $password=NULL, $billing_company=NULL,$billing_address_1=NULL, $billing_address_2=NULL,$billing_city=NULL, $billing_state=NULL, $billing_country=NULL, $company_name=NULL) {
        global $db_handle;
        global $system_object;
        
        //check whether couprov_code generated by rand_string is already existing
        couprov_code:
        $couprov_code = rand_string(5);
        if($db_handle->numRows("SELECT couprov_code FROM course_providers WHERE couprov_code = '$couprov_code'") > 0) { goto couprov_code; };
    
        //$gen_pass = rand_string(7);
		$pass_salt = generateHash($password);
		
        
        $query = "INSERT INTO course_providers (couprov_code, username, email, pass_salt, password, first_name, last_name, status, phone, billing_company, billing_address_1, billing_address_2, billing_city, billing_state, billing_country, company_name) VALUES ('$couprov_code', '$username', '$email', '$pass_salt', '$password', '$first_name', '$last_name', '1', '$phone', '$billing_company', '$billing_address_1', '$billing_address_2', '$billing_city', '$billing_state', '$billing_country', '$company_name')";
        $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            
            $query = "INSERT INTO course_provider_privilege (couprov_code, allowed_pages) VALUES ('$couprov_code', '')";
            $db_handle->runQuery($query);
            
            //New course_providers succefully inserted, send default password to the course_providers
            $subject = "UKESPS course_providers Login";
            $body = "
Dear " . $first_name . "

A UKESPS course_providers profile has been created for you.

Your  password is $password

Login with the URL below, you can update your password in the
profile settings.

https://ukesps.com/course_providers

Do not share your course_providers credentials with anyone.


UKESPS Support
www.ukesps.com";
            
            $system_object->send_email($subject, $body, $email, $first_name);
                
            
            return "An email was sent to $email containing your password and registration information. It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, Email: $email <br> Password: $password. <br> To login, <a href='login'>Click here</a>.<br>Regards.";
        } else {
            return false;
        }
    }
    
    
    // Update course_providers profile - modify the status
    public function modify_course_provider_profile($couprov_code, $course_provider_status) {
        global $db_handle;
        
        $query = "UPDATE course_providers SET status = '{$course_provider_status}' WHERE couprov_code = '{$couprov_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function modify_course_provider_privilege($couprov_code, $allowed_pages) {
        global $db_handle;
        
        $query = "UPDATE course_provider_privilege SET allowed_pages = '{$allowed_pages}' WHERE couprov_code = '{$couprov_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    

	
	public function delete_course_provider($couprov_code) {
        global $db_handle;

        $query = "DELETE FROM course_provider_logins WHERE Id='$couprov_code'";
        $result = $db_handle->runQuery($query);

       // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }

	public function activate_course_provider($couprov_code) {
        global $db_handle;

        $query = "UPDATE course_provider_logins SET status = '1' WHERE Id='$couprov_code'";
      	$result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

	public function deactivate_course_provider($user_id) {
        global $db_handle;

        $query = "UPDATE course_provider_logins SET status = '0' WHERE Id='$couprov_code'";
      	$result = $db_handle->runQuery($query);

        return $result ? true : false;
    }
	
	public function get_last_login($couprov_code){
		global $db_handle;
		 $query = "SELECT * FROM course_provider_logins WHERE user_id = '$couprov_code' OR login = '$couprov_code' ORDER BY time DESC LIMIT 1,1";
		$result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $login_info = $fetched_data;
        
        return $login_info;
		
	}
    
    // Check whether course_providers has an active status
    public function course_provider_is_active($couprov_code) {
        global $db_handle;
        
        $query = "SELECT status FROM course_providers WHERE couprov_code = '$couprov_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data[0]['status'] == 1) {
			$lastlogin = time();
			$query = "UPDATE course_providers SET active='$lastlogin' WHERE couprov_code = '$couprov_code'";
			$db_handle->runQuery($query);
            return true;
			
        } else {
            return false;
        }
    }
	
	 public function is_active_paid($couprov_code) {
        global $db_handle; 
        $current_time = date('Y-m-d H:i:s');
		$query = "SELECT * FROM course_providers WHERE (username='$couprov_code' OR couprov_code='$couprov_code') AND valid_until>'$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;

    	}
	
    public function add_to_order($total_price=NULL, $total_qty=NULL, $unique=NULL) {
        global $db_handle; 
        
        $query = "INSERT INTO course_provider_plan_orders (session_id, total_price, total_qty, orderstatus) VALUES
        ('$unique', '$total_price','$total_qty','0')";
        $db_handle->runQuery($query);
        
        return $db_handle->insertedId();
    }
    
    public function add_to_cart($plan_id=NULL, $amount=NULL, $quantity=NULL, $orderId=NULL, $unique=NULL){
        global $db_handle; 
        
         if($db_handle->numRows("SELECT session_id FROM course_provider_plan_orderitems WHERE session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id' ") > 0) { 
               $query = "UPDATE course_provider_plan_orderitems SET pquantity = '$quantity', productprice = '$amount' WHERE  session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id'";
         }else{
        
             $query = "INSERT INTO course_provider_plan_orderitems (pid, productprice, pquantity, orderid, session_id) VALUES ('$plan_id', '$amount', '$quantity', '$orderId', '$unique')";
        }
        $db_handle->runQuery($query);
        return true;
    }
       
    public function get_cart_info($sid=NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM course_provider_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
        
    }
    
    public function get_cart_total($sid=NULL) {
        global $db_handle;
        
        $query = "SELECT total_price FROM course_provider_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0]['total_price'];
        } else {
            return false;
        }
        
    }
    
    public function get_order_items($sid=NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM course_provider_plan_orderitems WHERE session_id = '$sid' OR orderid = '$sid'";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
    }
    
    public function delete_cart_item($unique=NULL, $sid=NULL) {
        global $db_handle;
        
        $query = "DELETE FROM course_provider_plan_orderitems WHERE session_id = '$unique' AND pid='$sid' ";
        $db_handle->runQuery($query);
        return 'Cart item was successfully deleted';
        
    }
	
	public function is_provider_plan_valid($couprov_code=NULL) {
        global $db_handle;
        
        $current_time = date('Y-m-d H:i:s');
		$query = "SELECT * FROM course_providers WHERE (username='$couprov_code' OR couprov_code='$couprov_code') AND plan_valid_until>='$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
        
    }

    public function paystack_payment($couprov_code, $reference=NULL, $trxref=NULL, $status=NULL, $amount=NULL, $email=NULL, $unique_id=NULL, $payment_category=NULL, $currency=NULL){
		global $db_handle;
		$query = "INSERT INTO payments SET couprov_code='".$couprov_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
        $db_handle->runQuery($query);
		
		$course_provider_plan_period = $this->course_provider_plan_detail_by_id($plan_id)['plan_period'];
		$course_valid_until = date('Y-m-d H:i:s', time() + $course_provider_plan_period*24*60*60);
		
		$query = "UPDATE course_providers SET orderstatus='1', course_valid_until='$course_valid_until' where couprov_code='$couprov_code'";
        $db_handle->runQuery($query);

		$query = "UPDATE carrrt SET ordered='1' where code='$unique_id'";
        $db_handle->runQuery($query);
        return true;
	}
    
    public function get_all_past_payments($couprov_code=NULL, $orderID=NULL, $payer_email=NULL, $payment_status=NULL, $gateway=NULL, $payment_currency=NULL) {
        global $db_handle;
        
        $con = (!empty($couprov_code) && ($couprov_code != 'NULL'))?" WHERE couprov_code = '$couprov_code' ": "";
    	if (!empty($con)){
			$con .= !empty($orderID)?" AND OrderID = '$orderID' ":"";
		}else{
        	$con .= !empty($orderID) && ($orderID != 'NULL')?" WHERE OrderID = '$orderID' ":"";
		}
		if (!empty($con)){
			$con .= !empty($payer_email)?" AND payer_email = '$payer_email' ":"";
		}else{
        	$con .= !empty($payer_email) && ($payer_email != 'NULL')?" WHERE payer_email = '$payer_email' ":"";
		}
    	if (!empty($con)){
			$con .= !empty($payment_status)?" AND payment_status = '$payment_status' ":"";
		}else{
        	$con .= !empty($payment_status)?" WHERE payment_status = '$payment_status' ":"";
		}
        if (!empty($con)){
			$con .= !empty($gateway)?" AND gateway = '$gateway' ":"";
		}else{
        	$con .= !empty($gateway)?" WHERE gateway = '$gateway' ":"";
		}
        if (!empty($con)){
			$con .= !empty($payment_currency)?" AND payment_currency = '$payment_currency' ":"";
		}else{
        	$con .= !empty($payment_currency)?" WHERE payment_currency = '$payment_currency' ":"";
		}
		if (!empty($limit)){
			$con .= " ORDER BY id DESC LIMIT $limit";
		}else{
			$con .= " ORDER BY id DESC";	
		}
        $query = "SELECT * FROM payments $con";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
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
	
	public function add_to_list($list_id, $user_code=NULL) {
        global $db_handle; 
		
		 global $db_handle;
        
        $query = "SELECT * FROM applicant_lists WHERE list_id = '$list_id' AND list_members LIKE '%{$user_code}%' ";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) < 1) {//Search if the user is already a part of the list
            $fetched_data = $db_handle->fetchAssoc($result);
            $list_members= $fetched_data[0]['list_members'];
			array_push($list_members, $user_code);
			
			$query = "UPDATE applicant_lists SET list_members = '$list_members' WHERE list_id = '$list_id' LIMIT 1";
			$result = $db_handle->runQuery($query);
			return true;
        } else {
            return false;
        }
        
    }
	
	public function all_applicant_lists($couprov_code=NULL) {
        global $db_handle;
        
		if (!empty($con)){
			$con .= !empty($couprov_code)?" AND couprov_code = '$couprov_code' ":"";
		}else{
        	$con .= !empty($couprov_code) && ($couprov_code != 'NULL')?" WHERE couprov_code = '$couprov_code' ":"";
		}
		$query = "SELECT * FROM applicant_lists $con";
        $result = $db_handle->runQuery($query);

        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
    }
	
	public function del_appl_list($list_id) {
        global $db_handle;

        $query = "DELETE FROM applicant_lists WHERE list_id='$list_id'";
        $result = $db_handle->runQuery($query);

       // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }



}

$course_prov_object = new CoursProvUser();