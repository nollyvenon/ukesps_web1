<?php
ob_start();
include('z_db.php');

/**
 * Created by Malik Abiola.
 * Date: 28/02/2016
 * Time: 14:58
 * IDE: PhpStorm
 */
$curl = curl_init();
//Load composer autoload
// require_once '../vendor/autoload.php';
//load environment variables
//(new \Dotenv\Dotenv(__DIR__))->load();

$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

$customer_email = $_SESSION['client_email'];

//create paystack lib object
//$paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');
// $paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');


$cart_items = $clientOperation->get_order_items($ssid);
// $currency = $clientOperation->get_cart_info($ssid)['paymentmode'];
// var_dump($currency);
$cart_amount = 0;
foreach ($cart_items as $item) {
    $currency_info = $zenta_operation->get_currency_info($item['currency']);

    $currency_rate = $currency_info['currency_rate'];
    $cart_amount += $item['productprice'] / $currency_rate * 100; //make it in kobo
    // var_dump($cart_amount);
    var_dump($cart_amount);
    die();
}



// die();
$callback_url = SITE_URL . '/paystack_payment_verification';
//create transaction
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'amount' => $cart_amount,
        'email' => $customer_email,
        'callback_url' => $callback_url
    ]),
    CURLOPT_HTTPHEADER => [
        "authorization: Bearer sk_test_57a2c248333b88510c638f4c3605bb2b6063aee7", //replace this with your own test key
        "content-type: application/json",
        "cache-control: no-cache"
    ],
));
$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
    // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if (!$tranx['status']) {
    // there was an error from the API
    print_r('API returned error: ' . $tranx['message']);
} else {
    header('Location: ' . $tranx['data']['authorization_url']);
}

// try {
//     // $authorization = $paystack_lib_object->startOneTimeTransaction($cart_amount, $customer_email);
//     //we should probably save the reference and email here so we can match/update records
//     //redirect to payment authorization URL
//     // var_dump($authorization['authorization_url']);
//     // die();
//     header('Location: ' . $authorization['authorization_url']);
// } catch (Exception $e) {
//     header("Location: paystack_error.php?error={$e->getMessage()}");
//     //echo $e->getMessage();
// }
