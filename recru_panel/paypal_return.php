<?php
require_once("../main_header.php");
require_once(LIB_PATH . DS . "class_payment.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}

if (isset($_POST['id'])) {

	$price = $_POST['price'];
	$type = $_POST['type'];
	$id = $_POST['id'];
	$ref = $_POST['ref'];

	if (isset($_SESSION['eventprov_unique_code'])) {
		$payer_code = $_SESSION['eventprov_unique_code'];;
	} elseif (isset($_SESSION['recruit_unique_code'])) {
		$payer_code = $_SESSION['recruit_unique_code'];;
	} elseif (isset($_SESSION['client_unique_code'])) {
		$payer_code = $_SESSION['client_unique_code'];;
	} elseif (isset($_SESSION['couprov_unique_code'])) {
		$payer_code = $_SESSION['couprov_unique_code'];
	}

	$payment_category = $_SESSION['payment_category'];
	$trxref = $_SESSION['sssid'];
	$currency = '&pounds;';
	$payment_object->paystack_payment($payer_code, $ref, $trxref, '2', $price, $_SESSION['client_email'], $_SESSION['unique_id'], $payment_category, $currency, '1');
}

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>

				<div class="jumbotron text-center">
					<h2 class="title">Message Response!</h2>
				</div>
				<div class="response-text">
					You have placed your order successfully.<br> Thank you for
					shopping with us!
				</div>

			</div>
			<?php include_once('../course_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>