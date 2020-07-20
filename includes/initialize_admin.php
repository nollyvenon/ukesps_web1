<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
// Initialize session
if (!isset($_SESSION)) {
    session_start();
}

/*$con = new mysqli("localhost", "nollyvenon", "nollyboy", "plentypl_main");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");

defined('DB_NAME')   ? null : define("DB_NAME", "ukesps");

// Development settings
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/ukesps_web');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT . DS . 'includes');
defined('SITE_URL') ? NULL : define('SITE_URL', 'http://localhost/ukesps_web');
defined('SITE_ACRONYM') ? NULL : define('SITE_ACRONYM', 'UKESPS ADMIN');

// Load basic functions so that everything after can use them
require_once(LIB_PATH . DS . "malek_func_library_1.0.0.php");
require_once(LIB_PATH . DS . "functions.php");

// Load core objects
require_once(LIB_PATH . DS . "session_admin.php");
require_once(LIB_PATH . DS . "class_database.php");

// Load other assets
require_once(LIB_PATH . DS . "PHPMailer" . DS . "PHPMailerAutoload.php");
require_once(LIB_PATH . DS . "class_admin.php");
require_once(LIB_PATH . DS . "class_zenta_operation.php");
require_once(LIB_PATH . DS . "class_system.php");

$zenta_operation = new zentabooksOperation();
$admin_id = $_SESSION['admin_id'];
$last_login_time = date('d/m/Y H:i', strtotime($_SESSION['admin_last_login']));
$admin_fullname = $admin_object->get_admin_name_by_code($_SESSION['admin_unique_code']);
//$admin_type =$admin_object->get_admin_type($_SESSION['group_id']);
$my_pages = $admin_object->get_privileges($_SESSION['admin_code']);
$allowed_pages = $my_pages['allowed_pages'];
//print_r($my_pages);
//super-admin, warehouse-keeper