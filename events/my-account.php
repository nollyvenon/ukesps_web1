<?php
require_once("z_db.php");
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (!in_array($_GET['sssid'], $_SESSION['cart'])) { //check if that plan ID already exists in the array, if no add
	array_push($_SESSION['cart'], $_GET['sssid']);
}
//print_r( $_SESSION['cart']);
$_SESSION['payment_category'] = $_GET['pptc'];
if ($_POST['proceed']) {
	$unique = $_SESSION['unique'];
	$xxid = encrypt($unique);
	$total_qty = sizeof($_SESSION['cart']);
	$total_price = $_POST['total_grand_amount'];
	$OrderID = $event_prov_object->add_to_order($total_price, $total_qty, $unique);
	$_SESSION['OrderID'] = $OrderID;
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	foreach ($qty as $a => $b) {
		$plan_id = $_SESSION['cart'][$a];
		//$planID = $_POST['planID'];        
		$qty = intval($_POST['qty'][$a]);
		$price = $_POST['price'][$a];
		$event_prov_object->add_to_cart($plan_id, $price, $qty, $OrderID, $unique);
	}
	redirect_to("checkout?sid=" . $xxid);
}
if ($_POST['delete_cart_action']) {
	$unique = $_SESSION['unique'];
	$event_prov_object->delete_cart($unique);
	unset($_SESSION['cart']);
	mysqli_query($admin_db_conn, "DELETE from product_wishlist WHERE code='$unique'");
}

if ($_POST['deleteitem']) {
	$item_id = $_POST['hiditemid'];
	$data1 = $event_prov_object->delete_cart_item($unique, $plan_id);
	if ($data1) {
		$message_error = "Item deleted successfully.";
	}
}
// $uid = $_SESSION['customerid'];
// $cart = $_SESSION['cart'];
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<!-- Required Fremwork -->
	<!-- <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">

	<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">

	<!--styles -->
	<script type="text/javascript" src="../xadmin/ckeditor/ckeditor.js"></script>
	<!--styles -->
	<link rel="stylesheet" type="text/css" href="../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css" />
	<script src="../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

</head>

<body class="shop">

	<?php include_once('header.php'); ?>

	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-row">
				<div class="grid-col grid-col-3 sidebar">
					<!-- widget search -->
					<!-- widget categories -->
					<aside class="widget-categories" style="border:1px solid red; border-radius:5px; padding:10px;">
						<h2>Navigations</h2>
						<hr class="divider-big" />
						<ul>
							<li class="cat-item cat-item-1 current-cat"><a href="past_payments">View Past payments </span></a></li>
							<li class="cat-item cat-item-1 current-cat"><a href="view_events">View Posted Events <span> (7) </span></a></li>
							<li class="cat-item cat-item-1 current-cat"><a href="upcoming_events">My Upcoming Events</a></li>
							<li class="cat-item cat-item-1 current-cat"><a href="past_events">My Past Events</a></li>
							<!-- <li class="cat-item cat-item-1 current-cat"><a href="view_profile">My Profile</a></li> -->
							<li class="cat-item cat-item-1 current-cat"><a href="logout">Logout</a></li>
						</ul>
					</aside>
				</div>
				<div class="grid-col grid-col-8">
					<h3>Home Page</h3>
					<?php require_once '../layouts/feedback_message.php'; ?>
					<div class="info-box">
						<h4><?php echo $_SESSION['event_prov_first_name'] . ' ' . $_SESSION['event_prov_middle_name'] . ' ' . $_SESSION['event_prov_last_name'] ?></h4>
						<span class="instructor-profession"><?php echo $email ?></span>
						<div class="divider"></div>
						<p><?= $phone ?></p>
						<p><?= $billing_address_1 . '<br>' . $billing_address_2 ?></p>
					</div>
					<div class="col-md-4">
						<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country) ?></p>
						<p><b>Gender: </b> <?= $gender ?></p>
						<p><b>Company: </b> <?= $billing_company ?></p>

						<?php if (!$recruit_object->is_recruit_plan_valid($recruiter_code)) { ?>
							<a href="post_a_job" class="cws-button bt-color-3">Buy a Plan</a>
						<?php	} ?>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>

	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>

</html>