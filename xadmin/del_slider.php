<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['bid'];
$result = $zenta_operation->del_slider($id);
if ($result) {
  $message_success = "slider was successfully deleted";
} else {
  $message_error = "slider was not successfully deleted.";
}
header("Location:manage_sliders.php");
