<?php
require_once("z_db.php");
$session_recruiter->logout();
redirect_to("login.php?logout=1");