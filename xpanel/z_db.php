<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
// Initialize session
if(!isset($_SESSION)){
    session_start();
}
/*
$con = new mysqli("localhost", "root", "", "ukesps");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/

$IP = $_SERVER['HTTP_HOST'];        // Obtains the IP address
if ($IP=="::1"){
	$IP = 'localhost';
}

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "mypraise");
defined('DB_PASS')   ? null : define("DB_PASS", "nGzhPmYK68Mv");

defined('DB_NAME')   ? null : define("DB_NAME", "main_ukesps");

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', '/home/a5h3q74qq6ob/public_html');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT.DS.'includes');
defined('SITE_URL') ? NULL : define('SITE_URL', "https://ukesps.com");

// Load basic functions so that everything after can use them
require_once(LIB_PATH.DS."malek_func_library_1.0.0.php");
require_once(LIB_PATH.DS."functions.php");

// Load core objects
require_once(LIB_PATH.DS."session_client.php");
require_once(LIB_PATH.DS."class_database.php");

// Load other assets
require_once(LIB_PATH.DS."PHPMailer".DS."PHPMailerAutoload.php");
require_once(LIB_PATH.DS."class_zenta_operation.php");
require_once(LIB_PATH.DS."class_system.php");
require_once(LIB_PATH.DS."class_client.php");

//require_once("includes/PHPMailer/PHPMailerAutoload.php");

$zenta_operation = new zentabooksOperation();
$client_operation = new clientOperation();

$site_name = "UKESPS";
$user_code=$_SESSION['client_unique_code'];
$user_detail = $zenta_operation->get_user_detail($user_code);
extract($user_detail); 

if(isset($_SESSION['unique'])) {
  $unique = $_SESSION['unique'];
}else{
  $a = time();
  $r = rand(10000,99999);
  $b = $_SERVER['HTTP_USER_AGENT'];
  $c = $_SERVER['REMOTE_ADDR'];
  $fnl = "$a$b$c$r";
  $un = md5($fnl);	
  $_SESSION['unique'] = "$un";
  redirect_to($actual_link);
}
$cart_volume =sizeof($_SESSION['cart']);
