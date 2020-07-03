<?php
require_once("z_db.php");
$session_jobseek->logout();
redirect_to("login.php?logout=1");