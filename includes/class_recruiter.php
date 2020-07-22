<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
//require_once(LIB_PATH.DS.'class_database.php');

class RecruitUser
{
    private $user_data;

    public function __construct($ifx_account = '', $email = '')
    {
        if (isset($email) && !empty($email)) {
            $this->user_data = $this->set_user_data($email);
        }
    }


    public function authenticate($username = "", $password = "")
    {
        global $db_handle;
        $username = $db_handle->sanitizePost($username);

        $query = "SELECT pass_salt FROM recruiters WHERE email = '{$username}'  or  username = '{$username}' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['pass_salt'];
            $pwdver = verify($password, $pass_salt);
            if (strlen($username) > 4 and ($pwdver == 1)) {
                $query = "SELECT recruiter_code, email, first_name, last_name, active, status FROM recruiters WHERE (recruiter_code='" . $username . "' or email='" . $username . "' or username='" . $username . "') LIMIT 1";
                $result = $db_handle->runQuery($query);

                if ($db_handle->numOfRows($result) == 1) {
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

    public function recruiting_plan_detail_by_id($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_plans WHERE plan_id = '$plan_id' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function get_all_recruiters()
    {
        global $db_handle;

        $query = "SELECT * FROM recruiters";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }


    public function get_recruiter_detail($recruiter_code = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiters WHERE username = '$recruiter_code' OR recruiter_code = '$recruiter_code' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function cvsearch_detail_by_id($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_cv_plans WHERE plan_id = '$plan_id' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function update_recruiter_password($username = "", $password = "")
    {
        global $db_handle;

        $query = "SELECT pass_salt FROM recruiters WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $user = $db_handle->fetchAssoc($result);
        $pass_salt = $user[0]['pass_salt'];
        $hashed_password = hash("SHA512", "$pass_salt.$password");

        $query = "UPDATE recruiters SET password = '{$hashed_password}' WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_recruiter_name_by_code($recruiter_code = NULL)
    {
        global $db_handle;

        $query = "SELECT CONCAT(last_name, ' ', first_name) AS full_name FROM recruiters WHERE recruiter_code = '$recruiter_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        $full_name = $fetched_data[0]['full_name'];
        return $full_name;
    }

    public function get_recruiter_detail_by_code($recruiter_code = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiters WHERE recruiter_code = '$recruiter_code' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function get_privileges($recruiter_code = NULL)
    {
        global $db_handle;

        $query = "SELECT allowed_pages FROM recruiter_privilege WHERE recruiter_code = '$recruiter_code' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    // Confirm that the email address is not existing
    public function recruiter_is_duplicate($email = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiters WHERE email = '$email'";
        $result = $db_handle->numRows($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Add a new recruiters profile
    public function add_new_recruiter($first_name = NULL, $last_name = NULL, $phone = NULL, $email, $username = '', $password, $billing_company, $billing_address_1, $billing_address_2, $billing_city, $billing_state, $billing_country)
    {
        global $db_handle;
        global $system_object;

        //check whether recruiter_code generated by rand_string is already existing
        recruiter_code: $recruiter_code = rand_string(5);
        if ($db_handle->numRows("SELECT recruiter_code FROM recruiters WHERE recruiter_code = '$recruiter_code'") > 0) {
            goto recruiter_code;
        };

        //$gen_pass = rand_string(7);
        $pass_salt = generateHash($password);


        $query = "INSERT INTO recruiters (recruiter_code, username, email, pass_salt, password, first_name, last_name, status, phone, billing_company, billing_address_1, billing_address_2, billing_city, billing_state, billing_country) VALUES ('$recruiter_code', '$username', '$email', '$pass_salt', '$password', '$first_name', '$last_name', '1', '$phone', '$billing_company', '$billing_address_1', '$billing_address_2', '$billing_city', '$billing_state', '$billing_country')";
        $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {

            $query = "INSERT INTO recruiter_privilege (recruiter_code, allowed_pages) VALUES ('$recruiter_code', '')";
            $db_handle->runQuery($query);

            //New recruiters succefully inserted, send default password to the recruiters
            $subject = "UKESPS recruiters Login";
            $body = "
Dear " . $first_name . "

A UKESPS recruiters profile has been created for you.

Your  password is $password

Login with the URL below, you can update your password in the
profile settings.

https://ukesps.com/recruiters

Do not share your recruiters credentials with anyone.


UKESPS Support
www.ukesps.com";

            $system_object->send_email($subject, $body, $email, $first_name);


            return "An email was sent to $email containing your password and registration information. <br>It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, Email: $email <br> Password: $password. <br> To login, <a href='login'>Click here</a>.<br>Regards.";
        } else {
            return false;
        }
    }


    // Update recruiters profile - modify the status
    public function modify_recruiter_profile($recruiter_code, $recruiter_status)
    {
        global $db_handle;

        $query = "UPDATE recruiters SET status = '{$recruiter_status}' WHERE recruiter_code = '{$recruiter_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function modify_recruiter_privilege($recruiter_code, $allowed_pages)
    {
        global $db_handle;

        $query = "UPDATE recruiter_privilege SET allowed_pages = '{$allowed_pages}' WHERE recruiter_code = '{$recruiter_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }



    public function delete_recruiter($recruiter_code)
    {
        global $db_handle;

        $query = "DELETE FROM recruiter_logins WHERE Id='$recruiter_code'";
        $result = $db_handle->runQuery($query);

        // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }

    public function activate_recruiter($recruiter_code)
    {
        global $db_handle;

        $query = "UPDATE recruiter_logins SET status = '1' WHERE Id='$recruiter_code'";
        $result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

    public function deactivate_recruiter($recruiter_code)
    {
        global $db_handle;

        $query = "UPDATE recruiter_logins SET status = '0' WHERE Id='$recruiter_code'";
        $result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

    public function get_last_login($recruiter_code)
    {
        global $db_handle;
        $query = "SELECT * FROM recruiter_logins WHERE user_id = '$recruiter_code' OR login = '$recruiter_code' ORDER BY time DESC LIMIT 1,1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $login_info = $fetched_data;

        return $login_info;
    }

    // Check whether recruiters has an active status
    public function recruiter_is_active($recruiter_code)
    {
        global $db_handle;

        $query = "SELECT status FROM recruiters WHERE recruiter_code = '$recruiter_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data[0]['status'] == 1) {
            $lastlogin = time();
            $query = "UPDATE recruiters SET active='$lastlogin' WHERE recruiter_code = '$recruiter_code'";
            $db_handle->runQuery($query);
            return true;
        } else {
            return false;
        }
    }

    public function is_active_paid($recruiter_code)
    {
        global $db_handle;
        $current_time = date('Y-m-d H:i:s');
        $query = "SELECT * FROM recruiters WHERE (username='$recruiter_code' OR recruiter_code='$recruiter_code') AND valid_until>'$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
    }

    public function add_to_order($total_price = NULL, $total_qty = NULL, $unique = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO recruiting_plan_orders (session_id, total_price, total_qty, orderstatus) VALUES
        ('$unique', '$total_price','$total_qty','0')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function add_to_cart($plan_id = NULL, $amount = NULL, $quantity = NULL, $orderId = NULL, $unique = NULL)
    {
        global $db_handle;

        if ($db_handle->numRows("SELECT session_id FROM recruiting_plan_orderitems WHERE session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id' ") > 0) {
            $query = "UPDATE recruiting_plan_orderitems SET pquantity = '$quantity', productprice = '$amount' WHERE  session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id'";
        } else {

            $query = "INSERT INTO recruiting_plan_orderitems (pid, productprice, pquantity, orderid, session_id) VALUES ('$plan_id', '$amount', '$quantity', '$orderId', '$unique')";
        }
        $db_handle->runQuery($query);
        return true;
    }

    public function add_to_cvsearch_order($total_price = NULL, $total_qty = NULL, $unique = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO recruiting_cv_plan_orders (session_id, total_price, total_qty, orderstatus) VALUES
        ('$unique', '$total_price','$total_qty','0')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function add_to_cvsearch_cart($plan_id = NULL, $amount = NULL, $quantity = NULL, $orderId = NULL, $unique = NULL)
    {
        global $db_handle;

        if ($db_handle->numRows("SELECT session_id FROM recruiting_cv_plan_orderitems WHERE session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id' ") > 0) {
            $query = "UPDATE recruiting_cv_plan_orderitems SET pquantity = '$quantity', productprice = '$amount' WHERE  session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id'";
        } else {

            $query = "INSERT INTO recruiting_cv_plan_orderitems (pid, productprice, pquantity, orderid, session_id) VALUES ('$plan_id', '$amount', '$quantity', '$orderId', '$unique')";
        }
        $db_handle->runQuery($query);
        return true;
    }

    public function get_cart_info($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
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

        $query = "SELECT total_price FROM recruiting_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
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

        $query = "SELECT * FROM recruiting_plan_orderitems WHERE session_id = '$sid'";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_cvsearch_cart_info($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_cv_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function get_cvsearch_cart_total($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT total_price FROM recruiting_cv_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0]['total_price'];
        } else {
            return false;
        }
    }

    public function get_cvsearch_order_items($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_cv_plan_orderitems WHERE session_id = '$sid'";
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

        $query = "DELETE FROM recruiting_plan_orderitems WHERE session_id = '$unique' AND pid='$sid' ";
        $db_handle->runQuery($query);
        return 'Cart item was successfully deleted';
    }
    public function delete_cart($sid)
    {
        global $db_handle;

        $query = "DELETE FROM recruiting_plan_orderitems WHERE  uid='$sid' ";
        $db_handle->runQuery($query);
        return 'Cart was successfully deleted';
    }

    public function is_recruit_plan_valid($recruiter_code = NULL)
    {
        global $db_handle;

        $current_time = date('Y-m-d H:i:s');
        $query = "SELECT * FROM recruiters WHERE (username='$recruiter_code' OR recruiter_code='$recruiter_code') AND recruit_valid_until>='$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
    }

    /*public function paystack_payment($recruiter_code, $reference=NULL, $trxref=NULL, $status=NULL, $amount=NULL, $email=NULL, $unique_id=NULL, $payment_category=NULL, $currency=NULL){
		global $db_handle;
		$query = "INSERT INTO payments SET recruiter_code='".$recruiter_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
        $db_handle->runQuery($query);
		
		$query = "UPDATE recruiters SET recruiters='1' where code='$unique_id'";
        $db_handle->runQuery($query);

		$query = "UPDATE carrrt SET ordered='1' where code='$unique_id'";
        $db_handle->runQuery($query);
        return true;
	}*/

    public function get_all_past_payments($recruiter_code = NULL, $orderID = NULL, $payer_email = NULL, $payment_status = NULL, $gateway = NULL, $payment_currency = NULL)
    {
        global $db_handle;

        $con = (!empty($recruiter_code) && ($recruiter_code != 'NULL')) ? " WHERE recruiter_code = '$recruiter_code' " : "";
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

    public function application_detail($application_id = NULL, $email = NULL, $first_name = NULL, $last_name = NULL)
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

        if (!empty($limit)) {
            $con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY appl.appl_id DESC";
        }
        $query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.first_name AS first_name, us.email AS appl_email, jbs.job_title, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, co.country_name AS appl_country FROM applications appl 
		INNER JOIN countries co ON us.country=co.country_id 
		INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
		INNER JOIN users us ON appl.applicant_code=us.recruiter_code
		INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
		INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory $con";

        $result = $db_handle->runQuery($query);
        $content = $db_handle->fetchAssoc($result);

        return $content;
    }

    public function applicant_detail($applicant_code = NULL, $email = NULL, $first_name = NULL, $last_name = NULL)
    {
        global $db_handle;

        $con = (!empty($applicant_code) && ($applicant_code != 'NULL')) ? " WHERE appl.applicant_code = '$applicant_code' " : "";
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

        if (!empty($limit)) {
            $con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY appl.appl_id DESC";
        }
        $query = "SELECT appl.*, appld.* FROM applications appl 
		INNER JOIN applicant_details appld ON appld.applicant_code=appl.applicant_code 
		INNER JOIN users us ON appl.applicant_code=us.recruiter_code $con";

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

    public function get_recruiting_cv_plans()
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_cv_plans ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function add_applicant_list($list_name = NULL, $list_description = NULL, $recruiter_code = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO applicant_lists (list_name, recruiter_code, list_description) VALUES
        ('$list_name', '$list_description', '$recruiter_code')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function get_applicant_list_details($recruiter_code = NULL, $list_id)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($recruiter_code) ? " AND recruiter_code = '$recruiter_code' " : "";
        } else {
            $con .= !empty($recruiter_code) && ($recruiter_code != 'NULL') ? " WHERE recruiter_code = '$recruiter_code' " : "";
        }
        if (!empty($con)) {
            $con .= !empty($list_id) ? " AND list_id = '$list_id' " : "";
        } else {
            $con .= !empty($list_id) && ($list_id != 'NULL') ? " WHERE list_id = '$list_id' " : "";
        }

        $query = "SELECT * FROM applicant_lists $con";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function add_to_list($list_id, $recruiter_code = NULL)
    {
        global $db_handle;

        global $db_handle;

        $query = "SELECT * FROM applicant_lists WHERE list_id = '$list_id' AND list_members LIKE '%{$recruiter_code}%' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) < 1) { //Search if the user is already a part of the list
            $fetched_data = $db_handle->fetchAssoc($result);
            $list_members = $fetched_data[0]['list_members'];
            array_push($list_members, $recruiter_code);

            $query = "UPDATE applicant_lists SET list_members = '$list_members' WHERE list_id = '$list_id' LIMIT 1";
            $result = $db_handle->runQuery($query);
            return true;
        } else {
            return false;
        }
    }

    public function all_applicant_lists($recruiter_code = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($recruiter_code) ? " AND recruiter_code = '$recruiter_code' " : "";
        } else {
            $con .= !empty($recruiter_code) && ($recruiter_code != 'NULL') ? " WHERE recruiter_code = '$recruiter_code' " : "";
        }
        $query = "SELECT * FROM applicant_lists $con";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function del_appl_list($list_id)
    {
        global $db_handle;

        $query = "DELETE FROM applicant_lists WHERE list_id='$list_id'";
        $result = $db_handle->runQuery($query);

        // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }

    public function cv_search($application_title = NULL, $search_town = NULL, $minsalary = NULL, $maxsalary = NULL, $sector_name = NULL, $studylevel_name = NULL, $jobexperience_name = NULL, $joblevel_name = NULL, $skill_name = NULL)
    {
        global $db_handle;

        $con = (!empty($application_title) && ($application_title != 'NULL')) ? " WHERE appl.application_title LIKE '%{$application_title}%' " : "";
        if (!empty($con)) {
            $con .= !empty($search_town) ? " OR jlo.location_name = '$search_town' " : "";
        } else {
            $con .= !empty($search_town) && ($search_town != 'NULL') ? " WHERE (jlo.location_name = '$search_town' OR jlo.location_id = '$search_town') " : "";
        }
        if (!empty($con)) {
            if (!empty($minsalary) && !empty($maxsalary)) {
                $con .= " OR appl.desired_salary BETWEEN '$minsalary' AND '$maxsalary' ";
            } elseif (!empty($minsalary)) {
                $con .= " OR appl.desired_salary > '$minsalary' ";
            } elseif (!empty($maxsalary)) {
                $con .= " OR appl.desired_salary < '$maxsalary' ";
            }
        } else {
            if (!empty($minsalary) && !empty($maxsalary)) {
                $con .= " WHERE appl.desired_salary BETWEEN '$minsalary' AND '$maxsalary' ";
            } elseif (!empty($minsalary)) {
                $con .= " WHERE appl.desired_salary > '$minsalary' ";
            } elseif (!empty($maxsalary)) {
                $con .= " WHERE appl.desired_salary < '$maxsalary' ";
            }
        }
        if (!empty($con)) {
            $con .= !empty($sector_name) ? " OR jbset.sector_id = '$sector_name' " : "";
        } else {
            $con .= !empty($sector_name) && ($sector_name != 'NULL') ? " WHERE jbset.sector_id = '$sector_name' " : "";
        }
        if (!empty($con)) {
            $con .= !empty($studylevel_name) ? " OR stulvl.sl_id = '$studylevel_name' " : "";
        } else {
            $con .= !empty($studylevel_name) && ($studylevel_name != 'NULL') ? " WHERE stulvl.sl_id = '$studylevel_name' " : "";
        }
        if (!empty($con)) {
            $con .= !empty($jobexperience_name) ? " OR jb_exper.jobexperience_id = '$jobexperience_name' " : "";
        } else {
            $con .= !empty($jobexperience_name) && ($jobexperience_name != 'NULL') ? " WHERE jb_exper.jobexperience_id = '$jobexperience_name' " : "";
        }
        if (!empty($con)) {
            $con .= !empty($joblevel_name) ? " OR joblvl.joblevel_id = '$joblevel_name' " : "";
        } else {
            $con .= !empty($joblevel_name) && ($joblevel_name != 'NULL') ? " WHERE joblvl.joblevel_id = '$joblevel_name' " : "";
        }
        if (!empty($con)) {
            $con .= !empty($skill_name) ? " OR jobsk.skill_id = 'skill_name' " : "";
        } else {
            $con .= !empty($skill_name) && ($skill_name != 'NULL') ? " WHERE jobsk.skill_id = '$skill_name' " : "";
        }


        if (!empty($limit)) {
            $con .= "ORDER BY appl.appl_id DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY appl.appl_id DESC";
        }
        $query = "SELECT appl.*, appl.status AS appl_status, us.recruiter_code, us.last_name As last_name, us.first_name AS first_name, us.email AS appl_email, jbs.job_title, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, co.country_name AS appl_country FROM applications appl 
		INNER JOIN applicant_details appl_det ON appl_det.applicant_code=appl.applicant_code 
		INNER JOIN job_locations jlo ON us.location=jlo.location_id 
		INNER JOIN countries co ON us.country=co.country_id 
		INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
		INNER JOIN job_sectors jbset ON appl.job_sector=jbset.sector_id 
		INNER JOIN study_levels stulvl ON appl_det.highest_study_level=stulvl.sl_id 
		INNER JOIN job_experience jb_exper ON appl_det.years_of_experience=jb_exper.jobexperience_id 
		INNER JOIN job_levels joblvl ON appl_det.current_work_experience_level_1=joblvl.joblevel_id
		INNER JOIN job_skills jobsk ON appl_det.skills=jobsk.skill_id
		INNER JOIN users us ON appl.applicant_code=us.recruiter_code
		INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
		INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory $con";

        $result = $db_handle->runQuery($query);
        $content = $db_handle->fetchAssoc($result);

        return $content;
    }

    public function update_cart_with_recruiter_code($recruiter_code, $unique = NULL, $payment_category = NULL)
    {
        global $db_handle;
        if ($_SESSION['payment_category'] == '1') {
            $query = "UPDATE recruiting_plan_orders SET uid='$recruiter_code' where session_id='$unique'";
            $db_handle->runQuery($query);
        }
    }
}

$recruit_object = new RecruitUser();
