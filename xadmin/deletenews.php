<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}$id = $_GET['id'];
 $result = $bio_operation->deletenews($id);
        if($result) {
             $message_success = "News was successfully deleted";
        } else {
            $message_error = "News was not successfully deleted.";
        }
header("Location:managenews.php");

?>
