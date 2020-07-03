<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}$id = $_GET['id'];
 $result = $bio_operation->deleteservices($id);
        if($result) {
             $message_success = "Service was successfully deleted";
        } else {
            $message_error = "Service was not successfully deleted.";
        }
header("Location:manageservices.php");

?>
