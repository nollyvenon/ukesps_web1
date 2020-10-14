<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
$cart_total = $event_prov_object->get_cart_total($ssid);
$cart_info = $event_prov_object->get_order_items($ssid);
var_dump($ssid);
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<div class="jumbotron text-center">
					<h3>Event Plan payment</h3>
					<p>Total Amount = &pound;<?php echo $cart_total; ?></p>
				</div>
				<table id="tblProducts" class="shop_table cart">
					<thead>
						<tr>
							<th class="product-thumbnail">Product</th>
							<th class="product-name">&nbsp;</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>

						</tr>
					</thead>
					<tbody>
						<?php if (isset($cart_info) && !empty($cart_info)) {
							foreach ($cart_info as $row) {
								$pro_info = $event_prov_object->event_provider_plan_detail_by_id($row['pid']);
								$plan_name = $pro_info['plan_name'];
								$plan_cost = $pro_info['plan_cost'];
								$plan_image = $pro_info['plan_image'];
								$plan_id = $pro_info['plan_id'];
								$plan_currency = $pro_info['plan_currency'];

						?>

								<tr class="cart_item">
									<td class="product-thumbnail">
										<a href="../event_prov_plan_detail?sid=<?= $row['pid']; ?>">
											<img src="../img/events/<?= $plan_image; ?>" data-at2x="../img/events/<?= $plan_image; ?>" class="attachment-shop_thumbnail wp-post-image" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="../event_prov_plan_detail?sid=<?= $row['pid']; ?>"><?php echo $plan_name; ?></a>
									</td>
									<td class="product-price">
										<span class="amount txtCal price"><?= $plan_cost; ?></span><input type="hidden" class="price" value="<?= $plan_cost; ?>" id="price" name="price[]" />
										<input type="hidden" value="<?= $plan_id; ?>" name="planID[]" />
									</td>
									<td align="center" class="product-quantity">
										<div class="quantity buttons_added txtCal">
											<?php echo $row['pquantity']; ?>

										</div>
									</td>
									<td class="product-subtotal">
										<input type="hidden" class="subtot" value="<?= $plan_cost; ?>" name="subtot" />
										<span name="subtot1[]" id="subtot1" class="subtot1"><?= $plan_cost; ?><sup><?= $plan_currency; ?></sup></span>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
				<script src="https://www.paypal.com/sdk/js?client-id=AVTa5JLKgSabwhLq21ZylEOC4jdrb1-CA1BqWmAo89vFx7kru7bdVAZOWnjjkCrvQwCVUygHsKHSjk7L">
					// Replace YOUR_SB_CLIENT_ID with your sandbox client ID
				</script>

				<div id="paypal-button-container" style="width: 50%; margin: 50px auto;"></div>

				<!-- Add the checkout buttons, set up the order and approve the order -->
				<script>
					paypal.Buttons({
						createOrder: function(data, actions) {
							return actions.order.create({
								purchase_units: [{
									amount: {
										value: '<?php echo $cart_total; ?>'
									}
								}]
							});
						},
						onApprove: function(data, actions) {
							return actions.order.capture().then(function(details) {
								let type = '<?php echo $row['plan_period'] ?>';
								let price = '<?php echo $cart_total; ?>';
								let url = '<?php echo SITE_URL ?>/events/paypal_return.php';

								var xhr = new XMLHttpRequest();
								xhr.open("POST", url, true);

								//Send the proper header information along with the request
								xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

								xhr.onreadystatechange = function() { // Call a function when the state changes.
									if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
										let res = JSON.parse(xhr.response);
										if (res.status === 'success') {
											window.location = '<?php echo SITE_URL ?>/events/index';

										}
									}
								}

								xhr.send("id=<?php echo $ssid; ?>&price=" + price + "&gateway=Paypal&type=" + type + "&ref=" + details.id);
							});
						}
					}).render('#paypal-button-container'); // Display payment options on your web page
				</script>
			</div>
			<?php include_once('event_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>