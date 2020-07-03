<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'class_database.php');

class AdminUser {

    public function authenticate($username = "", $password = "") {
        global $db_handle;
        $username = $db_handle->sanitizePost($username);

        $query = "SELECT pass_salt FROM admin WHERE email = '{$username}'  or  username = '{$username}' LIMIT 1";
        
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['pass_salt'];
			$pwdver=verify($password,$pass_salt);
            if (strlen($username) > 4 and ($pwdver == 1)){
            $query = "SELECT admin_code, email, first_name, last_name, last_login, "
                    . "status FROM admin WHERE (admin_code='" . $username. "' or email='" . $username. "' or username='" . $username. "') LIMIT 1";
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
    
	public function get_all_users() {
        global $db_handle;
        
        $query = "SELECT * FROM affiliateuser";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
    }
	
	public function get_all_admin() {
        global $db_handle;
        
        $query = "SELECT * FROM affiliateuser";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
        
    }
    

    public function get_admin_detail($username = "", $password = "") {
        return $this->authenticate($username, $password);
    }
    
    public function update_admin_password($username = "", $password = "") {
        global $db_handle;
        
        $query = "SELECT pass_salt FROM admin WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $user = $db_handle->fetchAssoc($result);
        $pass_salt = $user[0]['pass_salt'];
        $hashed_password = hash("SHA512", "$pass_salt.$password");
        
        $query = "UPDATE admin SET password = '{$hashed_password}' WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_admin_name_by_code($admin_code=NULL) {
        global $db_handle;
        
        $query = "SELECT CONCAT(last_name, ' ', first_name) AS full_name FROM admin WHERE admin_code = '$admin_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        $full_name = $fetched_data[0]['full_name'];
        return $full_name;
    }
    
    public function get_admin_detail_by_code($admin_code=NULL) {
        global $db_handle;
        
        $query = "SELECT last_name, first_name, email, status FROM admin WHERE admin_code = '$admin_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
        
    }
    
    public function get_privileges($admin_code=NULL) {
        global $db_handle;
        
        $query = "SELECT allowed_pages FROM admin_privilege WHERE admin_code = '$admin_code' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }
    
    // Confirm that the email address is not existing
    public function admin_is_duplicate($email=NULL) {
        global $db_handle;
        
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $result = $db_handle->numRows($query);
        
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    // Check whether admin has an active status
    public function admin_is_active($admin_code) {
        global $db_handle;
        
        $query = "SELECT status FROM admin WHERE admin_code = '$admin_code' OR email = '$admin_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data[0]['status'] == '1') {
            return true;
        } else {
            return false;
        }
    }
    // Add a new admin profile
    public function add_new_admin($first_name='', $last_name='', $phone='', $email, $username='', $password, $account_type=NULL, $status=NULL) {
        global $db_handle;
        global $system_object;
        
        //check whether admin_code generated by rand_string is already existing
        admin_code:
        $admin_code = rand_string(5);
        if($db_handle->numRows("SELECT admin_code FROM admin WHERE admin_code = '$admin_code'") > 0) { goto admin_code; };
    
        $gen_pass = rand_string(7);
		$pass_salt = generateHash($gen_pass);
		
        
        $query = "INSERT INTO admin (admin_code, username, email, pass_salt, password, first_name, last_name, status) VALUES ('$admin_code', '$username', '$email', '$pass_salt', '$gen_pass', '$first_name', '$last_name', '1')";
        $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            
            $query = "INSERT INTO admin_privilege (admin_code, allowed_pages) VALUES ('$admin_code', '')";
            $db_handle->runQuery($query);
            
            //New admin succefully inserted, send default password to the admin
            $subject = "FFN Admin Login";
            $body = "
Dear " . $first_name . "

A new Solar Tech Admin profile has been created for you.

Your system generated password is $pass

Login with the URL below, you can update your password in the
profile settings.

https://frontiersolartech.com/admin

Do not share your Admin credentials with anyone.


Solar Tech Support
www.footballfansnetwork.com";
            
            $system_object->send_email($subject, $body, $email, $first_name);
            
            return true;
        } else {
            return false;
        }
    }
    
    
    // Update admin profile - modify the status
    public function modify_admin_profile($admin_code, $admin_status) {
        global $db_handle;
        
        $query = "UPDATE admin SET status = '{$admin_status}' WHERE admin_code = '{$admin_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function modify_admin_privilege($admin_code, $allowed_pages) {
        global $db_handle;
        
        $query = "UPDATE admin_privilege SET allowed_pages = '{$allowed_pages}' WHERE admin_code = '{$admin_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    // Add a new article
    public function update_system_message($system_message_id, $system_message_type, $subject, $content) {
        global $db_handle;
        
        // if it is an email, i.e. type == 1 and the subject is empty, do nothing
        // because an email message requires a subject to be set
        if($system_message_type == '1' && empty($subject)) {
            return false;
        }
        
        if($system_message_type == '1') {
            $query = "UPDATE system_message SET subject = '{$subject}', value = '$content' WHERE system_message_id = $system_message_id LIMIT 1";
        } else {
            $query = "UPDATE system_message SET value = '$content' WHERE system_message_id = $system_message_id LIMIT 1";
        }
        
        $result = $db_handle->runQuery($query);
        
        if($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	public function delete_user($user_id) {
        global $db_handle;

        $query = "DELETE FROM admin_logins WHERE Id='$user_id'";
        $result = $db_handle->runQuery($query);

       // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }

	public function activate_user($user_id) {
        global $db_handle;

        $query = "UPDATE admin_logins SET status = '1' WHERE Id='$user_id'";
      	$result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

	public function deactivate_user($user_id) {
        global $db_handle;

        $query = "UPDATE admin_logins SET status = '0' WHERE Id='$user_id'";
      	$result = $db_handle->runQuery($query);

        return $result ? true : false;
    }
	
	public function get_last_login($user_id){
		global $db_handle;
		 $query = "SELECT * FROM admin_logins WHERE user_id = '$user_id' OR login = '$user_id' ORDER BY time DESC LIMIT 1,1";
		$result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $login_info = $fetched_data;
        
        return $login_info;
		
	}

}

$admin_object = new AdminUser();