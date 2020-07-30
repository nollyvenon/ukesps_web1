<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['sid'];
$result = $zenta_operation->del_recruiter_pricing($id);
if ($result) {
  $message_success = "recruiter Pricing was successfully deleted";
} else {
  $message_error = "recruiter Pricing was not successfully deleted.";
}
header("Location:manage_job_pricings.php");
