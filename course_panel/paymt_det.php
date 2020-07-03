<?php
require_once("z_db.php");
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_course_prov->is_logged_in()) {
    redirect_to("login");
}
$cart_total = $course_prov_object->get_cart_total($ssid);
$cart_info = $course_prov_object->get_order_items($ssid);
extract($cart_info);
$payer_det = $zenta_operation->get_user_by_email($payer_email);
$payer_name = $payer_det['first_name'].' '.$payer_det['middle_name'].' '.$payer_det['last_name'];
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
                    Total Amount = <?= $payment_currency;?><?php echo $cart_total;?>
                    <div class="jumbotron text-center">
                      <h3>Course payment</h3>
                      <p>Payer Email: <?php echo $payer_email;?></p>
                      <p>Payer Name: <?php echo $payer_name;?></p>
						<p>Payment Status: <?php echo payment_status($payment_status);?></p>
						<p>Payment: <?php echo payment_category($payment_category);?></p>
                    </div>
                    <div class="container">
                        <div class="col-sm-8">
                             Course Name
                        </div>
                        <div class="col-sm-2">
                             Qty
                        </div>
                        <div class="col-sm-1">
                             Price
                        </div>
                    <?php if(isset($cart_info) && !empty($cart_info)) { foreach ($cart_info as $row) {   ?>
                      <div class="row">
                        <div class="col-sm-8">
                              <?php echo $course_prov_object->course_provider_plan_detail_by_id($row['pid'])['plan_name'];?>
                        </div>
                        <div class="col-sm-2">
                              <?php echo $row['pquantity'];?>
                        </div>
                        <div class="col-sm-1">
                              <?php echo $row['productprice'];?>
                        </div>
                      </div>
                    <?php }}?>
                    </div>
					 
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