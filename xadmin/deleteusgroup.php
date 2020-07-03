<?php
ob_start();
if(!isset($_SESSION)) session_start(); 
include_once('file:///C|/wamp/www/conn.php'); 

$query = "SELECT * FROM userpriv where id ='$id'";
$result = mysql_query($query);

if (mysql_num_rows($result) == 0 ) {

	echo ('<p>No such information in the Database<br />'.
      'Error: ' . mysql_error() . '</p>');
} else {
			while ($row = mysql_fetch_array($result)) {
				$accttype = $row['accttype'];
				$usergroup = $row['usergroup'];
				
			}
}

mysql_query("DELETE FROM userpriv where id = '$id'");
header("Location:manageusgroup.php");
?>