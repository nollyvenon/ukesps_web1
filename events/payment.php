<?php
require_once("../main_header.php");
$ssid = $_GET['xxid'];
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
$cart_total = $event_prov_object->get_cart_total($ssid);

?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<div class="jumbotron text-center">
					<h3>Event Plan payment</h3>
					<p>Select a payment method</p>
				</div><br><br>
				<div class="grid-col-row">
					<!-- <div class="grid-col grid-col-4 ">
						<a href="paypal_payment?xxid=<?php echo encrypt($ssid); ?>"><img width="80%" src="../img/paypal-logo-png-512.png" alt="" /> </a>
					</div> -->
					<div class="grid-col grid-col-4 ">
						<a href="paystack_create_payment?xxid=<?php echo encrypt($ssid); ?>"><img width="80%" src="../img/paystack-ii.png" alt="" /></a>
					</div>
				</div>
			</div>
			<?php include('./event_sidebar.php') ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>