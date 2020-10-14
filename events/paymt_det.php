<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
$cart_total = $event_prov_object->get_cart_total($ssid);
$cart_info = $event_prov_object->get_order_items($ssid);
$payment = $event_prov_object->past_payment_det($ssid);
extract($payment);
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<?php include('./event_sidebar.php') ?>
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				Total Amount = <?php echo number_format($payment_amount); ?>
				<div class="jumbotron text-center">
					<h3>Event Providing Plan payment</h3>
					<p>Total Amount = <?php echo number_format($payment_amount); ?></p>
				</div>

			</div>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>