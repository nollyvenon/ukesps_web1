<?php
require_once("../Connections/initialize_admin.php");

$session_admin->logout();
header("location:login.php");

?>