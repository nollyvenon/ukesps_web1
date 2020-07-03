<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}$id = $_GET['sid'];
 $result = $zenta_operation->del_event($id);
        if($result) {
             $message_success = "Event was successfully deleted";
        } else {
            $message_error = "Event was not successfully deleted.";
        }
header("Location:manage_events.php");

?>
