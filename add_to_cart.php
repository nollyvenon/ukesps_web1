<?php
include_once('z_db.php');
$ref = @$_SERVER['HTTP_REFERER'];
if (!isset($_SESSION['student_cart'])) {
  $_SESSION['student_cart'] = array();
}
// var_dump($_SESSION['cart']);
// die();
$tpp = $_GET['pptc'];
if (isset($_GET['sssid'])) {
  if (!in_array($_GET['sssid'], $_SESSION['student_cart'])) { //check if that plan ID already exists in the array, if no add
    array_push($_SESSION['student_cart'], $_GET['sssid']);
    $_SESSION['payment_category'] = $tpp;
  }
}

if (isset($_GET['bn']) && $_GET['bn'] == 'buynow') {
  redirect_to('cart');
}
redirect_to($ref);
