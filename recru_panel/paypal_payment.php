<?php
require_once("z_db.php");
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}
$cart_total = $recruit_object->get_cart_total($ssid);
$cart_info = $recruit_object->get_order_items($ssid);
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

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
	<link rel="stylesheet" href="../css/styles.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
                    <?php include_once("../layouts/feedback_message.php");?>
                    Total Amount = <?php echo $cart_total;?>
                    <div class="jumbotron text-center">
                      <h3>Recruitment Plan payment</h3>
                      <p>Total Amount = <?php echo $cart_total;?></p>
                    </div>
                    <?php if(isset($cart_info) && !empty($cart_info)) { foreach ($cart_info as $row) {   ?>
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-8">
                              <?php echo $recruit_object->recruiting_plan_detail_by_id(['pid'])['plan_name'];?>
                        </div>
                        <div class="col-sm-2">
                              <?php echo $row['pquantity'];?>
                        </div>
                        <div class="col-sm-1">
                              <?php echo $row['productprice'];?>
                        </div>
                      </div>
                    </div>
                    <?php }}?>
					 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
            method="post" target="_top">
            <input type='hidden' name='business' value='ukesps@gmail.com'> 
            <?php if(isset($cart_info) && !empty($cart_info)) { foreach ($cart_info as $row) {   ?>
            <input type='hidden' name='item_name' value='<?php echo $recruit_object->recruiting_plan_detail_by_id(['pid'])['plan_name'];?>'> 
            <input type='hidden' name='item_number' value='<?php echo $row['pid'];?>'> 
            <input type='hidden' name='amount' value='<?php echo $row['productprice'];?>'> 
            <input type='hidden' name='no_shipping' value='1'> 
            <input type='hidden' name='currency_code' value='USD'> 
            <?php }}?>
            <input type='hidden'
                name='notify_url'
                value='https://<?=$_SERVER[HTTP_HOST];?>/recru_panel/notify.php'>
            <input type='hidden' name='cancel_return'
                value='https://<?=$_SERVER[HTTP_HOST];?>/recru_panel/cancel.php'>
            <input type='hidden' name='return'
                value='https://<?=$_SERVER[HTTP_HOST];?>/recru_panel/return.php'>
            <input type="hidden" name="cmd" value="_xclick"> <input
                type="submit" name="pay_now" id="pay_now"
                Value="Pay Now">
        </form>
				</div>
				<?php include_once('../course_sidebar.php');?>
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