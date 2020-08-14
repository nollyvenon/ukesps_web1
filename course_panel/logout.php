<?php
require_once("z_db.php");
$session_course_prov->logout();
redirect_to("login.php?logout=1");
