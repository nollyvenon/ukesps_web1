<?php
require_once("main_header.php");
unset($_SESSION['student_cart']);
session_unset($_SESSION['student_cart']);
?>
<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<?php include_once("layouts/feedback_message.php"); ?>
				<div class="jumbotron text-center">
					<h2 class="title">Payment Confirmation</h2>
				</div>
				<div class="description">
					Thank you for choosing us.<br>
					Your payment was successful. You will be contacted by one of our support representatives soon.
				</div>

			</div>
			<?php include_once('course_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('main_footer.php'); ?>