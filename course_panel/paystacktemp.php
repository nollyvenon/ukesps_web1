<?php

class PaystackLib
{
  public function paystack($request)
  {
    $curl = curl_init();

    $email = "awelewa_tobi@yahoo.com";
    $amount = $request->amount * 100;  //the amount in kobo. This value is actually NGN 300

    // url to go to after payment
    $callback_url = 'https://www.foodsupply.com.ng/paystack/callback';

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount' => $amount,
        'email' => $email,
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
    }

    // comment out this line if you want to redirect the user to the payment page
    //print_r($tranx);
    // redirect to page so User can pay

    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $tranx['data']['authorization_url']);
  }

  public function callback(Request $request)
  {
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
      session('shipping_address')->reference = $tranx->data->reference;
      // transaction was successful...
      // please check other things like whether you already gave value for this ref
      // if the email matches the customer who owns the product etc
      // Give value
      return redirect('/place_order');
      //echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
    }
  }
}
