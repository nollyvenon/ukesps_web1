<?php
ob_start();
include('z_db.php');

/**
 * Created by Malik Abiola.
 * Date: 28/02/2016
 * Time: 14:58
 * IDE: PhpStorm
 */

//Load composer autoload
require_once __DIR__ . '/vendor/autoload.php';
//load environment variables
(new \Dotenv\Dotenv(__DIR__))->load();

$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
$_SESSION['sssid'] = $ssid;

$customer_email = $_SESSION['client_email'];

//create paystack lib object
//$paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');
$paystack_lib_object = \MAbiola\Paystack\Paystack::make();


$cart_amount = $clientOperation->get_cart_total($ssid);
$course_id = $clientOperation->get_order_items($ssid)[0]['pid'];
$currency = $zenta_operation->get_course_by_id($course_id)['course_currency'];
$currency_info = $zenta_operation->get_currency_info($currency);
$currency_rate = $currency_info['currency_rate'];
$cart_amount = $cart_amount/$currency_rate*100; //make it in kobo
//$cart_amount = 50000;
//create transaction
try {
    $authorization = $paystack_lib_object->startOneTimeTransaction($cart_amount, $customer_email);
    //we should probably save the reference and email here so we can match/update records
    //redirect to payment authorization URL
    header('Location: ' . $authorization['authorization_url']);
} catch (Exception $e) {
    header("Location: paystack_error.php?error={$e->getMessage()}");
	echo $e->getMessage();
}
