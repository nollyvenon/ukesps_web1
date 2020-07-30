<?php
class zentabooksOperation
{
    private $user_data;

    public function __construct($ifx_account = '', $email = '')
    {
        if (isset($email) && !empty($email)) {
            $this->user_data = $this->set_user_data($email);
        }
    }

    public function authenticate($email = "", $password = "")
    {
        global $db_handle;

        $query = "SELECT password FROM users WHERE email = '$email' or  username = '$email' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['password'];
            $pwdver = verify($password, $pass_salt);
            if (strlen($email) > 4 and ($pwdver == 1)) {
                $query = "select * from users where (user_code='" . $email . "' or email='" . $email . "' or username='" . $email . "') LIMIT 1";
                $result = $db_handle->runQuery($query);

                if ($db_handle->numOfRows($result) == 1) {
                    $found_user = $db_handle->fetchAssoc($result);
                    $_SESSION['user_username'] = $found_user[0]['username'];
                    $_SESSION['user_unique_code'] = $found_user[0]['user_code'];
                    return $found_user;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    // Check whether user has an active status
    public function user_is_active($user_code)
    {
        global $db_handle;

        $query = "SELECT status FROM users WHERE user_code = '$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data[0]['status'] == '1') {
            $lastlogin = time();
            $query = "UPDATE users SET active='$lastlogin' WHERE user_code = '$user_code'";
            $db_handle->runQuery($query);
            return true;
        } else {
            return false;
        }
    }

    public function get_state_info_by_id($state_id)
    {
        global $db_handle;

        $query = "SELECT * FROM states WHERE state_id = '$state_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_state_by_id($state_id)
    {
        global $db_handle;

        $query = "SELECT state_name FROM states WHERE state_id = '$state_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $state_name = $fetched_data[0]['state_name'];

        return $state_name;
    }
    public function get_course_pricing_detail($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_provider_plans WHERE plan_id = '$plan_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_recruiter_pricing_detail($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_provider_plans WHERE plan_id = '$plan_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_course_location_by_id($location_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_locations WHERE location_id = '$location_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_job_location_by_id($location_id)
    {
        global $db_handle;

        $query = "SELECT * FROM job_locations WHERE location_id = '$location_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_job_category_by_id($category_id)
    {
        global $db_handle;

        $query = "SELECT * FROM job_categories WHERE category_id = '$category_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_subjob_category_by_id($sub_category_id)
    {
        global $db_handle;

        $query = "SELECT * FROM job_sub_categories WHERE subcat_id = '$sub_category_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_lga_id_by_lga($lga_name)
    {
        global $db_handle;

        $query = "SELECT lga_id FROM lga WHERE lga_name = '$lga_name'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $lga_id = $fetched_data[0];

        return $lga_id ? $lga_id : false;
    }


    public function get_all_states()
    {
        global $db_handle;

        $query = "SELECT * FROM states ORDER BY state_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_locations()
    {
        global $db_handle;

        $query = "SELECT * FROM locations ORDER BY location_name ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_countries()
    {
        global $db_handle;

        $query = "SELECT * FROM countries ORDER BY country_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_country_name_by_id($country_id)
    {
        global $db_handle;

        $query = "SELECT * FROM countries WHERE country_id='$country_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data[0]['country_name'];
        } else {
            return false;
        }
    }

    public function get_states_by_country($country_id)
    {
        global $db_handle;

        $query = "SELECT * FROM states WHERE country_id='$country_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_couloc_by_state($state_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_locations WHERE state_id='$state_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_jobloc_by_state($state_id)
    {
        global $db_handle;

        $query = "SELECT * FROM job_locations WHERE state_id='$state_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_site_currency()
    {
        global $db_handle;

        $query = "SELECT SiteCurrency FROM settings ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data[0]['SiteCurrency'];
        } else {
            return false;
        }
    }

    public function get_all_currencies()
    {
        global $db_handle;

        $query = "SELECT * FROM currencies ORDER BY currency_id DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_course_locations()
    {
        global $db_handle;

        $query = "SELECT * FROM course_locations ORDER BY location_name ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_job_levels()
    {
        global $db_handle;

        $query = "SELECT * FROM job_levels ORDER BY joblevel_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_job_types()
    {
        global $db_handle;

        $query = "SELECT * FROM job_types ORDER BY jobtype_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_job_by_id($job_id = NULL)
    {
        global $db_handle;
        $con = "";

        $query = "SELECT jbv.*, jbl.location_id, jbl.location_name, jbse.sector_name, jbty.jobtype_name, jbc.company_name, jbca.category_name, jble.joblevel_name, jbsca.category_name AS sub_category_name FROM jobs jbv
        INNER JOIN job_locations jbl ON jbv.job_location=jbl.location_id
		INNER JOIN job_sectors jbse ON jbv.job_sector=jbse.sector_id
		INNER JOIN job_types jbty ON jbv.jobstype=jbty.jobtype_id
		INNER JOIN job_levels jble ON jbv.joblevel=jble.joblevel_id
		INNER JOIN job_companies jbc ON jbv.job_company=jbc.company_id
		INNER JOIN job_categories jbca ON jbv.job_category=jbca.category_id
		INNER JOIN job_sub_categories jbsca ON jbv.job_subcategory=jbsca.subcat_id
		WHERE jbv.jobs_id='$job_id' ";
        $result = $db_handle->runQuery($query);
        $jobs = $db_handle->fetchAssoc($result);

        return $jobs[0];
    }

    public function get_all_user_groups()
    {
        global $db_handle;

        $query = "SELECT * FROM groups ORDER BY id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_staff($staff_id = NULL, $first_name = NULL, $last_name = NULL, $designation = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = (!empty($staff_id) && ($staff_id != 'NULL')) ? " WHERE staff_id = '$staff_id' " : "";
        if (!empty($con)) {
            $con .= !empty($first_name) ? " AND first_name = '$first_name' " : " ";
        } else {
            $con .= !empty($first_name) && ($first_name != 'NULL') ? " WHERE first_name = '$first_name' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($last_name) ? " AND last_name = $last_name " : "";
        } else {
            $con .= !empty($last_name) && ($last_name != 'NULL') ? " WHERE last_name = '$last_name' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($designation) ? " AND designation = '$designation' " : " ";
        } else {
            $con .= !empty($designation) ? " WHERE designation = '$designation' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY staff_id DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY staff_id DESC";
        }
        $query = "SELECT * FROM staff $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_all_users($user_id = NULL, $fullname = NULL, $username = NULL, $phone = NULL, $marketer = NULL, $email = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = (!empty($user_id) && ($user_id != 'NULL')) ? " WHERE userid = '$user_id' " : " ";
        if (!empty($con)) {
            $con .= !empty($fullname) ? " OR username = '$fullname' " : "";
        } else {
            $con .= !empty($fullname) && ($fullname != 'NULL') ? " WHERE username = '$fullname' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($username) ? " OR username = $username " : "";
        } else {
            $con .= !empty($username) && ($username != 'NULL') ? " WHERE username = '$username' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($marketer) ? " OR marketer = '$marketer' " : " ";
        } else {
            $con .= !empty($marketer) ? " WHERE marketer = '$marketer' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($email) ? " OR email = '$email' " : " ";
        } else {
            $con .= !empty($email) ? " WHERE email = '$email' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($phone) ? " OR phone = '$phone' " : " ";
        } else {
            $con .= !empty($phone) ? " WHERE phone = '$phone' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY userid DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY userid DESC";
        }
        $query = "SELECT * FROM user $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }


    public function get_all_products($product_id = NULL, $prodcode = NULL, $location = NULL, $account = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = (!empty($product_id) && ($product_id != 'NULL')) ? " WHERE id = '$product_id' " : " ";
        if (!empty($con)) {
            $con .= !empty($prodcode) ? " AND prodcode = $prodcode " : "";
        } else {
            $con .= !empty($prodcode) && ($prodcode != 'NULL') ? " WHERE prodcode = '$prodcode' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($location) ? " AND location = $location " : "";
        } else {
            $con .= !empty($location) && ($location != 'NULL') ? " WHERE location = '$location' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($account) ? " AND account = '$account' " : " ";
        } else {
            $con .= !empty($account) ? " WHERE account = '$account' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY id DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY id DESC";
        }
        $query = "SELECT * FROM products $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }

    public function get_no_of_monthly_transactions($table, $month)
    {
        global $db_handle;

        $numQuery = $db_handle->numRows("SELECT * FROM $table WHERE MONTH(date)='$month'");

        return $numQuery;
    }

    public function add_support_query($user_code, $subject, $category, $message, $gallery = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO support_queries (user_code, subject, category, message) VALUES
            ('$user_code', '$subject', '$category', '$message')";
        $db_handle->runQuery($query);
        $support_id = $db_handle->insertedId();

        $query = "INSERT INTO support_queries_details (user_code, support_id, subject, category, message, upload_file) VALUES
            ('$user_code', '$support_id', '$subject', '$category', '$message', '$gallery')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function add_support_query2($support_id, $user_code, $subject, $message, $gallery = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO support_queries_details (user_code, support_id, subject, message, upload_file) VALUES
            ('$user_code', '$support_id', '$subject', '$message', '$gallery')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function add_admin_support_query($support_id, $user_code, $subject, $message, $admin_code, $gallery = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO support_queries_details (user_code, support_id, subject, message, answered_by, upload_file) VALUES
            ('$user_code', '$support_id', '$subject', '$message', '$admin_code', '$gallery')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function admin_support_query($user_code, $subject, $category, $message)
    {
        global $db_handle;

        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "X-Priority: 1" . "\r\n";

        $recepient_det = $this->get_user_by_code($user_code);
        $email = $recepient_det['email'];

        $site_email = $this->get_site_setting()['email'];

        mail($email, $subject, $message, $headers);

        $query = "INSERT INTO support_queries (user_code, subject, category, message) VALUES
            ('$user_code', '$subject', '$category', '$message')";
        $db_handle->runQuery($query);
        $support_id = $db_handle->insertedId();

        $query = "INSERT INTO support_queries_details (user_code, support_id, subject, category, message) VALUES
            ('$user_code', '$support_id', '$subject', '$category', '$message')";
        $db_handle->runQuery($query);


        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function get_support_team_details($country = NULL)
    {
        //get the contact details of support
        global $db_handle;

        $query = "SELECT * FROM support_team_details LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $su_details = $fetched_data[0];

        return $su_details ? $su_details : false;
    }

    public function get_support_query_details($support_id, $user_code = NULL)
    {
        //get the contact details of support
        global $db_handle;

        if ($user_code == "") {
            $query = "SELECT * FROM support_queries_details WHERE support_id='$support_id'";
        } else {
            $query = "SELECT * FROM support_queries_details WHERE support_id='$support_id' and user_code='$user_code'";
        }
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        //$su_details = $fetched_data[0];

        return $fetched_data ? $fetched_data : false;
    }

    public function delete_support_query($support_id)
    {
        global $db_handle;

        $query = "INSERT INTO deleted_support_queries select * from support_queries where support_id = '$support_id';";
        $result = $db_handle->runQuery($query);

        $query1 = "DELETE FROM support_queries where support_id = '$support_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function solve_support_query($support_id)
    {
        global $db_handle;

        $query1 = "UPDATE support_queries SET status='4' where support_id = '$support_id'";
        $result1 = $db_handle->runQuery($query1);
        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function reply_support_query($support_id, $replyquery, $admincode)
    {
        global $db_handle;
        $sup_details = $this->get_support_query_details($support_id);
        $subject = $sup_details['subject'];
        $senderemail = $sup_details['email'];
        $sender_details = $this->get_user_by_email($senderemail);
        $sendername = $sup_details['first_name'] . ' ' . $sup_details['middle_name'] . ' ' . $sup_details['last_name'];


        /* 	$my_mail = "life@skultins.com";
	  $my_replyto = "life@skultins.com";
	  
	  $headers  = "MIME-Version: 1.0" . "\r\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	  $headers .= "From: ". $my_mail. "\r\n";
	  $headers .= "Reply-To: ". $my_replyto. "\r\n";
	  $headers .= "X-Mailer: PHP/" . phpversion();
	  $headers .= "X-Priority: 1" . "\r\n"; 
	  
		  mail_attachment($my_file, $my_path, $senderemail, $my_mail, $sendername, $my_replyto, $subject, $replyquery);*/

        $query1 = "UPDATE support_queries SET status='3',answered_by='$admincode' where support_id = '$support_id'";
        $result1 = $db_handle->runQuery($query1);
        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function mailandsms_list()
    {
        global $db_handle;

        $query = "SELECT * FROM mailandsms";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function mailandsms_template_list($type)
    {
        global $db_handle;

        $query = "SELECT * FROM mailandsms_template ";
        if ($type != "") {
            $query .= "WHERE type='$type'";
        }
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function mailandsms_template_detail($templ_id)
    {
        global $db_handle;

        $query = "SELECT * FROM mailandsms_template WHERE id='$templ_id'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function add_marketing_template($name, $user, $template, $type)
    {
        global $db_handle;

        $query = "INSERT INTO mailandsms_template(template_name, receivers, type, template) VALUES ('$name', '$user', '$template', '$type)";
        $i_id = $db_handle->runQuery($query);
        return $db_handle->insertedId();
    }

    public function recruiting_plans()
    {
        global $db_handle;

        $query = "SELECT * FROM recruiting_plans order by plan_id DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data;
    }

    public function recruiting_plan_by_id($plan_id)
    {
        global $db_handle;
        $query = "SELECT * FROM recruiting_plans WHERE plan_id='$plan_id' DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data[0];
    }
    public function cv_search_plan_by_id($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM cv_search_plans WHERE plan_id='$plan_id' DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data[0];
    }
    ////////////////// ADD COURSE PRICING ///////////////////////////////////////////////////////////////////
    public function add_course_pricing($plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {
        global $db_handle;

        $query = "INSERT INTO course_provider_plans(plan_name, plan_cost, plan_discount_cost, plan_currency, plan_image, plan_period, highlights, description) VALUES ('$plan_name', '$plan_cost', '$plan_discount_cost', '$plan_currency', '$plan_image', '$plan_period', '$highlights', '$description')";
        $db_handle->runQuery($query);
        return $db_handle->insertedId();
    }
    public function add_event_pricing($plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {
        global $db_handle;

        $query = "INSERT INTO event_provider_plans(plan_name, plan_cost, plan_discount_cost, plan_currency, plan_image, plan_period, highlights, description) VALUES ('$plan_name', '$plan_cost', '$plan_discount_cost', '$plan_currency', '$plan_image', '$plan_period', '$highlights', '$description')";
        $db_handle->runQuery($query);
        return $db_handle->insertedId();
    }
    public function add_job_pricing($plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {
        global $db_handle;

        $query = "INSERT INTO recruiting_plans(plan_name, plan_cost, plan_discount_cost, plan_currency, plan_image, plan_period, highlights, description) VALUES ('$plan_name', '$plan_cost', '$plan_discount_cost', '$plan_currency', '$plan_image', '$plan_period', '$highlights', '$description')";
        $db_handle->runQuery($query);
        return $db_handle->insertedId();
    }
    public function add_cv_pricing($plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {
        global $db_handle;

        $query = "INSERT INTO recruiting_cv_plans(plan_name, plan_cost, plan_discount_cost, plan_currency, plan_image, plan_period, highlights, description) VALUES ('$plan_name', '$plan_cost', '$plan_discount_cost', '$plan_currency', '$plan_image', '$plan_period', '$highlights', '$description')";
        $db_handle->runQuery($query);
        return $db_handle->insertedId();
    }
    public function course_providing_plans()
    {
        global $db_handle;

        $query = "SELECT * FROM course_provider_plans order by plan_id DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data;
    }

    public function course_provider_plan_by_id($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_provider_plans WHERE plan_id='$plan_id' DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data[0];
    }


    public function get_group_info($group_id)
    {
        global $db_handle;

        $query = "SELECT us.*
                FROM groups AS us
				WHERE us.id='$group_id' OR us.name='$group_id'
				ORDER BY us.id DESC ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0];
    }

    public function get_all_transactions($userID = NULL, $invoiceID = NULL, $receiptID = NULL)
    {
        //get sales/invoice transaction using the transaction ID and user ID(if applicable)
        global $db_handle;

        $query = "SELECT user.username, user.userid, user.balance, invoices.invoiceid, invoices.monthlypay, invoices.amountpayable, invoices.monthlypay, invoices.acctbalance, invoices.product, invoices.noofplot, invoices.buildopt, invoices.paystruct, receipt.receiptid, receipt.amountpaid, receipt.bankname, receipt.paydate, receipt.paymethod, SUM(invoices.amountpayable) AS total_amountpayable, SUM(receipt.amountpaid) AS  total_amountpaid, (SUM(invoices.amountpayable) - SUM(receipt.amountpaid)) AS transaction_balance
		FROM ((invoices
		CROSS JOIN user ON invoices.userid = user.userid)
		CROSS JOIN (receipt ON invoices.userid = receipt.userid AND invoices.invoiceid = receipt.invoiceid))";
        $query .= " WHERE user.userid!=''";
        if ($userID != "") {
            $query .= " AND user.userid='$userID'";
        }
        if ($invoiceID != "") {
            $query .= " AND invoices.invoiceid='$invoiceID'";
        }
        if ($receiptID != "") {
            $query .= " AND receipt.receiptid='$receiptID'";
        }

        return $query;
    }

    public function new_user($last_name = NULL, $middle_name = NULL, $first_name = NULL, $gender = NULL, $email = NULL, $phone = NULL, $password = NULL, $country = NULL, $source = NULL, $mailing_address = NULL, $course_preference = NULL, $university_preference = NULL, $billing_address_2 = NULL, $billing_city = NULL, $billing_state = NULL)
    {
        $system_object = new SystemObject();
        global $db_handle;

        // Check whether the email is existing
        $query = "SELECT user_code FROM users WHERE email = '$email' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            $user_code = $fetched_data[0]['user_code'];
        } else {
            //$password = rand_string(7);
            $pass_salt = generateHash($password);

            usercode: $user_code = rand_string(11);
            if ($db_handle->numRows("SELECT user_code FROM users WHERE user_code = '$user_code'") > 0) {
                goto usercode;
            };

            $query = "INSERT INTO users (user_code, email, phone, first_name, middle_name, last_name, password, gender, mailing_address, country, source, course_preference, university_preference, mailing_address2, city, state) VALUES ('$user_code', '$email', '$phone', '$first_name', '$middle_name', '$last_name', '$pass_salt', '$gender', '$mailing_address', '$country', '$source', '$course_preference', '$university_preference', '$mailing_address2', '$billing_city', '$billing_state')";
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
Login: https://ukesps.com/login

What is my next step?

i - Login to your account using the username and password.
ii - If you haven't provided help already, do so by clicking the Provide Help Menu
iii - Ensure to always check from time to time. You could be merged to provide help anytime
iv.  Always observe notifications on the dashboard.


Best Regards,
UKESPS Admin Team
www.ukesps.com";

            $system_object->send_email($subject, $body, $email, $full_name);
            /*	$headers = array("From: life@finaclefund.com",
    "Reply-To: support@finaclefund.com",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);*/
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: " . $from . "\r\n";
            $headers .= "Reply-To: " . $from . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            $headers .= "X-Priority: 1" . "\r\n";

            $my_mail = "info@assuredodds.com";
            $my_replyto = "info@assuredodds.com";


            mail_attachment($my_file, $my_path, $email, $my_mail, $my_name, $my_replyto, $subject, $body);
            //	mail($email, $subject, $body, $headers);

        }

        return "An email was sent to $email containing your password and registration information. It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, Email: $email <br> Password: $password. <br> To login, <a href='login'>Click here</a>.<br>Regards.";
    }

    public function forgot_password($email)
    {

        global $db_handle;
        $gen_pass = rand_string(7);
        $pass_salt = generateHash($gen_pass);

        $query = "UPDATE users set password = '$pass_salt' where email = '$email'";
        $db_handle->runQuery($query);

        $to = $email;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: UKESPS Admin <no-reply@ukesps.com>' . "\r\n";
        $subject = "Password Request";
        $message .= "This is your new password : <b> $gen_pass </b><br><br>";
        mail($to, $subject, $message, $headers);

        return "Your password is $gen_pass. Your password has been sent to your registered email. Please check your junk or spam folder if you do not find in your inbox.";
    }

    public function get_user_detail($id)
    {
        global $db_handle;

        $query = "SELECT * FROM users where user_code = '$id' OR us.id='$id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $desi_det = $fetched_data[0];

        return $desi_det;
    }

    public function del_user($user_id)
    {
        global $db_handle;

        $query = "INSERT INTO deleted_user select * from user where id = '$user_id';";
        $result = $db_handle->runQuery($query);

        $query1 = "DELETE FROM user where id = '$user_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function edit_user($user_id, $username, $name, $email, $phone, $country, $ip, $status = NULL, $admin = NULL)
    {

        global $db_handle;
        $query = "UPDATE user SET fullname = '$name', email = '$email', phone = '$phone', username = '$username', status = '$status'  WHERE id = '$user_id' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function deactivate_user($user_id)
    {

        global $db_handle;
        $query = "UPDATE user SET status = '0'  WHERE id = '$user_id' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function activate_user($user_id)
    {

        global $db_handle;
        $query = "UPDATE user SET status = '1'  WHERE id = '$user_id' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    /*public function add_user($username, $password, $name, $email, $phone, $country, $ip, $admin=NULL){
        global $db_handle;

            usercode:
            $user_code = random_string('md5');
            if($db_handle->numRows("SELECT user_code FROM user WHERE user_code = '$user_code'") > 0) { goto usercode; };
			$pass_salt = generateHash($password);

        $query = "INSERT INTO user (user_code, fullname, gender, phone, email, username, password, status, country,ip) VALUES 
		('$user_code', '$first_name', '$last_name', '$gender', '$phone', '$email', '$username', '$pass_salt', '0', '$country', '$ip')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
	}*/

    public function change_password($user_code, $old_password, $new_password)
    {

        global $db_handle;
        $query = "SELECT password FROM admin WHERE email = '$email_address' OR user_code = '$user_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        //return $result;
        if ($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $password = $user[0]['password'];
            $pwdver = verify($old_password, $password);
            if ($pwdver == 1) {
                $pass_salt = generateHash($new_password);
                $query = "UPDATE user SET password = '$pass_salt' WHERE user_code = '$user_code' LIMIT 1";
                $db_handle->runQuery($query);

                return $db_handle->affectedRows() > 0 ? true : false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function user_list()
    {
        global $db_handle;

        $query = "SELECT us.*, groups.name AS group_name
                FROM user AS us
				LEFT JOIN groups AS groups ON us.group_id=groups.id 
				ORDER BY us.id DESC ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $user_list = $fetched_data;

        return $user_list;
    }



    public function delete_user($user_code)
    {
        global $db_handle;

        $query = "INSERT INTO deleted_users select * from users where user_code = '$user_code';";
        $result = $db_handle->runQuery($query);

        $query1 = "DELETE FROM users where user_code = '$user_code'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function del_event($event_id)
    {
        global $db_handle;

        $query = "INSERT INTO deleted_events select * from events where event_id = '$event_id';";
        $result = $db_handle->runQuery($query);

        $query1 = "DELETE FROM events where event_id = '$event_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
    public function del_event_pricing($plan_id)
    {
        global $db_handle;
        $query1 = "DELETE FROM event_provider_plans where plan_id = '$plan_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
    public function del_recruiter_pricing($plan_id)
    {
        global $db_handle;
        $query1 = "DELETE FROM recruting_plans where plan_id = '$plan_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function del_content($content_id)
    {
        global $db_handle;

        $query = "INSERT INTO deleted_content select * from content where event_id = '$event_id';";
        $result = $db_handle->runQuery($query);

        $query1 = "DELETE FROM content where event_id = '$event_id'";
        $result1 = $db_handle->runQuery($query1);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function email_is_duplicate($email)
    {
        // Check whether the email address is existing
        global $db_handle;

        $query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
    }

    public function update_user_status($user_code, $user_status)
    {
        global $db_handle;

        $query = "UPDATE users SET status = '$user_status' WHERE user_code = '$user_code' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    //modify a column in a table
    public function modify_val($user_code, $column, $newvariable, $table)
    {
        global $db_handle;
        $query = "UPDATE $table SET $column='$newvariable' WHERE user_code = '$user_code'";
        $db_handle->runQuery($query);
    }

    public function get_user_by_code($user_code)
    {
        global $db_handle;

        $query = "SELECT * FROM users WHERE user_code = '$user_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        if ($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }

    public function get_user_by_username($username)
    {
        global $db_handle;

        $query = "SELECT * FROM users WHERE username = '$username' OR user_code = '$username' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }

    public function get_user_by_email($email)
    {
        global $db_handle;

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }

    function curPageName()
    {
        return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    }


    public function get_user_pic($user_code, $type = NULL, $height = NULL, $width = '', $user_image = '', $userprofile = '')
    {
        //get registration details for a particular person in one year
        global $db_handle;

        if ($type == 'student') {
            $query = "SELECT photo,user_code FROM student where studentID = '$user_code' OR user_code='$user_code'";
            $result = $db_handle->runQuery($query);
            $fetched_data = $db_handle->fetchAssoc($result);
            $profile_pic = $fetched_data[0]['photo'];
            $sex = $fetched_data[0]["sex"];
            $user_code = $fetched_data[0]["user_code"];
        }

        if ($sex == 'female') {
            $avatar = 'user-female.png';
        } else {
            $avatar = 'user-male.png';
        }

        if ($profile_pic == "" || $profile_pic == 'defualt.png') {
            $pic = "<img src='../uploads/default.png' class='img-responsive img-circle' width='$width' height='$height'>";
            if ($user_image == '1') {
                $pic = "<img src='../uploads/default.png' class='img-responsive img-circle'>";
            }
            if ($userprofile == '1') {
                $pic = "<img src='../uploads/defualt.png' alt='user_auth' class='user-img img-circle' width='$width'>";
            }
        } else {
            $pic = "<img src='../uploads/student/$user_code/images/$profile_pic' alt='user_auth' class='user-auth-img img-circle' width='$width'>";
            if ($user_image == '1') {
                $pic = "<img src='../uploads/student/$user_code/images/$profile_pic' alt='user_auth' class='img-responsive img-circle' width='$width'>";
            }
            if ($userprofile == '1') {
                $pic = "<img src='../uploads/student/$user_code/images/$profile_pic' alt='user_auth' class='user-img img-circle' width='$width'>";
            }
        }

        return $pic ? $pic : 0;
    }

    public function update_profile_pic($user_code, $userprofile = '')
    {
        global $db_handle;
        $query = "UPDATE users SET profile_pic = '$userprofile' WHERE user_code = '$user_code' LIMIT 1";
        $db_handle->runQuery($query);
        return true;
    }

    public function get_site_setting()
    {
        global $db_handle;

        $query = "SELECT * FROM setting WHERE sno=0";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $details = $fetched_data[0];

        return $details ? $details : false;
    }


    // add a inbox message
    public function add_notification($subject, $message)
    {
        global $db_handle;

        $query = "INSERT INTO notifications (subject, message, read_status) VALUES ('$subject', '$message', '0')";
        $db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;
    }

    // Get user notifications
    public function get_notifications($not_id)
    {
        global $db_handle;
        if ($not_id != "") {
            $query = "SELECT * FROM notifications WHERE id='$not_id'";
        } else {
            $query = "SELECT * FROM notifications";
        }
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        $fetched_data = $fetched_data[0];
        return $fetched_data ? $fetched_data : false;
    }

    // add a inbox message
    public function add_inbox_message($user_code, $token, $message)
    {
        global $db_handle;

        $query = "INSERT INTO inbox (user_code, transid, message, read_status) VALUES ('$user_code', '$token', '$message', '0')";
        $db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;
    }

    // Get user inbox
    public function get_inbox($user_code, $inbox_id)
    {
        global $db_handle;
        if ($not_id != "") {
            $query = "SELECT * FROM inbox WHERE user_code='$user_code' AND inbox_id='$inbox_id'";
        } else {
            $query = "SELECT * FROM inbox WHERE user_code='$user_code'";
        }
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        // $fetched_data = $fetched_data[0];
        return $fetched_data ? $fetched_data : false;
    }

    public function get_desktop_notifications($user_code)
    {
        global $db_handle;
        $query = "SELECT * FROM notifications WHERE NOT FIND_IN_SET('$user_code', user_read)";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function marked_as_read_desktop_notifications($user_code, $notify_id)
    {
        global $db_handle;
        $user_read = $this->get_notifications($notify_id)['user_read'];
        if ($user_read == "") {
            $new_user_read = $user_code;
        } else {
            $new_user_read = $user_read . ',' . $user_code;
        }
        $query = "UPDATE notifications SET user_read='$new_user_read' WHERE id = '$notify_id'";
        $db_handle->runQuery($query);
    }

    public function get_unread_inbox($user_code, $limit)
    {
        global $db_handle;
        if ($limit != "") {
            $query = "SELECT * FROM inbox WHERE user_code='$user_code' AND read_status='0' order by inbox_id DESC LIMIT $limit";
        } else {
            $query = "SELECT * FROM inbox WHERE user_code='$user_code' WHERE read_status='0'";
        }
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        // $fetched_data = $fetched_data[0];
        return $fetched_data ? $fetched_data : false;
    }

    public function get_number_of_unread_inbox($user_code)
    {
        global $db_handle;
        $val = $db_handle->numRows("SELECT * FROM inbox WHERE user_code='$user_code' AND read_status='0'");
        return $val ? $val : 0;
    }

    public function get_all_payments($user_code = NULL)
    {
        global $db_handle;

        if ($user_code != "") {
            $query = "SELECT * FROM payments WHERE username='$user_code' order by paymentID DESC";
        } else {
            $query = "SELECT * FROM payments order by paymentID DESC";
        }
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $syllabus = $db_handle->fetchAssoc($result);
            return $syllabus;
        } else {
            return false;
        }
    }

    public function get_all_courses($limit = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($limit)) {
            $con .= "ORDER BY course_id DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY course_id DESC ";
        }
        $query = "SELECT * FROM courses $con";
        $result = $db_handle->runQuery($query);
        $categories = $db_handle->fetchAssoc($result);
        return $categories;
    }

    public function get_course_by_id($course_id = NULL)
    {
        global $db_handle;
        $con = "";

        $query = "SELECT cous.*, coul.location_id, coul.location_name, couc.type_name, couca.category_name, cousca.category_name AS sub_category_name, cou_sls.sl_name AS study_level_name, 
		cosmm.cs_method AS study_method_name, coule.institute_name FROM courses cous
        INNER JOIN course_locations coul ON cous.location=coul.location_id
		INNER JOIN course_study_methods cosmm ON cous.study_method=cosmm.csm_id
		INNER JOIN study_levels cou_sls ON cous.study_level=cou_sls.sl_id
		INNER JOIN course_types couc ON cous.course_type=couc.type_id
		INNER JOIN institutions coule ON cous.course_institute=coule.institute_id
		INNER JOIN course_categories couca ON cous.course_category=couca.category_id
		INNER JOIN course_sub_categories cousca ON cous.course_subcategory=cousca.subcat_id
		WHERE cous.course_id='$course_id' ";
        $result = $db_handle->runQuery($query);
        $course = $db_handle->fetchAssoc($result);

        return $course[0];
    }

    public function get_popular_course_categories($limit = NULL)
    {
        global $db_handle;

        if (!empty($limit)) {
            $con .= "ORDER BY views DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY views DESC";
        }
        $query = "SELECT * FROM course_categories $con";
        $result = $db_handle->runQuery($query);
        $categories = $db_handle->fetchAssoc($result);
        return $categories;
    }

    public function get_course_types($limit = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($limit)) {
            $con .= "ORDER BY review_count DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY review_count DESC";
        }
        $query = "SELECT * FROM course_types $con";
        $result = $db_handle->runQuery($query);
        $categories = $db_handle->fetchAssoc($result);
        return $categories;
    }

    public function get_popular_viewed_job_types($limit = NULL, $time_frame = NULL)
    {  //time frame in days
        global $db_handle;
        $con = "";

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbt.jobtype_id, jbt.jobtype_name FROM job_views jbv
        INNER JOIN job_types jbt ON jbv.job_type=jbt.jobtype_id $con";

        $result = $db_handle->runQuery($query);
        $job_types = $db_handle->fetchAssoc($result);
        return $job_types;
    }

    public function show_popular_viewed_job_types($limit = NULL, $time_frame = NULL)
    {
        global $db_handle;
        usercode: $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbt.jobtype_id, jbt.jobtype_name FROM job_views jbv
        INNER JOIN job_types jbt ON jbv.job_type=jbt.jobtype_id $con";

        $result = $db_handle->runQuery($query);

        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        if ($num_Cat < 1) {
            $time_frame++;
            goto usercode;
        }
        $fnum_cat = $num_Cat % 4; //divide into the 4 columns
        $cat_count = 0;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {

                $jobtype_id = $row['jobtype_id'];
                $jobtype_name = $row['jobtype_name'];
                $cat_info .= "<div class=\"pt-sm-1  course-item\">
								<div class=\"content-title\"><a href=\"job_type?sid=$jobtype_id\">$jobtype_name</a></div> 
							</div>";
                if ($cat_count % 3 == 2 && $cat_count != $num_Cat) {
                    $cat_info .= "</div><div class=\"grid-col grid-col-3\">";
                } elseif ($cat_count == $num_Cat) {
                    $cat_info .= "</div>";
                }
                $cat_count++;
            }
        }

        return $cat_info;
    }

    public function get_num_popular_viewed_job_types($limit = NULL, $time_frame = NULL)
    {  //time frame in days
        global $db_handle;
        $con = "";

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_type ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbt.jobtype_id, jbt.jobtype_name FROM job_views jbv
        INNER JOIN job_types jbt ON jbv.job_type=jbt.jobtype_id $con";

        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result);
        return $num_Cat;
    }

    public function get_popular_reviewed_job_types($limit = NULL, $time_frame = NULL)
    {
        global $db_handle;
        $con = "";
        $now = date('Y-m-d H:i:s');
        $initial_time = date('Y-m-d H:i:s', time() - $time_frame);
        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE job_types.timestamp BETWEEN '$initial_time' AND '$now' " : "";
        if (!empty($limit)) {
            $con .= "GROUP BY job_types.review_count DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY job_types.review_count DESC";
        }
        $query = "SELECT job_types.* FROM job_types  $con";
        $result = $db_handle->runQuery($query);
        $job_types = $db_handle->fetchAssoc($result);
        return $job_types;
    }

    public function show_top_job_companies($limit = NULL, $time_frame = NULL)
    {
        global $db_handle;

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_company ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_company ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbc.company_id, jbc.company_name, jbc.company_img FROM job_views jbv
        INNER JOIN job_companies jbc ON jbv.job_company=jbc.company_id $con";

        $result = $db_handle->runQuery($query);
        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-row\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $company_img =  $row['company_img'];
                $company_id =  $row['company_id'];
                $company_name =  $row['company_name'];
                $cat_info .= "<div class=\"pb-sm-4 grid-col grid-col-4 job-sector\">
									<div class=\"course-item\">
										<div class=\"jobcompany_div\">
											<a href=\"job_company?seid=$company_id\">
                                                <img class=\"jobcompany_img\" src=\"img/job_companies/$company_img\" data-at2x=\"img/job_companies/$company_img\" alt>
											</a>
										</div>
										<div class=\"course-name clear-fix\">
											<h3><a href=\"job_company?seid=$company_id\">Jobs at $company_name</a></h3>
										</div>
									</div>
								</div>";
            }
        }

        $cat_info .= "</div>";

        return $cat_info;
    }

    public function show_top_job_sectors($limit = NULL, $time_frame = NULL)
    {
        global $db_handle;

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_sector ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_sector ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name, jbc.sector_img FROM job_views jbv
        INNER JOIN job_sectors jbc ON jbv.job_sector=jbc.sector_id $con";

        $result = $db_handle->runQuery($query);
        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-row\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $sector_img =  $row['sector_img'];
                $sector_name =  $row['sector_name'];
                $sector_id =  $row['sector_id'];
                $cat_info .= "<div class=\"pb-sm-4 grid-col grid-col-3 job-sector container_hover\">
									<div class=\"course-item \">
										<div class=\"box4image \">
                                            <div class=\"text\">
                                                <h5><a href=\"job_sector?seid=$sector_id\">$sector_name jobs</a></h5>
                                            </div>
                                            <div class=\"middle_hover\">
                                                <div class=\"text_hover\"></div>
                                              </div>
											<img class=\"image_hover\" src=\"img/job_sectors/$sector_img\" data-at2x=\"img/job_sectors/$sector_img\" alt>
											<div class=\"hover-bg bg-color-1\"></div>

										</div>
									</div>
								</div>";
            }
        }

        $cat_info .= "</div>";

        return $cat_info;
    }

    public function show_top_job_sector_list($start_limit = NULL, $end_limit = NULL, $time_frame = NULL)
    {
        global $db_handle;

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($start_limit) && !empty($end_limit)) {
            $con .= "GROUP BY jbv.job_sector ORDER BY jbv.view_id DESC LIMIT $start_limit, $end_limit";
        } else {
            $con .= "GROUP BY jbv.job_sector ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name, jbc.sector_img FROM job_views jbv
        INNER JOIN job_sectors jbc ON jbv.job_company=jbc.sector_id $con";

        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        $fnum_cat = $num_Cat % 4; //divide into the 4 columns
        $cat_count = 0;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {

                $sector_id = $row['sector_id'];
                $sector_name = $row['sector_name'];
                $cat_info .= "<div class=\"pt-sm-1  course-item\">
								<div class=\"content-title\"><a href=\"job_type?sid=$sector_id\">$sector_name jobs</a></div> 
							</div>";
                if ($cat_count % 3 == 2 && $cat_count != $num_Cat) {
                    $cat_info .= "</div><div class=\"grid-col grid-col-3\">";
                } elseif ($cat_count == $num_Cat) {
                    $cat_info .= "</div>";
                }
                $cat_count++;
            }
        }
        return $cat_info;
    }

    public function show_top_local_jobs($limit = NULL, $time_frame = NULL)
    {
        global $db_handle;

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($limit)) {
            $con .= "GROUP BY jbv.job_location ORDER BY jbv.view_id DESC LIMIT $limit";
        } else {
            $con .= "GROUP BY jbv.job_location ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbc.location_id, jbc.location_name, jbc.location_img FROM job_views jbv
        INNER JOIN job_locations jbc ON jbv.job_location=jbc.location_id $con";

        $result = $db_handle->runQuery($query);
        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-row\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $location_img =  $row['location_img'];
                $location_name =  $row['location_name'];
                $location_id =  $row['location_id'];
                $cat_info .= "<div class=\"pb-sm-4 grid-col grid-col-3 job-sector container_hover\">
									<div class=\"course-item \">
										<div class=\"box4image \">
                                            <div class=\"text\">
                                                <h5><a href=\"job_location?seid=$location_id\">Jobs in $location_name</a></h5>
                                            </div>
                                            <div class=\"middle_hover\">
                                                <div class=\"text_hover\"></div>
                                              </div>
											<img class=\"image_hover\" src=\"img/job_locations/$location_img\" data-at2x=\"img/job_locations/$location_img\" alt>
											<div class=\"hover-bg bg-color-1\"></div>

										</div>
									</div>
								</div>";
            }
        }

        $cat_info .= "</div>";

        return $cat_info;
    }

    public function show_top_job_location_list($start_limit = NULL, $end_limit = NULL, $time_frame = NULL)
    {
        global $db_handle;

        $con = (!empty($time_frame) && ($time_frame != 'NULL')) ? " WHERE jbv.timestamp > DATE_SUB(CURDATE(), INTERVAL $time_frame DAY) " : "";

        if (!empty($start_limit) && !empty($end_limit)) {
            $con .= "GROUP BY jbv.job_location ORDER BY jbv.view_id DESC LIMIT $start_limit, $end_limit";
        } else {
            $con .= "GROUP BY jbv.job_location ORDER BY jbv.view_id DESC";
        }
        $query = "SELECT jbv.*, jbc.location_id, jbc.location_name, jbc.location_img FROM job_views jbv
        INNER JOIN job_locations jbc ON jbv.job_location=jbc.location_id $con";

        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        $fnum_cat = $num_Cat % 4; //divide into the 4 columns
        $cat_count = 0;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {

                $location_id = $row['location_id'];
                $location_name = $row['location_name'];
                $cat_info .= "<div class=\"pt-sm-1  course-item\">
								<div class=\"content-title\"><a href=\"job_location?seid=$location_id\">Jobs in $location_name</a></div> 
							</div>";
                if ($cat_count % 3 == 2 && $cat_count != $num_Cat) {
                    $cat_info .= "</div><div class=\"grid-col grid-col-3\">";
                } elseif ($cat_count == $num_Cat) {
                    $cat_info .= "</div>";
                }
                $cat_count++;
            }
        }
        return $cat_info;
    }

    public function show_job_cat_hompage()
    {
        global $db_handle;

        $query = "SELECT * FROM job_categories";
        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        $fnum_cat = $num_Cat / 4; //divide into the 4 columns
        $cat_count = 0;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                $cat_count++;
                $cat_info .= "<div class=\"pb-sm-4  course-item\">
								<div class=\"content-title\"><a href=\"#myModal\" class=\"\" data-toggle=\"modal\" data-id=\"$category_id\">$category_name</a></div> 
							</div>";
                if ($num_Cat % $fnum_cat == 1 && $cat_count != $num_Cat) {
                    $cat_info .= "</div><div class=\"grid-col grid-col-3\">";
                } elseif ($cat_count == $num_Cat) {
                    $cat_info .= "</div>";
                }
            }
        }

        return $cat_info;
    }

    public function show_job_subcat_modal($category_id)
    {
        global $db_handle;

        $query = "SELECT * FROM job_sub_categories where category_parent='$category_id'";
        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        $fnum_cat = $num_Cat / 4; //divide into the 4 columns
        $cat_count = 1;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $subcat_id = $row['subcat_id'];
                $category_name = $row['category_name'];
                $cat_count++;
                $cat_info .= "<div style=\"height:50px;\" class=\"pb-sm-2  course-item\">
								<div class=\"content-title\"><a href=\"job_category?sid=$subcat_id\">$category_name</a></div> 
							</div>";
                if ($num_Cat > 1) {
                    if ($num_Cat % $fnum_cat == 1 && $cat_count != $num_Cat) {
                        $cat_info .= "</div><div class=\"grid-col grid-col-3\">";
                    } elseif ($cat_count == $num_Cat) {
                        $cat_info .= "</div>";
                    }
                } else {
                    $cat_info .= "</div>";
                }
            }
        }

        return $cat_info;
    }

    public function get_job_sector($limit = NULL)
    {
        global $db_handle;
        $con = "";
        if (!empty($limit)) {
            $con .= "ORDER BY sector_name DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY sector_name DESC";
        }
        $query = "SELECT * FROM job_sectors $con";
        $result = $db_handle->runQuery($query);

        $job_sector = $db_handle->fetchAssoc($result);
        return $job_sector;
    }

    public function get_job_categories($limit = NULL)
    {
        global $db_handle;
        $con = "";
        if (!empty($limit)) {
            $con .= "ORDER BY category_name DESC LIMIT $limit";
        } else {
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
    public function get_job_sub_categories($parent_id = NULL, $limit = NULL)
    {
        global $db_handle;
        if (!empty($parent_id)) {
            $con .= " WHERE category_parent='$parent_id' ";
        }
        if (!empty($limit)) {
            $con .= "ORDER BY category_name DESC LIMIT $limit ";
        } else {
            $con .= "ORDER BY category_name DESC ";
        }

        $query = "SELECT * FROM job_sub_categories $con";
        $result = $db_handle->runQuery($query);

        $job_categories = $db_handle->fetchAssoc($result);
        return $job_categories;
    }

    // add a course
    public function add_course($course_title = NULL, $course_img = NULL, $study_method = NULL, $course_category = NULL, $course_subcategory = NULL, $course_fee = NULL, $fee_period = NULL, $course_currency = NULL, $course_institute = NULL,  $course_type = NULL, $duration = NULL, $entry_requirements = NULL, $location = NULL, $course_overview = NULL, $description = NULL, $apply_info = NULL, $who_is_course_for = NULL, $career_path = NULL, $couprov_code = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO courses (course_title, course_img, study_method, course_category, course_subcategory, course_fee, duration, course_type, entry_requirements, location, course_overview, description, who_is_course_for, career_path, fee_period, course_currency, course_institute, apply_info, couprov_code) VALUES ('$course_title', '$course_img', '$study_method', '$course_category', '$course_subcategory', '$course_fee', '$duration', '$course_type', '$entry_requirements', '$location', '$course_overview', '$description', '$who_is_course_for', '$career_path', '$fee_period', '$course_currency', '$course_institute', '$apply_info', '$couprov_code')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function edit_course($course_id, $course_title = NULL, $course_img = NULL, $study_method = NULL, $study_level = NULL, $course_category = NULL, $course_subcategory = NULL, $course_fee = NULL, $course_type = NULL, $duration = NULL, $entry_requirements = NULL, $location = NULL, $country = NULL, $course_overview = NULL, $description = NULL, $who_is_course_for = NULL, $career_path = NULL, $admin = NULL)
    {

        global $db_handle;
        if (empty($course_img)) {
            $query = "UPDATE courses SET course_title = '$course_title', study_method = '$study_method', study_level = '$study_level', course_category = '$course_category', course_subcategory = '$course_subcategory', course_fee = '$course_fee', course_type = '$course_type', duration = '$duration', entry_requirements = '$entry_requirements', location = '$location', country = '$country', course_overview = '$course_overview', description = '$description', who_is_course_for = '$who_is_course_for', admin_id = '$admin'  WHERE course_id = '$course_id'";
        } else {
            $query = "UPDATE courses SET course_title = '$course_title', course_img = '$course_img', study_method = '$study_method', study_level = '$study_level', course_category = '$course_category', course_subcategory = '$course_subcategory', course_fee = '$course_fee', course_type = '$course_type', duration = '$duration', qualification = '$qualification', location = '$location', country = '$country', course_overview = '$course_overview', description = '$description', who_is_course_for = '$who_is_course_for', admin_id = '$admin'  WHERE course_id = '$course_id'";
        }
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function get_course_category_by_courseid($course_id)
    {
        global $db_handle;
        $con = "";
        $query = "SELECT * FROM course_categories WHERE course_id='$course_id' ";
        $result = $db_handle->runQuery($query);

        $course = $db_handle->fetchAssoc($result);
        return $course;
    }

    public function get_similar_courses($limit = NULL)
    {
        global $db_handle;
        $con = "";
        if (!empty($limit)) {
            $con .= "ORDER BY RAND() DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY RAND() DESC";
        }

        $query = "SELECT cou.*, jc.category_name, jsc.category_name, co.country_name, inst.institute_name AS course_institution, stm.cs_method AS course_method FROM courses cou 
	INNER JOIN countries co ON cou.country=co.country_id 
	INNER JOIN course_categories jc ON cou.course_category=jc.category_id 
	INNER JOIN course_sub_categories jsc ON cou.course_subcategory=jsc.subcat_id 
		INNER JOIN institutions inst ON cou.course_institute=inst.institute_id 
		INNER JOIN course_study_methods stm ON cou.study_method=stm.csm_id $con";

        $result = $db_handle->runQuery($query);
        $courses = $db_handle->fetchAssoc($result);

        return $courses;
    }

    public function get_course_categories($limit = NULL)
    {
        global $db_handle;
        $con = "";
        if (!empty($limit)) {
            $con .= "ORDER BY category_name DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY category_name DESC";
        }
        $query = "SELECT * FROM course_categories $con";
        $result = $db_handle->runQuery($query);

        $course_categories = $db_handle->fetchAssoc($result);
        return $course_categories;
    }

    public function get_course_sub_categories($category_id = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = "";
        if (!empty($category_id)) {
            $con .= "WHERE category_parent='$category_id' ";
        }
        if (!empty($limit)) {
            $con .= "ORDER BY category_name DESC LIMIT $limit";
        } else {
            $con .= "ORDER BY category_name DESC";
        }
        $query = "SELECT * FROM course_sub_categories $con";
        $result = $db_handle->runQuery($query);

        $course_categories = $db_handle->fetchAssoc($result);
        return $course_categories;
    }

    public function show_cou_subcat_modal($category_id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_sub_categories where category_parent='$category_id'";
        $result = $db_handle->runQuery($query);
        $num_Cat = $db_handle->numOfRows($result); //get the no of job categories
        $fnum_cat = $num_Cat / 4; //divide into the 4 columns
        $cat_count = 1;

        $content = $db_handle->fetchAssoc($result);
        $cat_info = "<div class=\"grid-col grid-col-3\">";
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $subcat_id = $row['subcat_id'];
                $category_name = $row['category_name'];
                $cat_count++;

                $cat_info .= "<div style=\"height:20px;\" class=\"pb-sm-2  course-item\">
								<div class=\"content-title\"><a href=\"course_sub_category?sid=$subcat_id\">$category_name</a></div> 
							</div>";
            }
            $cat_info .= "</div>";
        }

        return $cat_info;
    }


    public function add_course_subcategory($course_category = NULL, $course_subcategory = NULL, $course_cat_img = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO course_sub_categories (category_parent, category_name, course_cat_img, admin_id) VALUES ('$course_category', '$course_subcategory', '$course_cat_img', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function add_course_category($course_category = NULL, $course_cat_img = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO course_categories (category_name, course_cat_img, admin_id) VALUES ('$course_category', '$course_cat_img', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function edit_course_category($token_id, $course_category = NULL, $course_cat_img = NULL, $admin = NULL)
    {

        global $db_handle;
        $query = "UPDATE course_categories SET course_category = '$course_category', course_cat_img = '$course_cat_img', admin_id = '$admin'  WHERE category_id = '$token_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function edit_course_subcategory($token_id, $course_category = NULL, $course_subcategory = NULL, $course_cat_img = NULL, $admin = NULL)
    {

        global $db_handle;
        $query = "UPDATE course_sub_categories SET category_parent = '$course_category', category_name = '$course_subcategory', course_subcategory = '$course_subcategory', course_cat_img = '$course_cat_img', admin_id = '$admin'  WHERE subcat_id = '$token_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function get_content_by_id($id)
    {
        global $db_handle;

        $query = "SELECT * FROM content WHERE id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }

    public function get_course_review_by_id($id)
    {
        global $db_handle;

        $query = "SELECT * FROM course_reviews WHERE review_id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }

    public function add_course_type($course_type = NULL, $course_cat_img = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO course_types (type_name, type_img, admin_id) VALUES ('$course_type', '$course_cat_img', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function edit_course_type($token_id, $course_category = NULL, $course_cat_img = NULL, $admin = NULL)
    {

        global $db_handle;
        $query = "UPDATE course_types SET course_type = '$course_type', type_img = '$course_cat_img', admin_id = '$admin'  WHERE type_id = '$token_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function get_currency_info($currency_code)
    {
        global $db_handle;

        $query = "SELECT * FROM currencies WHERE (currency_code='$currency_code' OR currency_id='$currency_code' OR currency_symbol='$currency_code') ORDER by currency_id LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

    public function get_testimonials()
    {
        global $db_handle;

        $query = "SELECT * FROM testimonials ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data;

        return $info ? $info : false;
    }

    public function get_testi_by_id($id)
    {
        global $db_handle;

        $query = "SELECT * FROM testimonials WHERE testi_id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }

    public function get_team_by_id($id)
    {
        global $db_handle;

        $query = "SELECT * FROM team_members WHERE team_id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }

    public function get_content_by_page_location($page, $loc)
    {
        global $db_handle;

        $query = "SELECT * FROM content WHERE page_name = '$page' AND page_location = '$loc' ORDER by id DESC LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0]['info'];

        return $info ? $info : false;
    }

    public function get_page_info_by_id($page_id)
    {
        global $db_handle;

        $query = "SELECT * FROM site_pages WHERE page_name = '$page_id' OR page_id = '$page_id'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result)[0];

        return $fetched_data ? $fetched_data : false;
    }
    public function get_page_name()
    {
        global $db_handle;

        $query = "SELECT * FROM site_pages WHERE status = '1' GROUP by page_name ORDER by page_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function get_service_page_name()
    {
        global $db_handle;

        $query = "SELECT * FROM services_page WHERE status = '1' GROUP by page_name ORDER by page_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
    public function get_category_name()
    {
        global $db_handle;

        $query = "SELECT * FROM news_categories ORDER by cat_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function get_page_location($page_category = NULL)
    {
        global $db_handle;
        $con .= !empty($page_category) ? " AND page_category='$page_category' " : " ";
        $con .= " GROUP by page_location ORDER BY page_id";

        $query = "SELECT * FROM pageslocation WHERE status = '1' $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function get_page_info($page_name)
    {
        global $db_handle;

        $query = "SELECT * FROM pageslocation WHERE status = '1' AND (page_name='$page_name' OR page_id='$page_name') ORDER by page_id LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

    public function get_service_info($page_id)
    {
        global $db_handle;

        $query = "SELECT * FROM services WHERE (id='$page_id' OR page_id='$page_id') ORDER by page_id LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

    public function set_user_credential($user_code, $passport, $idcard, $signature)
    {
        global $db_handle;

        $query = "INSERT INTO user_credential (user_code, file_name, file_category) VALUES "
            . "('$user_code', '$passport', '1'), "
            . "('$user_code', '$idcard', '2'), "
            . "('$user_code', '$signature', '3')";
        $db_handle->runQuery($query);
        return true;
    }

    public function uploadslider($title, $slider, $excerpts)
    {
        global $db_handle;

        $query = "INSERT INTO sliderpix(title,picture,excerpts) VALUES ('$title','$slider','$excerpts')";
        $db_handle->runQuery($query);
        return true;
    }

    public function uploadgallery($title, $image, $excerpts)
    {
        global $db_handle;

        $query = "INSERT INTO gallery(title,picture,excerpts) VALUES ('$title','$image','$excerpts')";
        $db_handle->runQuery($query);
        return true;
    }

    public function uploadvideo($title, $video, $excerpts)
    {
        global $db_handle;

        $query = "INSERT INTO videos(adminname,title,video,description) VALUES ('$adminname','$title','$video','$excerpts')";
        $db_handle->runQuery($query);
        return true;
    }

    public function uploadcontent($page_name, $page_location, $title, $postedValue, $entrydate)
    {
        global $db_handle;

        $query = "INSERT INTO content(page_name,page_location,title,info,entrydate) VALUES ('$page_name','$page_location','$title','$postedValue','$entrydate')";
        $db_handle->runQuery($query);
        return 'Content was successfully uploaded';
    }

    public function add_course_location($location, $gallery = NULL, $state_id = NULL, $country_id = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO course_locations (location_name, location_img,  state_id, country_id, admin_id) VALUES ('$location', '$gallery', '$state_id', '$country_id', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function add_job_location($location, $gallery = NULL, $state_id = NULL, $country_id = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO job_locations (location_name, location_img, state_id, country_id, admin_id) VALUES ('$location', '$gallery', '$state_id', '$country_id', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function update_course_location($location_id, $gallery, $location_name, $state_id, $country_id, $admin_id = NULL)
    {

        global $db_handle;
        $query = "UPDATE course_locations SET location_name = '$location_name',  location_img = '$gallery', state_id = '$state_id', country_id = '$country_id', admin_id = '$admin_id'  WHERE location_id = '$location_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
    public function update_course_pricing($plan_id, $plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {

        global $db_handle;
        $query = "UPDATE course_provider_plans SET plan_name = '$plan_name', plan_cost = '$plan_cost', plan_discount_cost = '$plan_discount_cost', plan_discount_cost = '$plan_discount_cost', plan_currency = '$plan_currency', plan_image = '$plan_image', plan_image = '$plan_image', plan_period = '$plan_period',highlights = '$highlights', description = '$description'   WHERE plan_id = '$plan_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
    public function update_job_location($location_id, $gallery, $location_name, $state_id, $country_id, $admin_id = NULL)
    {

        global $db_handle;
        $query = "UPDATE job_locations SET location_name = '$location_name', location_img = '$gallery', state_id = '$state_id', country_id = '$country_id', admin_id = '$admin_id'  WHERE location_id = '$location_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function manage_job_locations($state_id = NULL, $country_id = NULL, $limit = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($state_id) ? " AND state_id = '$state_id' " : " ";
        } else {
            $con .= !empty($state_id) ? " WHERE state_id = '$state_id' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($country_id) ? " AND country_id = '$country_id' " : " ";
        } else {
            $con .= !empty($country_id) ? " WHERE country_id = '$country_id' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY location_id DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY location_id DESC";
        }
        $query = "SELECT * FROM job_locations $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function add_state($state, $country_id, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO states (state_name, country_id, admin_id) VALUES ('$state', '$country_id', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function update_state($state_id, $state_name, $country_id, $admin_id = NULL)
    {

        global $db_handle;
        $query = "UPDATE states SET state_name = '$state_name', country_id = '$country_id', admin_id = '$admin_id'  WHERE state_id = '$state_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function manage_states($state_id = NULL, $country_id = NULL, $limit = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($state_id) ? " AND state_id = '$state_id' " : " ";
        } else {
            $con .= !empty($state_id) ? " WHERE state_id = '$state_id' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($country_id) ? " AND country_id = '$country_id' " : " ";
        } else {
            $con .= !empty($country_id) ? " WHERE country_id = '$country_id' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY state_id DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY state_id DESC";
        }
        $query = "SELECT * FROM states $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function add_institution($institution = NULL, $location = NULL, $state_id = NULL, $country_id = NULL, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO institutions (institute_name, location_id, state_id, country_id, admin_id) VALUES ('$institution', '$location', '$state_id', '$country_id', '$admin_id')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function update_institution($institution_id, $institution_name, $location_id, $state_id, $country_id, $admin_id = NULL)
    {

        global $db_handle;
        $query = "UPDATE institutions SET institution_name = '$institution_name', location_id = '$location_id', state_id = '$state_id', country_id = '$country_id', admin_id = '$admin_id'  WHERE institution_id = '$institution_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function manage_institutions($location_id = NULL, $state_id = NULL, $country_id = NULL, $limit = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($location_id) ? " AND location_id = '$location_id' " : " ";
        } else {
            $con .= !empty($location_id) ? " WHERE location_id = '$location_id' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($state_id) ? " AND state_id = '$state_id' " : " ";
        } else {
            $con .= !empty($state_id) ? " WHERE state_id = '$state_id' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($country_id) ? " AND country_id = '$country_id' " : " ";
        } else {
            $con .= !empty($country_id) ? " WHERE country_id = '$country_id' " : " ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY institute_id DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY institute_id DESC";
        }
        $query = "SELECT * FROM institutions $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_all_institutions($limit = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM institutions ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function add_event($event_title = NULL, $event_type = NULL, $event_img = NULL, $event_author = NULL, $startDate = NULL, $endDate = NULL, $startTime = NULL, $endTime = NULL, $location = NULL, $summary = NULL, $content = NULL, $event_provider = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO events (event_title, event_type, event_img, event_author, startDate, endDate, startTime, endTime, event_location, event_summary, event_description, event_prov_code) VALUES
            ('$event_title', '$event_type', '$event_img', '$event_author', '$startDate', '$endDate', '$startTime', '$endTime', '$location', '$summary', '$content', '$event_provider')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function get_event_detail($event_id)
    {
        global $db_handle;

        $query = "SELECT us.* FROM events AS us WHERE us.event_id='$event_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $desi_det = $fetched_data[0];

        return $desi_det;
    }
    public function get_event_pricing_detail($plan_id)
    {
        global $db_handle;
        $query = "SELECT * FROM event_provider_plans WHERE plan_id='$plan_id' ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $desi_det = $fetched_data[0];

        return $desi_det;
    }
    public function update_event($event_id, $event_title, $event_img, $event_author, $startDate, $endDate, $location, $summary, $content = NULL, $admin = NULL)
    {

        global $db_handle;
        $query = "UPDATE user SET event_title = '$event_title', event_img = '$event_img', event_author = '$event_author', startDate = '$startDate', endDate = '$endDate', event_location = '$location', event_summary = '$summary', event_description = '$content'  WHERE event_id = '$event_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
    public function update_event_pricing($plan_id, $plan_name, $plan_cost, $plan_discount_cost, $plan_currency, $plan_image, $plan_period, $highlights, $description)
    {

        global $db_handle;
        $query = "UPDATE event_provider_plans SET plan_name = '$plan_name', plan_cost = '$plan_cost', plan_discount_cost = '$plan_discount_cost', plan_discount_cost = '$plan_discount_cost', plan_currency = '$plan_currency', plan_image = '$plan_image', plan_image = '$plan_image', plan_period = '$plan_period',highlights = '$highlights', description = '$description'   WHERE plan_id = '$plan_id'";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }

    public function upcoming_events($current_date, $limit = NULL, $random = '1', $event_provider = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } elseif (!empty($limit) && $random == '0') {
            $con .= " ORDER BY event_id DESC LIMIT $limit";
        } elseif (empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() ";
        } else {
            $con .= " ORDER BY event_id DESC";
        }
        $query = "SELECT * FROM events  WHERE endDate>='$current_date' $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function upcoming_events_query($current_date, $limit = NULL, $random = '1', $event_provider = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } elseif (!empty($limit) && $random == '0') {
            $con .= " ORDER BY event_id DESC LIMIT $limit";
        } elseif (empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() ";
        } else {
            $con .= " ORDER BY event_id DESC";
        }
        $query = "SELECT * FROM events  WHERE endDate>='$current_date' $con";

        return $query;
    }

    public function past_events($current_date, $limit = NULL, $random = '1', $event_provider = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($event_provider)) {
            $con .= " WHERE event_prov_code='$event_provider' ";
        }
        if (!empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } elseif (!empty($limit) && $random == '0') {
            $con .= " ORDER BY event_id DESC LIMIT $limit";
        } elseif (empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() ";
        } else {
            $con .= " ORDER BY event_id DESC";
        }
        $query = "SELECT * FROM events  WHERE endDate<'$current_date' $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function past_events_query($current_date, $limit = NULL, $random = '1', $event_provider = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($event_provider)) {
            $con .= " WHERE event_prov_code='$event_provider' ";
        }
        if (!empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } elseif (!empty($limit) && $random == '0') {
            $con .= " ORDER BY event_id DESC LIMIT $limit";
        } elseif (empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() ";
        } else {
            $con .= " ORDER BY event_id DESC";
        }
        $query = "SELECT * FROM events  WHERE endDate<'$current_date' $con";

        return $query;
    }

    public function get_events_by_month($current_month, $current_year)
    {
        global $db_handle;

        if (!empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } elseif (!empty($limit) && $random == '0') {
            $con .= " ORDER BY event_id DESC LIMIT $limit";
        } elseif (empty($limit) && $random == '1') {
            $con .= " ORDER BY RAND() ";
        } else {
            $con .= " ORDER BY event_id DESC";
        }
        $query = "SELECT * FROM events WHERE MONTH(startDate)='$current_month' AND YEAR(startDate)='$current_year' $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_events($event_provider = NULL)
    {
        global $db_handle;
        if (!empty($event_provider)) {
            $con .= " WHERE event_prov_code='$event_provider'";
        }
        $con .= " ORDER BY event_id DESC";
        $query = "SELECT * FROM events $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_event_query($event_provider = NULL)
    {
        global $db_handle;
        if (!empty($event_provider)) {
            $con .= " WHERE event_prov_code='$event_provider'";
        }
        $con .= " ORDER BY event_id DESC";
        $query = "SELECT * FROM events $con";

        return $query;
    }

    public function event_comments($limit)
    {
        global $db_handle;
        $con = "";

        if (!empty($limit)) {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY RAND() DESC";
        }
        $query = "SELECT * FROM event_comments $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_course_reviews_by_courseID($courseID = NULL, $limit = NULL)
    {
        global $db_handle;

        if (!empty($courseID)) {
            $con .= " WHERE courseID='$courseID'";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY RAND() DESC";
        }
        $query = "SELECT * FROM course_reviews $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_job_reviews_by_jobID($jobID = NULL, $limit = NULL)
    {
        global $db_handle;

        if (!empty($courseID)) {
            $con .= " WHERE jobs_id='$jobID'";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY RAND() DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY RAND() DESC";
        }
        $query = "SELECT * FROM job_reviews $con";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
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

    public function get_study_methods()
    {
        global $db_handle;

        $query = "SELECT * FROM course_study_methods ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_study_method_by_id($csm)
    {
        global $db_handle;

        $query = "SELECT * FROM course_study_methods WHERE csm_id='$csm'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0]['cs_method'];
    }

    public function get_study_levels()
    {
        global $db_handle;

        $query = "SELECT * FROM study_levels ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data;
    }

    public function get_study_level_by_id($csl)
    {
        global $db_handle;

        $query = "SELECT * FROM study_levels WHERE csm_id='$csl'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0]['sl_name'];
    }

    public function uploadnews($title, $newfilename, $category_name, $newsdate, $excerpts, $content)
    {
        global $db_handle;

        $query = "INSERT INTO news(news_title,news_cat,excerpts,news_date,news_image,news_content) VALUES ('$title','$category_name','$excerpts','$newsdate','$newfilename','$content')";
        $db_handle->runQuery($query);
        return 'News was successfully uploaded';
    }

    //SEND message FROM CONTACT FORM
    public function add_message($fullname = NULL, $phoneno = NULL, $address = NULL, $company = NULL, $email = NULL, $subject = NULL, $message = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO contact(fullname,phoneno,address,company,email,subject,message) VALUES ('$fullname','$phoneno','$address','$company','$email','$subject','$message')";
        $db_handle->runQuery($query);
        return 'Message was successfully sent';
    }

    public function updatecontent($id, $page_name, $page_location, $title, $postedValue, $entrydate)
    {
        global $db_handle;

        $query = "UPDATE content SET page_name='$page_name',page_location='$page_location',title='$title',info='$postedValue',entrydate='$entrydate' where id='$id'";
        $db_handle->runQuery($query);
        return 'Content was successfully updated';
    }

    public function del_course($course_id)
    {
        global $db_handle;

        $query = "DELETE FROM courses where course_id='$course_id'";
        $db_handle->runQuery($query);
        return 'Course was successfully deleted';
    }
    public function del_course_pricing($plan_id)
    {
        global $db_handle;

        $query = "DELETE FROM course_provider_plans where plan_id='$plan_id'";
        $db_handle->runQuery($query);
        return 'Course Pricing was successfully deleted';
    }

    public function del_course_category($course_category)
    {
        global $db_handle;

        $query = "DELETE FROM course_categories where category_id='$course_category'";
        $db_handle->runQuery($query);
        return 'Course category was successfully deleted';
    }

    public function del_course_subcategory($course_subcategory)
    {
        global $db_handle;

        $query = "DELETE FROM course_sub_categories where subcat_id='$course_subcategory'";
        $db_handle->runQuery($query);
        return 'Course subcategory was successfully deleted';
    }

    public function del_course_type($course_type)
    {
        global $db_handle;

        $query = "DELETE FROM course_types where subcat_id='$course_type'";
        $db_handle->runQuery($query);
        return 'Course types was successfully deleted';
    }

    public function del_state($state_id)
    {
        global $db_handle;

        $query = "DELETE FROM states where state_id='$state_id'";
        $db_handle->runQuery($query);
        return 'State was successfully deleted';
    }

    public function del_course_location($location_id)
    {
        global $db_handle;

        $query = "DELETE FROM course_locations where location_id='$location_id'";
        $db_handle->runQuery($query);
        return 'Location was successfully deleted';
    }

    public function del_job_location($location_id)
    {
        global $db_handle;

        $query = "DELETE FROM job_locations where location_id='$location_id'";
        $db_handle->runQuery($query);
        return 'Location was successfully deleted';
    }

    public function deleteslide($id)
    {
        global $db_handle;

        $query = "DELETE FROM sliderpix where id='$id'";
        $db_handle->runQuery($query);
        return 'Slide was successfully deleted';
    }

    public function deletecontent($id)
    {
        global $db_handle;

        $query = "DELETE FROM content where id='$id'";
        $db_handle->runQuery($query);
        return 'Content was successfully deleted';
    }

    public function deleteservices($id)
    {
        global $db_handle;

        $query = "DELETE FROM services where id='$id'";
        $db_handle->runQuery($query);
        return 'Service was successfully deleted';
    }

    public function deleteteammember($id)
    {
        global $db_handle;

        $query = "DELETE FROM team_members where team_id='$id'";
        $db_handle->runQuery($query);
        return 'Team member was successfully deleted';
    }

    public function deletetestimonial($id)
    {
        global $db_handle;

        $query = "DELETE FROM testimonials where testi_id='$id'";
        $db_handle->runQuery($query);
        return 'Testimonial was successfully deleted';
    }

    public function deletenews($id)
    {
        global $db_handle;

        $query = "DELETE FROM news where news_id='$id'";
        $db_handle->runQuery($query);
        return 'Testimonial was successfully deleted';
    }

    public function deletenewscat($id)
    {
        global $db_handle;

        $query = "DELETE FROM news_categories where cat_id='$id'";
        $db_handle->runQuery($query);
        return 'Testimonial was successfully deleted';
    }

    public function deletevacancy($id)
    {
        global $db_handle;

        $query = "DELETE FROM vacancies where job_id='$id'";
        $db_handle->runQuery($query);
        return 'Vacancy was successfully deleted';
    }

    public function deletevideo($id)
    {
        global $db_handle;

        $query = "DELETE FROM videos where video_id='$id'";
        $db_handle->runQuery($query);
        return 'Video was successfully deleted';
    }

    public function addteammember($name, $position, $introtext)
    {
        global $db_handle;

        $query = "INSERT INTO team_members(name,position,introtext) VALUES ('$name','$position','$introtext')";
        $db_handle->runQuery($query);
        return 'Team member added successfully';
    }

    public function addtestimonial($quote_writer, $quote, $quote_location)
    {
        global $db_handle;

        $query = "INSERT INTO testimonials(quote_writer,quote,quote_location) VALUES ('$quote_writer','$quote','$quote_location')";
        $db_handle->runQuery($query);
        return 'Testimonial added successfully';
    }

    public function addnewscategory($categoryname)
    {
        global $db_handle;

        $query = "INSERT INTO news_categories(category_name) VALUES ('$categoryname')";
        $db_handle->runQuery($query);
        return 'News Category added successfully';
    }

    public function add_job($job_title, $recruiter_code, $email, $phone,  $location_id, $country_id, $startDate, $endDate, $category_id, $sub_category_id, $jobstype, $joblevel, $jobsector, $description, $admin_id = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO jobs(job_title,recruiter_code, email, phone, location_id, country_id, startDate, endDate, job_category, job_subcategory, jobstype, joblevel, job_sector, descript, admin_id) VALUES ('$job_title', '$recruiter_code', '$email','$phone', '$location_id', '$country_id','$startDate', '$endDate', '$category_id', '$sub_category_id', '$jobstype', '$joblevel', '$jobsector', '$description', '$admin_id')";
        $db_handle->runQuery($query);
        return 'Job added successfully';
    }

    public function get_current_jobs()
    {
        global $db_handle;
        $curday = date('Y-m-d');

        $query = "SELECT * FROM jobs WHERE endDate>='$curday' ORDER by job_id DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function update_job($recruiter_code, $job_title, $email, $phone, $gallery, $job_company, $location_id, $country_id, $startDate, $endDate, $category_id, $sub_category_id, $jobstype, $joblevel, $jobsector, $description, $admin_id = NULL)
    {
        global $db_handle;

        $query = "UPDATE jobs SET job_title='$job_title', email='$email', phone='$phone', gallery='$gallery', job_company='$job_company', location_id='$location_id', country_id='$country_id', startDate='$startDate', endDate='$endDate', job_category='$category_id', job_subcategory='$sub_category_id', jobstype='$jobstype', joblevel='$joblevel', job_sector='$jobsector', descript='$description', admin_id='$admin_id' where recruiter_code='$recruiter_code'";

        $db_handle->runQuery($query);
        return true;
    }

    public function updatetestimonial($id, $quote_writer, $quote, $quote_location)
    {
        global $db_handle;

        $query = "UPDATE testimonials SET quote='$quote',quote_writer='$quote_writer',quote_location='$quote_location' where id='$id'";
        $db_handle->runQuery($query);
        return 'Content was successfully updated';
    }

    public function getSiteSettings()
    {
        global $db_handle;

        $query = "SELECT * from settings where sett_id='1'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

    public function add_course_comment($user_code = NULL, $email = NULL, $course_id = NULL, $comment = NULL, $author = NULL, $rating = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO course_comments(user_code, courseID, comment_poster, comment, comment_email, comment_rating) VALUES ('$user_code', '$course_id', '$author', '$comment', '$email', '$rating')";
        $db_handle->runQuery($query);
        return true;
    }

    public function get_course_comment_count($course_id = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($courseID)) {
            $con .= " WHERE courseID = '$course_id' ";
        }

        $query = "SELECT * FROM course_comments $con ";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result);
    }

    public function get_total_course_rating($course_id = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($courseID)) {
            $con .= " WHERE courseID = '$course_id' ";
        }

        $query = "SELECT comment_rating FROM course_comments $con ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0]['comment_rating'] ? $fetched_data[0]['comment_rating'] : false;
    }

    public function get_course_comments($course_id = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = "";

        if (!empty($courseID)) {
            $con .= " WHERE courseID = '$course_id' ";
        }
        if (!empty($limit)) {
            $con .= " ORDER BY courseID DESC LIMIT $limit";
        } else {
            $con .= " ORDER BY courseID DESC";
        }

        $query = "SELECT * FROM course_comments $con ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

    public function get_all_course_tags($course_id = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = "";
        $all_tags = "";
        if (!empty($course_id)) {
            $con .= " WHERE course_id = '$course_id' ";
        }
        if (!empty($limit)) {
            $con .= "ORDER BY RAND() ASC LIMIT $limit";
        } else {
            $con .= "ORDER BY tags ASC";
        }
        $query = "SELECT DISTINCT tags FROM courses ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        //explode each tag field to get individual content and check if the tag already exists in the list, if no add it to the list
        if (isset($fetched_data) && !empty($fetched_data)) {
            foreach ($fetched_data as $row) {
                $line_tag = $row['tags'];
                //
                $myArrayline_tag = explode(',', $line_tag);
                foreach ($myArrayline_tag as $myArray_line_tag) {
                    if (strpos($myArray_line_tag, $all_tags) !== false) {
                        //echo "Word Found!";
                    } else {
                        $all_tags .= $myArray_line_tag; //echo "Word Not Found!";
                    }
                }
            }
        }
        return $all_tags ? $all_tags : false;
    }

    public function get_all_course_tags_as_array($course_id = NULL, $limit = NULL)
    {
        global $db_handle;
        $con = "";
        $all_tags = array();
        if (!empty($course_id)) {
            $con .= " WHERE course_id = '$course_id' ";
        }
        if (!empty($limit)) {
            $con .= "ORDER BY RAND() ASC LIMIT $limit";
        } else {
            $con .= "ORDER BY tags ASC";
        }
        $query = "SELECT DISTINCT tags FROM courses ";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        //explode each tag field to get individual content and check if the tag already exists in the list, if no add it to the list
        if (isset($fetched_data) && !empty($fetched_data)) {
            foreach ($fetched_data as $row) {
                $line_tag = $row['tags'];
                //
                $myArrayline_tag = explode(',', $line_tag);
                foreach ($myArrayline_tag as $myArray_line_tag) {
                    if (!in_array($myArray_line_tag, $all_tags)) { //check if that tag already exists in the array, if no add
                        //echo "Word Found!";
                    } else {
                        $all_tags .= $myArray_line_tag; //echo "Word Not Found!";
                        array_push($all_tags, $myArray_line_tag);
                    }
                }
            }
        }
        return $all_tags ? $all_tags : false;
    }

    public function add_view_course($course_id, $user_id)
    {
        global $db_handle;

        $query = "INSERT INTO viewed_courses(course_id,user_id) VALUES ('$course_id','$user_id')";
        $db_handle->runQuery($query);
        return true;
    }

    public function add_view_job($job_id, $user_id)
    {
        global $db_handle;

        $query = "INSERT INTO viewed_jobs(jobs_id,user_id) VALUES ('$job_id','$user_id')";
        $db_handle->runQuery($query);
        return true;
    }
}
