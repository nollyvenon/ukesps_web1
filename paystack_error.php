<?php
require_once("main_header.php");
//require_once("includes/session_client.php");
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
//$cart_total = $clientOperation->get_cart_total($ssid);
if (!$session_client->is_logged_in()) {
	redirect_to("login");
}

?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<?php include_once("layouts/feedback_message.php"); ?>

				<div class="jumbotron text-center">
					<h2 class="title">Ops! An Error Occurred!</h2>
				</div>
				<p> An Error Occurred Making Payment Unsuccessful. Please Try Again.</p>
				<p>
					<?php
					if (isset($_GET['error'])) {
						echo $_GET['error'];
					}
					?>
				</p>

			</div>
			<?php include_once('course_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('main_footer.php'); ?>