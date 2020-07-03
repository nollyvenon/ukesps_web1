<?php
require_once("z_db.php");
$session_event_prov->logout();
redirect_to("login.php?logout=1");