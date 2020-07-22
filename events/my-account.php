<?php
require_once("z_db.php");

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
			<!-- Shop -->
			<div class="title clear-fix">
				<h2 class="title-main">Cart</h2>
				<a href="javascript:void(0)" class="button-back"><i class="fa fa-angle-double-right"></i></a>
			</div>
			<div id="content" role="main">
				<form action="#" method="post">
					<table class="shop_table cart">
						<thead>
							<tr>
								<th class="product-thumbnail">Product</th>
								<th class="product-name">&nbsp;</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-subtotal">Total</th>
								<th class="product-remove">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$total_amount = 0;
							$max = sizeof($_SESSION['cart']);
							for ($i = 0; $i < $max; $i++) {
								$recru_detail = $event_prov_object->event_provider_plan_detail_by_id($plan_id);
								extract($recru_detail);
							?>
								<tr class="cart_item">
									<td class="product-thumbnail">
										<a href="../course_prov_plan_detail?sid=<?= $plan_id; ?>">
											<img src="../img/course_prov/<?= $plan_image; ?>" data-at2x="../img/course_prov/<?= $plan_image; ?>" class="attachment-shop_thumbnail wp-post-image" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="../course_prov_plan_detail?sid=<?= $plan_id; ?>"><?= $plan_name; ?></a>
									</td>
									<td class="product-price">
										<span class="amount txtCal price"><?= $plan_cost; ?></span><input type="hidden" class="price" value="<?= $plan_cost; ?>" id="price" name="price[]" />
										<input type="hidden" value="<?= $plan_id; ?>" name="planID[]" />
									</td>
									<td align="center" class="product-quantity">
										<div class="quantity buttons_added txtCal">
											<input id="qty" type="number" step="1" min="0" name="qty[]" value="1" title="Qty" class="input-text qty text">
										</div>
									</td>
									<td class="product-subtotal">
										<input type="hidden" class="subtot" value="<?= $plan_cost; ?>" name="subtot" />
										<span name="subtot1[]" id="subtot1" class="subtot1"><?= $plan_cost; ?><sup><?= $plan_currency; ?></sup></span>
									</td>
									<td class="product-remove">
										<a onclick="document.getElementById('id01').style.display='block'" href="#myModal" data-toggle="modal" data-id="<?= $plan_id; ?>" class="remove " title="Remove this item"></a>
									</td>
								</tr>
							<?php
								$total_amount += $plan_cost;
							}
							?>
							<tr>
								<td colspan="6" class="actions">
									<div class="coupon">
										<label for="coupon_code">Coupon:</label>
										<input type="text" name="coupon_code" class="input-text corner-radius-top" id="coupon_code" value="" placeholder="Coupon code">
										<input type="submit" class="cws-button corner-radius-bottom" name="apply_coupon" value="Apply Coupon">
									</div>
									<input type="submit" class="cws-button bt-color-5" name="update_cart" value="Update Cart">
									<input type="submit" class="cws-button bt-color-3" name="proceed" value="Proceed to Checkout">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				<hr class="divider-color" />
				<div class="cart-collaterals">
					<div class="cart_totals ">
						<h3>Cart Totals</h3>
						<table>
							<tbody>
								<tr class="cart-subtotal">
									<th>Cart Subtotal</th>
									<td><sup><?= $plan_currency; ?></sup><span name="grdtot" id="grdtot" class="grdtot"><?= $total_amount; ?></span></td>
								</tr>
								<tr class="shipping">
									<th>Shipping</th>
									<td>
										Free Shipping
									</td>
								</tr>
								<tr class="order-total">
									<th>Order Total</th>
									<td><sup><?= $plan_currency; ?></sup><span id="order_total" class="amount"><?= $total_amount; ?></span>
										<input type="hidden" name="total_grand_amount" class="total_grand_amount" value="<?= $total_amount; ?>" />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--Shop -->
		</div>
	</div>
	<?php include_once('../footer.php'); ?>
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