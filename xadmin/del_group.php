<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
if (!in_array(27, $my_pages)) {
	 $message_error .= "You do not have right to that page or feature. Regards.";
	redirect_to("dashboard?msg=10");
 }
$id_encrypted = $db_handle->sanitizePost($_GET['hissdel']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hissdel = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
	$del_group = $zenta_operation->del_group($hissdel);
	if ($del_group){
		 $message_success = "You have successfully deleted the Group information";
	} else {
		$message_error = "Something went wrong. Please try again.";
	}
	header("Location:brands");

?>