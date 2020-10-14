<?php
require_once("../main_header.php");
if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
extract($recruit_object->get_user_detail($recruiter_code));
?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>

				<div class="grid-col-row">
					<div class="col-md-3">
						<h3>Username:
					</div>
					<div class="col-md-9">
						<h3><?php echo $zenta_operation->get_user_by_code($user_code)['username']; ?></h3>
					</div>

					<div class="col-md-3"> <b>Full Name:</b></div>
					<div class="col-md-9"> <?= $first_name . ' ' . $middle_name . ' ' . $last_name; ?></div>
					<div class="col-md-3"> <b>Gender:</b> </div>
					<div class="col-md-9"><?= $gender; ?></div>
					<div class="col-md-3"><b>Email:</b> </div>
					<div class="col-md-9"><?= $email; ?></div>
					<div class="col-md-3"> <b>Phone:</b> </div>
					<div class="col-md-9"><?= $phone; ?></div>
					<div class="col-md-3"> <b>Address:</b></div>
					<div class="col-md-9"> <?= $mailing_address; ?></div>
					<div class="col-md-3"> <b>Country:</b> </div>
					<div class="col-md-9"><?= $zenta_operation->get_country_name_by_id($country); ?></div>
				</div>

			</div>
			<?php include_once('xpanel_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>