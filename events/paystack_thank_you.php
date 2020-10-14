<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}

?>
<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<?php include('./event_sidebar.php') ?>
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<div class="jumbotron text-center">
					<h2 class="title">Payment Confirmation</h2>
				</div>
				<div class="description">
					Thank you for choosing us.<br>
					Your payment was successful. You will be contacted by one of our support representatives soon.
				</div>

			</div>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>