<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}$id = $_GET['id'];
$picture = $_GET['c'];
$picture1  = "../img/slides/$picture";

 $result = $bio_operation->deleteslide($id);
        if($result) {
             $message_success = "picture was successfully deleted";
        } else {
            $message_error = "picture was not successfully deleted.";
        }unlink($picture1);
header("Location:manageslider.php");

?>