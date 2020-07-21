<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['sid'];
$result = $zenta_operation->del_course_pricing($id);
if ($result) {
  $message_success = $result;
} else {
  $message_error = "Event Pricing was not successfully deleted.";
}
header("Location:manage_course_pricings.php");
