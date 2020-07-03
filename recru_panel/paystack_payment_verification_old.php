<?php
include('z_db.php');
/**
 * Created by Malik Abiola.
 * Date: 28/02/2016
 * Time: 15:47
 * IDE: PhpStorm
 */
//Load composer autoload
require_once __DIR__ . '/vendor/autoload.php';
//load environment variables
//(new \Dotenv\Dotenv(__DIR__))->load();

//this is after the payment has TRIED by the user
try {
    //create paystack lib object
//    $paystack_lib_object = \MAbiola\Paystack\Paystack::make();
	$paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');
    $verification = $paystack_lib_object->verifyTransaction($_GET['trxref']);
    //if verification successful
    if ($verification) {
        //update customer records in db, probably add authorization for next time
		$payment_type = $verification['data']['channel'];
		$transaction_date = $verification['data']['transaction_date'];
		$currency = $verification['data']['currency'];
		$fees = $verification['fees'];
		$payment_type = $verification['data']['ip_address'];
		$attempts = $verification['log']['attempts'];
		$authorization_code = $verification['authorization']['authorization_code'];
		$reference = $verification['data']['reference'];
		$amount = $verification['data']['amount'];
		$payment_category = $_SESSION['payment_category'];
		
		$payment = $recruit_object->paystack_payment($recruiter_code, $_GET['reference'],$_GET['trxref'], '1', $amount, $_SESSION['recruit_email'],$_SESSION['unique_id'], $payment_category, $currency);
        //redirect to a thank you page
        header('Location: paystack_thank_you.php');
    } else {
		$payment = $recruit_object->paystack_payment($recruiter_code, $_GET['reference'],$_GET['trxref'], '2', $amount, $_SESSION['recruit_email'],$_SESSION['unique_id'], $payment_category, $currency);
 		//mysql_query("DELETE FROM carrrt WHERE code='$unique'");
       header('Location: paystack_error.php');
	}

} catch (Exception $e) {
    header("Location: paystack_error.php?error={$e->getMessage()}");
}