<?php
include('z_db.php');
include('includes/class_payment.php');
include('includes/class_event_provider.php');
include('includes/class_course_provider.php');
include('includes/class_recruiter.php');
/**
 * Created by Malik Abiola.
 * Date: 28/02/2016
 * Time: 15:47
 * IDE: PhpStorm
 */
//Load composer autoload
require_once __DIR__ . '/vendor/autoload.php';
$payment_object = new paymentOperation();
	//load environment variables
	(new \Dotenv\Dotenv(__DIR__))->load();

//this is after the payment has TRIED by the user
try {
    //create paystack lib object
    $paystack_lib_object = \MAbiola\Paystack\Paystack::make();
	//$paystack_lib_object = \MAbiola\Paystack\Paystack::make('sk_test_2183668043518716ea1276c2fded49d47a8c17cf');
    $verification = $paystack_lib_object->verifyTransaction($_GET['trxref']);
		
	if (isset($_SESSION['eventprov_unique_code'])) {
        $payer_code=$_SESSION['eventprov_unique_code'];;
    } elseif (isset($_SESSION['recruit_unique_code'])) {
        $payer_code=$_SESSION['recruit_unique_code'];;
    } elseif (isset($_SESSION['client_unique_code'])) {
        $payer_code=$_SESSION['client_unique_code'];;
    }
	
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
		
		$payment = $payment_object->paystack_payment($payer_code, $_GET['reference'],$_GET['trxref'], '1', $amount, $_SESSION['client_email'],$_SESSION['unique_id'], $payment_category, $currency, '2');
        //redirect to a thank you page
        header('Location: paystack_thank_you.php');
    } else {
		$payment = $payment_object->paystack_payment($payer_code, $_GET['reference'],$_GET['trxref'], '2', $amount, $_SESSION['client_email'],$_SESSION['unique_id'], $payment_category, $currency, '2');
 		//mysql_query("DELETE FROM carrrt WHERE code='$unique'");
       header('Location: paystack_error.php');
	}

} catch (Exception $e) {
    header("Location: paystack_error.php?error={$e->getMessage()}");
}