<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['sid'];
$result = $zenta_operation->del_cv_pricing($id);
if ($result) {
  $message_success = "cv Pricing was successfully deleted";
} else {
  $message_error = "cv Pricing was not successfully deleted.";
}
header("Location:manage_cv_pricing.php");
