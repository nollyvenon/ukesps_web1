<?php
require_once("z_db.php");
$countries = $zenta_operation->get_all_countries();
 $id_encrypted = $db_handle->sanitizePost($_GET['sid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if ($_SESSION['payment_category'] == '1'){ //recruitment
	$cart_info = $recruit_object->get_cart_info($ssid);
 	$cart_total = $recruit_object->get_cart_total($ssid);
}elseif($_SESSION['payment_category'] == '2'){//cv search
	$cart_info = $recruit_object->get_cvsearch_cart_info($ssid);
 	$cart_total = $recruit_object->get_cvsearch_cart_total($ssid);
}
if ($_POST['create_account']){
    $xxid = encrypt($ssid);
    $billing_country = $db_handle->sanitizePost($_POST['billing_country']);
    $billing_first_name = $db_handle->sanitizePost($_POST['billing_first_name']);
    $billing_last_name = $db_handle->sanitizePost($_POST['billing_last_name']);
    $billing_company = $db_handle->sanitizePost($_POST['billing_company']);
    $billing_address_1 = $db_handle->sanitizePost($_POST['billing_address_1']);
    $billing_address_2 = $db_handle->sanitizePost($_POST['billing_address_2']);
    $billing_city = $db_handle->sanitizePost($_POST['billing_city']);
    $billing_state = $db_handle->sanitizePost($_POST['billing_state']);
    $billing_email = $db_handle->sanitizePost($_POST['billing_email']);
    $billing_phone = $db_handle->sanitizePost($_POST['billing_phone']);
    $account_username = $db_handle->sanitizePost($_POST['account_username']);
    $account_password = $db_handle->sanitizePost($_POST['account_password']);
    
     if($db_handle->numRows("SELECT username FROM recruiters WHERE username = '$account_username'") > 0) { 
         $message_error .= "Username already exists in our database.";
         goto exitpoint; };
    
    $recruiters = $recruit_object->add_new_recruiter($billing_first_name,$billing_last_name, $billing_phone, $billing_email, $account_username, $account_password, $billing_company,$billing_address_1, $billing_address_2,$billing_city, $billing_state,$billing_country);
    $found_client = $recruit_object->authenticate($account_username, $account_password);

      if($found_client) {
          $recruiter_code = $found_client[0]['recruiter_code'];
          if($recruit_object->recruiter_is_active($recruiter_code)) {
              $found_client = $found_client[0];
              $session_recruiter->login($found_client);					
              //redirect_to("checkout");
               redirect_to("payment?xxid=$xxid");
          } else {
              $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
          }
      } else {
          // username/password combo was not found in the database
          $message_error = "Username and password combination do not match.";
      }
    //redirect_to("payment?xxid=$xxid");
    exitpoint:
}

if ($_POST['login']){
    $xxid = encrypt($ssid);
    $account_username = $db_handle->sanitizePost($_POST['account_username']);
    $account_password = $db_handle->sanitizePost($_POST['account_password']);
    
    // Check database to see if username/password exist.
      $found_client = $recruit_object->authenticate($account_username, $account_password);
   // print_r($found_client);
      if($found_client) {
          echo $recruiter_code = $found_client[0]['recruiter_code'];
          if($recruit_object->recruiter_is_active($recruiter_code)) {
              $found_client = $found_client[0];
              $session_recruiter->login($found_client);					
              //redirect_to("checkout");
               redirect_to("payment?xxid=$xxid");
          } else {
              $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
          }
      } else {
          // username/password combo was not found in the database
          $message_error = "Username and password combination do not match.";
      }
   
}

if ($_POST['payment']){
    $xxid = encrypt($ssid);
    redirect_to("payment?xxid=$xxid");
}

if ($session_recruiter->is_logged_in()) {
	$recruiter_detail = $recruit_object->get_recruiter_detail_by_code($recruiter_code);
	extract($recruiter_detail);
	 $recruit_object->update_cart_with_recruiter_code($recruiter_code, $unique, $_SESSION['payment_category']);
}
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="../css/styles.css">
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
                    <?php include_once("../layouts/feedback_message.php");?>
					<div class="coupon-enter">
						<p>Have a coupon? <a href="#">Click Here to enter your code</a></p>
						<div class="field-coupon">
							<input type="text" placeholder="Coupon code" value="" />
							<a href="#" class="cws-button border-radius small">Apply</a>
						</div>
					</div>
					<div class="col2-set" id="customer_details">
						<div class="col-1">
							<h3>Billing Details</h3>
                            <form action="#" method="post">
							<div class="woocommerce-billing-fields">
								
								<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">
									<label for="billing_country" class="">Country
										<abbr class="required" title="required">*</abbr>
									</label>
									<select name="billing_country" id="billing_country" class="country_to_state country_select filter">
										<option value="">Select a country&hellip;</option>
										<?php 
										foreach($countries as $row2){
										?>
                                    		<option value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
										<?php } ?>
										
									</select>
									<noscript>
										<input type="submit" name="woocommerce_checkout_update_totals" value="Update country" />
									</noscript>
								</p>
								<p class="form-row form-row-first validate-required" id="billing_first_name_field">
									<label for="billing_first_name" class="">First Name
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="<?php echo $first_name;?>" />
								</p>
								<p class="form-row form-row-last validate-required" id="billing_last_name_field">
									<label for="billing_last_name" class="">Last Name
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="<?php echo $last_name;?>" />
								</p>
								<div class="clear"></div>
								<p class="form-row form-row-wide" id="billing_company_field">
									<label for="billing_company" class="">Company Name</label>
									<input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="<?php echo $billing_company;?>" />
								</p>
								<p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
									<label for="billing_address_1" class="">Address
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address" value="<?php echo $billing_address_1;?>" />
								</p>
								<p class="form-row form-row-wide address-field" id="billing_address_2_field">
									<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="<?php echo $billing_address_2;?>" />
								</p>
								<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
									<label for="billing_city" class="">Town / City
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="Town / City" value="<?php echo $billing_city;?>" />
								</p>
								<p class="form-row form-row-first address-field validate-required validate-state" id="billing_state_field">
									<label for="billing_state" class="">State / County
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " value="<?php echo $billing_state;?>" placeholder="" name="billing_state" id="billing_state" />
								</p>
								<div class="clear"></div>
								<p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
									<label for="billing_email" class="">Email Address
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_email" id="billing_email" placeholder="" value="<?php echo $email;?>" />
								</p>
								<p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
									<label for="billing_phone" class="">Phone
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="<?php echo $phone;?>" />
								</p>
								<div class="clear"></div>	
                                <?php  if ($session_recruiter->is_logged_in()) { ?>
                                <input type="submit" class="cws-button bt-color-4" name="payment" value="Proceed to Payment">
                                <?php } ?>
							</div>

                        <?php  if (!$session_recruiter->is_logged_in()) { ?>  
							<div class="create-account">
								<p class="form-row form-row-wide checkbox">
									<input type="checkbox" id="checkbox" value="None" name="check">
									<label for="checkbox"></label>
									<span>Create an account?</span>
								</p>
								<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
								<p class="validate-required" id="account_password_field">
									<label for="account_username" class="">Account username
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="account_username" id="account_username" value="" />
								</p>
                                <p class="validate-required" id="account_username_field">
									<label for="account_password" class="">Account password
										<abbr class="required" title="required">*</abbr>
									</label>
									<input type="text" class="input-text " name="account_password" id="account_password" value="" />
								</p>
								<div class="clear"></div>
                                <input type="submit" class="cws-button bt-color-3" name="create_account" value="Create Account">
                                <input type="submit" class="cws-button bt-color-5" name="login" value="Login to Account">
							</div>
                        <?php } ?>
                                </form>
						</div>
						<div class="col-2">
							<div class="cart_totals">	
								<h3>Your order</h3>
								<table>
									<tbody>
										<tr class="">
											<th>Product</th>
											<td>Total</td>
										</tr>
										<tr class="cart-subtotal">
											<th>Cart Subtotal</th>
											<td><span class="amount">$<?=$cart_total;?></span></td>
										</tr>
										<tr class="shipping">
											<th>Shipping and Handing</th>
											<td>	
												Free Shipping		
											</td>
										</tr>
										<tr class="order-total">
											<th>Order Total</th>
											<td><span class="amount">$<?=$cart_total;?></span></td>
										</tr>			
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php include_once('recru_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>
</html>