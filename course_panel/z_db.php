<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
// Initialize session
if (!isset($_SESSION)) {
    session_start();
}
/*
$con = new mysqli("localhost", "root", "", "ukesps");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/

$IP = $_SERVER['HTTP_HOST'];        // Obtains the IP address
if ($IP == "::1") {
    $IP = 'localhost';
}

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");

defined('DB_NAME')   ? null : define("DB_NAME", "ukesps");

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/ukesps_web');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT . DS . 'includes');
defined('SITE_URL') ? NULL : define('SITE_URL', "http://localhost/ukesps_web");

// Load basic functions so that everything after can use them
require_once(LIB_PATH . DS . "malek_func_library_1.0.0.php");
require_once(LIB_PATH . DS . "functions.php");

// Load core objects
require_once(LIB_PATH . DS . "class_database.php");
require_once(LIB_PATH . DS . "session_course_provider.php");

// Load other assets
require_once(LIB_PATH . DS . "PHPMailer" . DS . "PHPMailerAutoload.php");
require_once(LIB_PATH . DS . "class_course_provider.php");
require_once(LIB_PATH . DS . "class_zenta_operation.php");
require_once(LIB_PATH . DS . "class_system.php");


$course_prov_object = new CoursProvUser();
$zenta_operation = new zentabooksOperation();
$admin_db_conn = new mysqlDB(DB_NAME, DB_USER, DB_PASS);
$site_name = "UKESPS";

$course_prov_code = $_SESSION['couprov_unique_code'];
$course_provider_detail = $course_prov_object->get_course_provider_detail($course_prov_code);
extract($course_provider_detail);

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//-------------------------------------------->>
if (isset($_SESSION['unique'])) {
    $unique = $_SESSION['unique'];
    if ($unique == "") {
        $a = time();
        $r = rand(10000, 99999);
        $b = $_SERVER['HTTP_USER_AGENT'];
        $c = $_SERVER['REMOTE_ADDR'];
        $fnl = "$a$b$c$r";
        $un = md5($fnl);
        $_SESSION['unique'] = "$un";
        redirect_to($actual_link);
    }
} else {
    $a = time();
    $r = rand(10000, 99999);
    $b = $_SERVER['HTTP_USER_AGENT'];
    $c = $_SERVER['REMOTE_ADDR'];
    $fnl = "$a$b$c$r";
    $un = md5($fnl);
    $_SESSION['unique'] = "$un";
    redirect_to($actual_link);
}
