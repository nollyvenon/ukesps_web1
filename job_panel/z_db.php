<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
require_once(LIB_PATH . DS . "functions_status_messages.php");

// Load core objects
require_once(LIB_PATH . DS . "session_jobseeker.php");
require_once(LIB_PATH . DS . "class_database.php");

// Load other assets
require_once(LIB_PATH . DS . "PHPMailer" . DS . "PHPMailerAutoload.php");
require_once(LIB_PATH . DS . "class_zenta_operation.php");
require_once(LIB_PATH . DS . "class_system.php");
require_once(LIB_PATH . DS . "class_client.php");
require_once(LIB_PATH . DS . "class_jobseeker.php");
require_once(SITE_ROOT . '/xpanel/db_class.php');
require_once(LIB_PATH . DS . '/pdf_to_text/PdfToText.phpclass');

//require_once("includes/PHPMailer/PHPMailerAutoload.php");

$zenta_operation = new zentabooksOperation();
$jobsk_operation = new jobseekerOperation();
$client_operation = new clientOperation();
$admin_db_conn = new mysqlDB(DB_NAME, DB_USER, DB_PASS);
$db_class = new DbClass();
$site_name = "UKESPS";
$jobseek_code = $_SESSION['jobsek_unique_code'];
$user_detail = $jobsk_operation->get_user_detail($jobseek_code);
extract($user_detail);
$cart_volume = sizeof($_SESSION['cart']);
