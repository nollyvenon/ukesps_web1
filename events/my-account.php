<?php
require_once("z_db.php");
/*if (!$session_event_prov->is_logged_in()) {
    redirect_to("login");
}*/ 
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<!-- Shop -->
			<div class="title clear-fix">
				<h2 class="title-main">Cart</h2>
				<a href="../shop-product-list.html" class="button-back">Back to shopping<i class="fa fa-angle-double-right"></i></a>
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
							<tr class="cart_item">
								<td class="product-thumbnail">
									<a href="../shop-single-item.html">
										<img src="http://placehold.it/65x65" data-at2x="http://placehold.it/65x65" class="attachment-shop_thumbnail wp-post-image" alt="">
									</a>					
								</td>
								<td class="product-name">
									<a href="../shop-single-item.html">Donec ut velit varius Fusce nec nisl vulputate </a>			
								</td>
								<td class="product-price">
									<span class="amount"><?=$SiteCurrency;?><?php echo $ordr['totalprice']; ?></span>			
								</td>
								<td class="product-quantity">
									<div class="quantity buttons_added">
										<input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text">
									</div>					
								</td>
								<td class="product-subtotal">
									<span class="amount"><?=$SiteCurrency;?>14500</span>		
								</td>
								<td class="product-remove">
									<a href="#" class="remove" title="Remove this item"></a>	
								</td>
							</tr>
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
									<td><span class="amount">$12</span></td>
								</tr>
								<tr class="shipping">
									<th>Shipping</th>
									<td>	
										Free Shipping		
									</td>
								</tr>
								<tr class="order-total">
									<th>Order Total</th>
									<td><span class="amount">$12</span></td>
								</tr>			
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--Shop -->
		</div>
	</div>
	<?php include_once('../header.php');?>
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