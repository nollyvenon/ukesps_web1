<?php
require_once("../main_header.php");
/*if (!$session_course_prov->is_logged_in()) {
    redirect_to("login");
}*/
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];
?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<!-- Shop -->
		<div class="title clear-fix">
			<h2 class="title-main">Cart</h2>
			<a href="" class="button-back">Back to shopping<i class="fa fa-angle-double-right"></i></a>
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
								<span class="amount"><?= $SiteCurrency; ?><?php echo $ordr['totalprice']; ?></span>
							</td>
							<td class="product-quantity">
								<div class="quantity buttons_added">
									<input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text">
								</div>
							</td>
							<td class="product-subtotal">
								<span class="amount"><?= $SiteCurrency; ?>14500</span>
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
<?php include_once('../main_footer.php'); ?>