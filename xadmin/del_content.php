<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}$id = $_GET['sid'];
 $result = $zenta_operation->del_event($id);
        if($result) {
             $message_success = "Content was successfully deleted";
        } else {
            $message_error = "Content was not successfully deleted.";
        }
header("Location:manage_content.php");

?>
