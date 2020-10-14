<?php
require_once("../main_header.php");
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
$payer_name = $payer_det['first_name'] . ' ' . $payer_det['middle_name'] . ' ' . $payer_det['last_name'];
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>
				Total Amount = <?= $payment_currency; ?><?php echo $cart_total; ?>
				<div class="jumbotron text-center">
					<h3>Course payment</h3>
					<p>Payer Email: <?php echo $payer_email; ?></p>
					<p>Payer Name: <?php echo $payer_name; ?></p>
					<p>Payment Status: <?php echo payment_status($payment_status); ?></p>
					<p>Payment: <?php echo payment_category($payment_category); ?></p>
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
					<?php if (isset($cart_info) && !empty($cart_info)) {
						foreach ($cart_info as $row) {   ?>
							<div class="row">
								<div class="col-sm-8">
									<?php echo $course_prov_object->course_provider_plan_detail_by_id($row['pid'])['plan_name']; ?>
								</div>
								<div class="col-sm-2">
									<?php echo $row['pquantity']; ?>
								</div>
								<div class="col-sm-1">
									<?php echo $row['productprice']; ?>
								</div>
							</div>
					<?php }
					} ?>
				</div>

			</div>
			<?php include_once('cour_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>