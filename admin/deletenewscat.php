<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}$id = $_GET['id'];
 $result = $bio_operation->deletenewscat($id);
        if($result) {
             $message_success = "Testimonial was successfully deleted";
        } else {
            $message_error = "Testimonial was not successfully deleted.";
        }
header("Location:managenewscat.php");

?>
