<?php
// echo "Hello";
include('z_db.php');
// /**
//  * Created by Malik Abiola.
//  * Date: 28/02/2016
//  * Time: 15:47
//  * IDE: PhpStorm
//  */
// //Load composer autoload
// require_once __DIR__ . '/vendor/autoload.php';
// //load environment variables
// //(new \Dotenv\Dotenv(__DIR__))->load();

// //this is after the payment has TRIED by the user
// try {
// 	//create paystack lib object
// 	//    $paystack_lib_object = \MAbiola\Paystack\Paystack::make();
// 	$paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');
// 	$verification = $paystack_lib_object->verifyTransaction($_GET['trxref']);
// 	//if verification successful
// 	var_dump($verification);
// 	die();
// 	if ($verification) {
// 		//update customer records in db, probably add authorization for next time
// 		$payment_type = $verification['data']['channel'];
// 		$transaction_date = $verification['data']['transaction_date'];
// 		$currency = $verification['data']['currency'];
// 		$fees = $verification['fees'];
// 		$payment_type = $verification['data']['ip_address'];
// 		$attempts = $verification['log']['attempts'];
// 		$authorization_code = $verification['authorization']['authorization_code'];
// 		$reference = $verification['data']['reference'];
// 		$amount = $verification['data']['amount'];
// 		$payment_category = $_SESSION['payment_category'];

// 		$payment = $course_prov_object->paystack_payment($course_prov_code, $_GET['reference'], $_GET['trxref'], '1', $amount, $_SESSION['couprov_email'], $_SESSION['unique_id'], $payment_category, $currency);
// 		//redirect to a thank you page
// 		header('Location: paystack_thank_you.php');
// 	} else {
// 		$payment = $course_prov_object->paystack_payment($course_prov_code, $_GET['reference'], $_GET['trxref'], '2', $amount, $_SESSION['couprov_email'], $_SESSION['unique_id'], $payment_category, $currency);
// 		//mysql_query("DELETE FROM carrrt WHERE code='$unique'");
// 		header('Location: paystack_error.php');
// 	}
// } catch (Exception $e) {
// 	header("Location: paystack_error.php?error={$e->getMessage()}");
// }

$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if (!$reference) {
	die('No reference supplied');
}

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => [
		"accept: application/json",
		"authorization: Bearer sk_test_57a2c248333b88510c638f4c3605bb2b6063aee7",
		"cache-control: no-cache"
	],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
	// there was an error contacting the Paystack API
	die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if (!$tranx->status) {
	// there was an error from the API
	die('API returned error: ' . $tranx->message);
}

if ('success' == $tranx->data->status) {
	// echo "Helllo again";
	// session('shipping_address')->reference = $tranx->data->reference;
	// transaction was successful...
	// please check other things like whether you already gave value for this ref
	// if the email matches the customer who owns the product etc
	// Give value
	// return redirect('/place_order');
	//echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
	//update customer records in db, probably add authorization for next time
	$payment_type = $tranx->data->channel;
	$transaction_date = $tranx->data->transaction_date;
	$currency = $tranx->data->currency;
	// $fees = $tranx['fees'];
	$payment_type = $tranx->data->ip_address;
	// $attempts = $tranx->log['attempts'];
	// $authorization_code = $tranx->authorization['authorization_code'];
	$reference = $tranx->data->reference;
	$amount = $tranx->data->amount;
	$payment_category = $_SESSION['payment_category'];
	// var_dump($amount);

	$payment = $course_prov_object->paystack_payment($course_prov_code, $_GET['reference'], $_GET['trxref'], '1', $amount, $_SESSION['couprov_email'], $_SESSION['unique_id'], $payment_category, $currency, $_SESSION['plan_id']);
	//redirect to a thank you page
	header('Location: paystack_thank_you.php');
} else {
	$payment = $course_prov_object->paystack_payment($course_prov_code, $_GET['reference'], $_GET['trxref'], '2', $amount, $_SESSION['couprov_email'], $_SESSION['unique_id'], $payment_category, $currency);
	//mysql_query("DELETE FROM carrrt WHERE code='$unique'");
	header('Location: paystack_error.php');
}
