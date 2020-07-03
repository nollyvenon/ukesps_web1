<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}$id = $_GET['id'];
 $result = $bio_operation->deleteteammember($id);
        if($result) {
             $message_success = "Team member was successfully deleted";
        } else {
            $message_error = "Team member was not successfully deleted.";
        }
header("Location:manageteammember.php");

?>
