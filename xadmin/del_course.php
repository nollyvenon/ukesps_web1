<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
if (!in_array(22, $my_pages)) {
	 $message_error .= "You do not have right to that page or feature. Regards.";
	redirect_to("dashboard?msg=10");
 }
    $id_encrypted = $db_handle->sanitizePost($_GET['hissdel']);
    $id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
    $id_encrypted = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
	$del_users = $zenta_operation->del_course($id_encrypted);
	if ($del_users){
		 $message_success = "You have successfully deleted the course's data";
	} else {
		$message_error = "Something went wrong. Please try again.";
	}
	header("Location:courses.php");

?>