<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
$cart_total = $recruit_object->get_cart_total($ssid);
$cart_info = $recruit_object->get_order_items($ssid);
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>
				Total Amount = <?php echo $cart_total; ?>
				<div class="jumbotron text-center">
					<h3>Recruitment Plan payment</h3>
					<p>Total Amount = <?php echo $cart_total; ?></p>
				</div>
				<div class="container">
					<div class="col-sm-8">
						Plan Name
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
									<?php echo $recruit_object->recruiting_plan_detail_by_id(['pid'])['plan_name']; ?>
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
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>