<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['sid'];
$result = $zenta_operation->del_event_pricing($id);
if ($result) {
  $message_success = "Event Pricing was successfully deleted";
} else {
  $message_error = "Event Pricing was not successfully deleted.";
}
header("Location:manage_event_pricing.php");
