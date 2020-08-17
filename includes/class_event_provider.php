<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
//require_once(LIB_PATH.DS.'class_database.php');

class EventProviderUser
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

        $query = "SELECT pass_salt FROM event_providers WHERE email = '{$username}'  or  username = '{$username}' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['pass_salt'];
            $pwdver = verify($password, $pass_salt);
            if (strlen($username) > 4 and ($pwdver == 1)) {
                $query = "SELECT event_prov_code, email, first_name, last_name, active, status, username FROM event_providers WHERE (event_prov_code='" . $username . "' or email='" . $username . "' or username='" . $username . "') LIMIT 1";
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

    public function event_provider_plan_detail_by_id($plan_id)
    {
        global $db_handle;

        $query = "SELECT * FROM event_provider_plans WHERE plan_id = '$plan_id' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function get_all_event_providers()
    {
        global $db_handle;

        $query = "SELECT * FROM event_providers";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data;
        } else {
            return false;
        }
    }


    public function get_event_provider_detail($event_prov_code = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM event_providers WHERE username = '$event_prov_code' OR event_prov_code = '$event_prov_code' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function update_event_provider_password($username = "", $password = "")
    {
        global $db_handle;

        $query = "SELECT pass_salt FROM event_providers WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $user = $db_handle->fetchAssoc($result);
        $pass_salt = $user[0]['pass_salt'];
        $hashed_password = hash("SHA512", "$pass_salt.$password");

        $query = "UPDATE event_providers SET password = '{$hashed_password}' WHERE email = '{$username}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_event_provider_name_by_code($event_prov_code = NULL)
    {
        global $db_handle;

        $query = "SELECT CONCAT(last_name, ' ', first_name) AS full_name FROM event_providers WHERE event_prov_code = '$event_prov_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        $full_name = $fetched_data[0]['full_name'];
        return $full_name;
    }

    public function get_event_provider_detail_by_code($event_prov_code = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM event_providers WHERE event_prov_code = '$event_prov_code' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function event_providing_plans()
    {
        global $db_handle;

        $query = "SELECT * FROM event_provider_plans order by plan_id DESC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data;
    }

    public function get_privileges($event_prov_code = NULL)
    {
        global $db_handle;

        $query = "SELECT allowed_pages FROM event_provider_privilege WHERE event_prov_code = '$event_prov_code' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    // Confirm that the email address is not existing
    public function event_provider_is_duplicate($email = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM event_providers WHERE email = '$email'";
        $result = $db_handle->numRows($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Add a new event_providers profile
    public function add_new_event_provider($first_name = NULL, $last_name = NULL, $middle_name = NULL, $phone = NULL, $email, $username = '', $password, $billing_company, $billing_address_1, $billing_address_2, $billing_city, $billing_state, $billing_country)
    {
        global $db_handle;
        global $system_object;

        //check whether event_prov_code generated by rand_string is already existing
        event_prov_code: $event_prov_code = rand_string(5);
        if ($db_handle->numRows("SELECT event_prov_code FROM event_providers WHERE event_prov_code = '$event_prov_code'") > 0) {
            goto event_prov_code;
        };

        //$gen_pass = rand_string(7);
        $pass_salt = generateHash($password);


        $query = "INSERT INTO event_providers (event_prov_code, username, email, pass_salt, password, first_name, last_name, middle_name, status, phone, billing_company, billing_address_1, billing_address_2, billing_city, billing_state, billing_country) VALUES ('$event_prov_code', '$username', '$email', '$pass_salt', '$password', '$first_name', '$last_name', '$middle_name', '1', '$phone', '$billing_company', '$billing_address_1', '$billing_address_2', '$billing_city', '$billing_state', '$billing_country')";
        $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {

            $query = "INSERT INTO event_provider_privilege (event_prov_code, allowed_pages) VALUES ('$event_prov_code', '')";
            $db_handle->runQuery($query);

            //New event_providers succefully inserted, send default password to the event_providers
            $subject = "UKESPS Event Provider Login";
            $body = "
Dear " . $first_name . "

A UKESPS Event Provider profile has been created for you.

Your  password is $password

Login with the URL below, you can update your password in the
profile settings.

https://ukesps.com/events/login

Do not share your event_providers credentials with anyone.


UKESPS Support
www.ukesps.com";

            $system_object->send_email($subject, $body, $email, $first_name);


            return "An email was sent to $email containing your password and registration information. It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, Email: $email <br> Password: $password. <br> To login, <a href='login'>Click here</a>.<br>Regards.";
        } else {
            return false;
        }
    }


    // Update event_providers profile - modify the status
    public function modify_event_provider_profile($event_prov_code, $event_provider_status)
    {
        global $db_handle;

        $query = "UPDATE event_providers SET status = '{$event_provider_status}' WHERE event_prov_code = '{$event_prov_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function modify_event_provider_privilege($event_prov_code, $allowed_pages)
    {
        global $db_handle;

        $query = "UPDATE event_provider_privilege SET allowed_pages = '{$allowed_pages}' WHERE event_prov_code = '{$event_prov_code}' LIMIT 1";
        $result = $db_handle->runQuery($query);

        if ($db_handle->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }



    public function delete_event_provider($event_prov_code)
    {
        global $db_handle;

        $query = "DELETE FROM event_provider_logins WHERE Id='$event_prov_code'";
        $result = $db_handle->runQuery($query);

        // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }

    public function activate_event_provider($event_prov_code)
    {
        global $db_handle;

        $query = "UPDATE event_provider_logins SET status = '1' WHERE Id='$event_prov_code'";
        $result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

    public function deactivate_event_provider($event_prov_code)
    {
        global $db_handle;

        $query = "UPDATE event_provider_logins SET status = '0' WHERE Id='$event_prov_code'";
        $result = $db_handle->runQuery($query);

        return $result ? true : false;
    }

    public function get_last_login($event_prov_code)
    {
        global $db_handle;
        $query = "SELECT * FROM event_provider_logins WHERE user_id = '$event_prov_code' OR login = '$event_prov_code' ORDER BY time DESC LIMIT 1,1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $login_info = $fetched_data;

        return $login_info;
    }

    // Check whether event_providers has an active status
    public function event_provider_is_active($event_prov_code)
    {
        global $db_handle;

        $query = "SELECT status FROM event_providers WHERE event_prov_code = '$event_prov_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        if ($fetched_data[0]['status'] == 1) {
            $lastlogin = time();
            $query = "UPDATE event_providers SET active='$lastlogin' WHERE event_prov_code = '$event_prov_code'";
            $db_handle->runQuery($query);
            return true;
        } else {
            return false;
        }
    }

    public function is_active_paid($event_prov_code)
    {
        global $db_handle;
        $current_time = date('Y-m-d H:i:s');
        $query = "SELECT * FROM event_providers WHERE (username='$event_prov_code' OR event_prov_code='$event_prov_code') AND valid_until>'$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
    }

    public function is_provider_plan_valid($event_prov_code = NULL)
    {
        global $db_handle;

        $current_time = date('Y-m-d H:i:s');
        $query = "SELECT * FROM event_providers WHERE (username='$event_prov_code' OR event_prov_code='$event_prov_code') AND plan_valid_until>='$current_time'";
        $result = $db_handle->runQuery($query);

        return $db_handle->numOfRows($result) > 0 ? true : false;
    }


    public function add_to_order($total_price = NULL, $total_qty = NULL, $unique = NULL, $paymentmode = NULL)
    {
        global $db_handle;

        $query = "INSERT INTO event_provider_plan_orders (session_id, total_price, total_qty, orderstatus, paymentmode) VALUES
        ('$unique', '$total_price','$total_qty','0','$paymentmode')";
        $db_handle->runQuery($query);

        return $db_handle->insertedId();
    }

    public function add_to_cart($plan_id = NULL, $amount = NULL, $quantity = NULL, $orderId = NULL, $unique = NULL)
    {
        global $db_handle;

        if ($db_handle->numRows("SELECT session_id FROM event_provider_plan_orderitems WHERE session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id' ") > 0) {
            $query = "UPDATE event_provider_plan_orderitems SET pquantity = '$quantity', productprice = '$amount' WHERE  session_id = '$unique' AND  orderid = '$orderId' AND pid = '$plan_id'";
        } else {

            $query = "INSERT INTO event_provider_plan_orderitems (pid, productprice, pquantity, orderid, session_id) VALUES ('$plan_id', '$amount', '$quantity', '$orderId', '$unique')";
        }
        $db_handle->runQuery($query);
        return true;
    }

    public function get_cart_info($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM event_provider_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
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

        $query = "SELECT total_price FROM event_provider_plan_orders WHERE session_id = '$sid' OR uid='$sid'";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return end($fetched_data)['total_price'];
        } else {
            return false;
        }
    }

    public function get_order_items($sid = NULL)
    {
        global $db_handle;

        $query = "SELECT * FROM event_provider_plan_orderitems WHERE session_id = '$sid'";
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

        $query = "DELETE FROM event_provider_plan_orderitems WHERE session_id = '$unique' AND pid='$sid' ";
        $db_handle->runQuery($query);
        return 'Cart item was successfully deleted';
    }


    public function paystack_payment($event_prov_code, $reference = NULL, $trxref = NULL, $status = NULL, $amount = NULL, $email = NULL, $unique_id = NULL, $payment_category = NULL, $currency = NULL, $plan_id)
    {
        // return $amount;
        global $db_handle;
        $query = "INSERT INTO payments SET event_prov_code='" . $event_prov_code . "', OrderID='" . $trxref . "', payer_email='" . $email . "', payment_status='1', payment_amount='" . $amount . "', txn_id='" . $event_prov_code . "', payment_currency='" . $currency . "', payment_category='$payment_category', gateway='2'";
        $db_handle->runQuery($query);
        $event_provider_plan_period = $this->event_provider_plan_detail_by_id($plan_id)['plan_period'];
        if ($event_provider_plan_period == 'day') {
            $plan_period = 1;
        } else if ($event_provider_plan_period == 'week') {
            $plan_period = 7;
        } else if ($event_provider_plan_period == 'month') {
            $plan_period = 30;
        } else if ($event_provider_plan_period == 'year') {
            $plan_period = 365;
        } else {
            $plan_period = 0;
        }
        $plan_valid_until = date('Y-m-d H:i:s', time() + $plan_period * 24 * 60 * 60);

        $query = "UPDATE event_providers SET plan_valid_until='$plan_valid_until' where event_prov_code='$event_prov_code'";
        return $db_handle->runQuery($query);

        // $query = "UPDATE carrrt SET ordered='1' where code='$unique_id'";
        // $db_handle->runQuery($query);
        // return true;
    }

    public function get_all_past_payments($event_prov_code = NULL, $orderID = NULL, $payer_email = NULL, $payment_status = NULL, $gateway = NULL, $payment_currency = NULL)
    {
        global $db_handle;

        $con = (!empty($event_prov_code) && ($event_prov_code != 'NULL')) ? " WHERE event_prov_code = '$event_prov_code' " : "";
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

    public function event_detail($provider_code = NULL, $event_id = NULL, $startDate = NULL, $endDate = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($event_id) ? " AND event_id = '$event_id' " : " ";
        } else {
            $con .= !empty($event_id) && ($event_id != 'NULL') ? " WHERE event_id = '$event_id' " : " ";
        }

        if (!empty($con)) {
            $con .= !empty($provider_code) ? " AND event_prov_code = '$provider_code' " : " ";
        } else {
            $con .= !empty($provider_code) && ($provider_code != 'NULL') ? " WHERE event_prov_code = '$provider_code' " : " ";
        }
        if (!empty($con)) {
            $con .= !empty($startDate) ? " AND startDate>='$startDate' " : " ";
        } else {
            $con .= !empty($startDate) && ($startDate != 'NULL') ? " WHERE startDate>='$startDate' " : " ";
        }

        if (!empty($con)) {
            $con .= !empty($endDate) ? " AND endDate<='$endDate' " : " ";
        } else {
            $con .= !empty($endDate) && ($endDate != 'NULL') ? " WHERE endDate<='$endDate' " : " ";
        }


        $query = "SELECT * FROM events $con";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            return $fetched_data[0];
        } else {
            return false;
        }
    }

    public function add_to_list($list_id, $user_code = NULL)
    {
        global $db_handle;

        global $db_handle;

        $query = "SELECT * FROM event_mailing_lists WHERE list_id = '$list_id' AND list_members LIKE '%{$user_code}%' ";
        $result = $db_handle->runQuery($query);

        if ($db_handle->numOfRows($result) < 1) { //Search if the user is already a part of the list
            $fetched_data = $db_handle->fetchAssoc($result);
            $list_members = $fetched_data[0]['list_members'];
            array_push($list_members, $user_code);

            $query = "UPDATE applicant_lists SET list_members = '$list_members' WHERE list_id = '$list_id' LIMIT 1";
            $result = $db_handle->runQuery($query);
            return true;
        } else {
            return false;
        }
    }

    public function all_subscriber_lists($event_prov_code = NULL)
    {
        global $db_handle;

        if (!empty($con)) {
            $con .= !empty($event_prov_code) ? " AND event_prov_code = '$event_prov_code' " : "";
        } else {
            $con .= !empty($event_prov_code) && ($event_prov_code != 'NULL') ? " WHERE event_prov_code = '$event_prov_code' " : "";
        }
        $query = "SELECT * FROM event_subscriber_lists $con";
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

        $query = "DELETE FROM event_subscriber_lists WHERE list_id='$list_id'";
        $result = $db_handle->runQuery($query);

        // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }
}

$event_prov_object = new EventProviderUser();
