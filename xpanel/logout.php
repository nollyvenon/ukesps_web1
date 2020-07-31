<?php
require_once("z_db.php");
$session_client->logout();
redirect_to("login");
