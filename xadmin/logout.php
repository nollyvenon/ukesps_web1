<?php
require_once("../includes/initialize_admin.php");
$session_admin->logout();
redirect_to("log-in.php?logout=1");