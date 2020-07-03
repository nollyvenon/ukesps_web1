<?php
include_once("z_db.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
   $id_encrypted = $db_handle->sanitizePost($_GET['hissdel']);
    $id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
    $id_encrypted = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
 $result = $recruit_object->del_appl_list($id_encrypted);
        if($result) {
             $message_success = "Content was successfully deleted";
        } else {
            $message_error = "Content was not successfully deleted.";
        }
header("Location:applicant_lists");

?>
