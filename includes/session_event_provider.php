<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out
// Keep in mind when working with sessions that it is generally
// inadvisable to stor DB-related objects in sessions

class SessionEventProvider
{
    private $logged_in = false;
    public $event_prov_unique_code;

    function __construct()
    {
        ob_start();
        $sess_name = session_name();
        if ($sess_name != "ukesps_event_provider") {
            session_name("ukesps_event_provider");
        }
        //session_start();
        $this->check_login();
        if ($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }
    }

    public function is_logged_in()
    {
        return $this->logged_in;
    }



    public function login($user)
    {
        // database should find user based on user_code/password
        if ($user) {
            $this->event_prov_unique_code = $_SESSION['event_prov_unique_code'] = $user['event_prov_code'];
            $_SESSION['event_prov_status'] = $user['status'];
            $_SESSION['event_prov_username'] = $user['username'];
            $_SESSION['event_prov_first_name'] = $user['first_name'];
            $_SESSION['event_prov_last_name'] = $user['last_name'];
            $_SESSION['event_prov_middle_name'] = $user['middle_name'];
            $_SESSION['event_prov_active'] = $user['active'];
            $_SESSION['event_prov_email'] = $user['email'];
            $_SESSION['user_time'] = time();
            $this->logged_in = true;
        }
    }

    public function logout()
    {
        unset($_SESSION['event_prov_unique_code']);
        unset($_SESSION['event_prov_status']);
        unset($_SESSION['event_prov_username']);
        unset($_SESSION['event_prov_first_name']);
        unset($_SESSION['event_prov_last_name']);
        unset($_SESSION['event_prov_last_login']);
        unset($_SESSION['event_prov_last_login']);
        unset($_SESSION['user_time']);
        unset($this->event_prov_unique_code);
        session_unset();
        session_destroy();
        $this->logged_in = false;
        //redirect_to("login-register.php?logout=2");
    }

    private function auto_logout()
    {
        // Set time allowed to be inactive in seconds. 60min x 60 = 3600
        $inactive = 3600 * 24 * 365;
        $t = time();
        if (isset($_SESSION['user_time'])) {
            $to = $_SESSION['user_time'];
            $diff = $t - $to;
            if ($diff > $inactive) {
                return true;
            } else {
                $_SESSION['user_time'] = time();
                return false;
            }
        } else {
            return false;
        }
    }

    private function check_login()
    {
        if ($this->auto_logout()) {
            $this->logout();
            redirect_to("login.php?logout=2");
        } elseif (isset($_SESSION['event_prov_unique_code'])) {
            $this->event_prov_unique_code = $_SESSION['event_prov_unique_code'];
            $this->logged_in = true;
        } else {
            unset($this->event_prov_unique_code);
            $this->logged_in = false;
        }
    }
}
$session_event_prov = new SessionEventProvider();
