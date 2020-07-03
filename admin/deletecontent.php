<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}$id = $_GET['id'];
 $result = $bio_operation->deletecontent($id);
        if($result) {
             $message_success = "Content was successfully deleted";
        } else {
            $message_error = "Content was not successfully deleted.";
        }
header("Location:managecontent.php");

?>
