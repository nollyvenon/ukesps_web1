<?php
require_once("../main_header.php");
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['sssid'])) {
	if (!in_array($_GET['sssid'], $_SESSION['cart'])) { //check if that plan ID already exists in the array, if no add
		array_push($_SESSION['cart'], $_GET['sssid']);
	}
} else {
	redirect_to('post_a_job');
}
//print_r( $_SESSION['cart']);
$_SESSION['plan_id'] = $_GET['sssid'];
$_SESSION['payment_category'] = $_GET['pptc'];
if ($_POST['proceed']) {
	$unique = $_SESSION['unique'];
	$xxid = encrypt($unique);
	$total_qty = 1;
	$total_price = $_POST['total_grand_amount'];

	if ($_GET['pptc'] == '1') { //recruitment
		$plan_id = $_GET['sssid'];
		$recru_detail = $recruit_object->recruiting_plan_detail_by_id($plan_id);
		$paymentmode = $recru_detail['plan_currency'];
		$OrderID = $recruit_object->add_to_order($total_price, $total_qty, $unique, $paymentmode);
		$_SESSION['OrderID'] = $OrderID;
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		foreach ($qty as $a => $b) {
			$plan_id = $_SESSION['cart'][$a];
			//$planID = $_POST['planID'];        
			$qty = intval($_POST['qty'][$a]);
			$price = $_POST['price'][$a];
			$recruit_object->add_to_cart($plan_id, $price, $qty, $OrderID, $unique);
		}
	} elseif ($_GET['pptc'] == '2') { //cv search
		$plan_id = $_GET['sssid'];
		$recru_detail = $recruit_object->recruiting_plan_detail_by_id($plan_id);
		$paymentmode = $recru_detail['plan_currency'];
		$OrderID = $recruit_object->add_to_cvsearch_order($total_price, $total_qty, $unique, $paymentmode);
		$_SESSION['OrderID'] = $OrderID;
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		foreach ($qty as $a => $b) {
			$plan_id = $_SESSION['cart'][$a];
			//$planID = $_POST['planID'];        
			$qty = intval($_POST['qty'][$a]);
			$price = $_POST['price'][$a];
			$recruit_object->add_to_cvsearch_cart($plan_id, $price, $qty, $OrderID, $unique);
		}
	}
	redirect_to("checkout?sid=" . $xxid);
}
if ($_POST['delete_cart_action']) {
	$unique = $_SESSION['unique'];
	$recruit_object->delete_cart($unique);
	unset($_SESSION['cart']);
	mysqli_query($admin_db_conn, "DELETE from product_wishlist WHERE code='$unique'");
}

if ($_POST['deleteitem']) {
	$item_id = $_POST['hiditemid'];
	$data1 = $recruit_object->delete_cart_item($unique, $plan_id);
	if ($data1) {
		$message_error = "Item deleted successfully.";
	}
}
/*if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}*/
//print_r($_SESSION['cart']);

?>
s
<!--styles -->
<script type="text/javascript">
	$(function() {
		$('.pnm, .price, .subtot, .grdtot').prop('readonly', true);
		var $tblrows = $("#tblProducts tbody tr");

		$tblrows.each(function(index) {
			var $tblrow = $(this);

			$tblrow.find('.qty').on('change', function() {

				var qty = $tblrow.find("[id=qty]").val();
				var price = $tblrow.find("[id=price]").val();
				var subTotal = parseInt(qty, 10) * parseFloat(price);

				if (!isNaN(subTotal)) {

					$tblrow.find('.subtot1').text(subTotal.toFixed(2));
					$tblrow.find('.subtot').val(subTotal.toFixed(2));
					var grandTotal = 0;

					$(".subtot").each(function() {
						var stval = parseFloat($(this).val());
						grandTotal += isNaN(stval) ? 0 : stval;
					});

					$('.total_grand_amount').val(grandTotal.toFixed(2));
					$('#grdtot').text(grandTotal.toFixed(2));
					$('#order_total').text(grandTotal.toFixed(2));
				}
			});
		});
	});
</script>


<div class="page-content woocommerce">
	<div class="container clear-fix">

		<!-- Shop -->
		<div class="title clear-fix">
			<h2 class="title-main">Cart</h2>
			<a href="post_a_job" class="button-back">Back to shopping<i class="fa fa-angle-double-right"></i></a>
		</div>
		<div id="content" role="main">
			<form action="#" method="post">
				<table id="tblProducts" class="shop_table cart">
					<thead>
						<tr>
							<th class="product-thumbnail">Product</th>
							<th class="product-name">&nbsp;</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>
							<!-- <th class="product-remove">&nbsp;</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						$total_amount = 0;
						$max = sizeof($_SESSION['cart']);
						// for ($i = 0; $i < $max; $i++) {
						$plan_id = $_SESSION['cart'][0];
						if ($_GET['pptc'] == '1') { //recruitment
							$recru_detail = $recruit_object->recruiting_plan_detail_by_id($_GET['sssid']);
							extract($recru_detail);
						} elseif ($_GET['pptc'] == '2') { //cv search
							$cv_detail = $recruit_object->cvsearch_detail_by_id($_GET['sssid']);
							extract($cv_detail);
						}
						?>
						<tr class="cart_item">
							<td class="product-thumbnail">
								<a href="../recruit_plan_detail?sid=<?= $plan_id; ?>">
									<img src="../img/recruiter_plan/<?= $plan_image; ?>" data-at2x="../img/recruit/<?= $plan_image; ?>" class="attachment-shop_thumbnail wp-post-image" alt="">
								</a>
							</td>
							<td class="product-name">
								<a href="../recruit_plan_detail?sid=<?= $plan_id; ?>"><?= $plan_name; ?></a>
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
						</tr>
						<?php
						$total_amount += $plan_cost;
						// }
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
			</form>
		</div>

	</div>
</div>
<script>
	$(document).on("click", ".remove", function() {
		var myBookId = $(this).data('id');
		$(".modal-body #hiditemid").val(myBookId);
	});
</script>
<?php include_once('../main_footer.php'); ?>