<?php
include_once('z_db.php');
$ref=@$_SERVER['HTTP_REFERER'];
if(!isset($_SESSION['cart']) ){
   $_SESSION['cart']=array();
}
$tpp = $_GET['pptc'];
if(isset($_GET['sssid']) ){
  if (!in_array($_GET['sssid'], $_SESSION['cart'])){ //check if that plan ID already exists in the array, if no add
      array_push($_SESSION['cart'], $_GET['sssid']);
      //$_SESSION['payment_category'] = $tpp;
  }
}
redirect_to($ref); 
?>