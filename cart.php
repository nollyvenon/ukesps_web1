<?php
require_once("main_header.php");
ob_start();
if (!isset($_SESSION['student_cart'])) {
	$_SESSION['student_cart'] = array();
}
if (isset($_GET['sssid'])) {
	if (!in_array($_GET['sssid'], $_SESSION['student_cart'])) { //check if that plan ID already exists in the array, if no add
		array_push($_SESSION['student_cart'], $_GET['sssid']);
	}
}
//print_r( $_SESSION['student_cart']);
// $_SESSION['payment_category'] = $_GET['pptc'];
if (isset($_POST['proceed'])) {
	$unique = $_SESSION['unique'];
	$total_qty = sizeof($_SESSION['student_cart']);
	$total_price = $_POST['total_grand_amount'];
	$OrderID = $clientOperation->add_to_order($total_price, $total_qty, $unique, $paymentmode);
	$xxid = encrypt($OrderID);
	$_SESSION['OrderID'] = $OrderID;
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	foreach ($qty as $a => $b) {
		$course_id = $_SESSION['student_cart'][$a];
		//$planID = $_POST['planID']; 
		$currency = $zenta_operation->get_course_by_id($course_id)['course_currency'];
		$qty = intval($_POST['qty'][$a]);
		$price = $_POST['price'][$a];
		$clientOperation->add_to_cart($course_id, $price, $qty, $OrderID, $unique, $currency);
	}
	redirect_to("checkout?sid=" . $xxid);
}
if ($_POST['delete_cart_action']) {
	$unique = $_SESSION['unique'];
	$clientOperation->delete_cart($unique);
	unset($_SESSION['student_cart']);
	mysqli_query($admin_db_conn, "DELETE from product_wishlist WHERE code='$unique'");
}

if ($_POST['deleteitem']) {
	$item_id = $_POST['hiditemid'];
	$data1 = $clientOperation->delete_cart_item($unique, $item_id);
	if ($data1) {
		$message_error = "Course deleted successfully.";
	}
}
/*if (!$session_course_prov->is_logged_in()) {
    redirect_to("login");
}*/
//print_r($_SESSION['cart']);
?>

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
			<a href="courses" class="button-back">Back to shopping<i class="fa fa-angle-double-right"></i></a>
		</div>
		<div id="content" role="main">
			<?php if (empty($_SESSION['student_cart'])) {
				echo "<center><h3>Cart is empty</h3>Kindly select a course.</center>";
			} else { ?>
				<form action="" method="post">
					<table id="tblProducts" class="shop_table cart">
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
							$max = sizeof($_SESSION['student_cart']);
							for ($i = 0; $i < $max; $i++) {
								$course_id = $_SESSION['student_cart'][$i];
								if ($_SESSION['payment_category'] == '4') { //course
									$row = $zenta_operation->get_course_by_id($course_id);
									//extract($cou_detail);
								}
							?>
								<tr class="cart_item">
									<td class="product-thumbnail">
										<a href="course_det?sid=<?= $row['course_id']; ?>">
											<img src="img/courses/<?= $row['course_img']; ?>" data-at2x="img/courses/<?= $row['course_img']; ?>" class="attachment-shop_thumbnail wp-post-image" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="course_det?sid=<?= $row['course_id']; ?>"><?= $row['course_title']; ?></a>
									</td>
									<td class="product-price">
										<span class="amount txtCal price"><?= $row['course_fee']; ?></span><input type="hidden" class="price" value="<?= $row['course_fee']; ?>" id="price" name="price[]" />
										<input type="hidden" value="<?= $row['course_id']; ?>" name="course_id[]" />
									</td>
									<td align="center" class="product-quantity">
										<div class="quantity buttons_added txtCal">
											<input id="qty" type="number" step="1" min="0" name="qty[]" value="1" title="Qty" class="input-text qty text">
										</div>
									</td>
									<td class="product-subtotal">
										<input type="hidden" class="subtot" value="<?= $row['course_fee']; ?>" name="subtot" />
										<span name="subtot1[]" id="subtot1" class="subtot1"><?= $row['course_fee']; ?><sup><?= $row['course_currency']; ?></sup></span>
									</td>
									<td class="product-remove">
										<a onclick="document.getElementById('id01').style.display='block'" href="#myModal" data-toggle="modal" data-id="<?= $row['course_id']; ?>" class="remove " title="Remove this item"></a>
									</td>
								</tr>
							<?php
								$total_amount += $row['course_fee'];
							}
							?>
						</tbody>
					</table>
					<table class="shop_table cart">
						<tbody>
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
										<td><sup><?= $row['course_currency']; ?></sup><span name="grdtot" id="grdtot" class="grdtot"><?= $total_amount; ?></span></td>
									</tr>
									<tr class="shipping">
										<th>Shipping</th>
										<td>
											Free Shipping
										</td>
									</tr>
									<tr class="order-total">
										<th>Order Total</th>
										<td><sup><?= $row['course_currency']; ?></sup><span id="order_total" class="amount"><?= $total_amount; ?></span>
											<input type="hidden" name="total_grand_amount" class="total_grand_amount" value="<?= $total_amount; ?>" />
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
		</div>
		</form>
	<?php } ?>
	<!--Shop -->
	<section class="fullwidth-background testimonial padding-section">
		<div class="grid-row">
			<h2 class="center-text">Testimonials</h2>
			<div class="owl-carousel testimonials-carousel">
				<?php
				$content = $zenta_operation->get_testimonials('3');
				if (isset($content) && !empty($content)) {
					foreach ($content as $row) {
				?>
						<div class="gallery-item">
							<div class="quote-avatar-author clear-fix"><img src="img/testimonials/<?= $row['testi_image']; ?>" data-at2x="img/testimonials/<?= $row['testi_image']; ?>" alt="">
								<div class="author-info"><?= $row['testi_name']; ?><br><span><?= $row['testi_designation']; ?></span></div>
							</div>
							<?= $row['testi_content']; ?>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</section>
	</div>
</div>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <div id="id01" class="w3-modal">
	<div class="w3-modal-content">
		<div class="w3-container">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this cart item, this process is irreversible.<br><br>
					<input name="hiditemid" id="hiditemid" type="text">
					<div class="fetched-data"></div>
				</div>
				<div class="modal-footer">
					<form id="form1" name="form1" method="post" action="">
						<input name="deleteitem" type="submit" class="btn btn-danger" value="Delete Item !">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> -->
</form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this cart item, this process is irreversible.<br><br>
				<input name="hiditemid" type="hidden">
				<div class="fetched-data"></div>
			</div>
			<div class="modal-footer">
				<form id="form1" name="form1" method="post" action="">
					<input name="deleteitem" type="submit" class="btn btn-danger" value="Delete Item !">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>

	</div>
</div>
<script>
	$(document).on("click", ".remove", function() {
		var myBookId = $(this).data('id');
		$(".modal-body #hiditemid").val(myBookId);
	});
</script>
<?php include_once('main_footer.php'); ?>