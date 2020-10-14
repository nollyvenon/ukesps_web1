<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$id = $_GET['sid'];

$result = $zenta_operation->del_cv($id);

if ($result) {
  $message_success = "User cv was successfully deleted";
} else {
  $message_error = "User cv was not successfully deleted.";
}
header("Location:manage_cvs.php");
