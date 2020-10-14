<?php
require_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($recruit_object->get_recruiter_detail($recruiter_code));
?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>

				<div class="grid-col-row">

					<div itemprop="description">
						<p><strong>Recruiter Name:</strong><?= $recruit_object->get_recruiter_name_by_code($recruiter_code);; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>Full Name:</strong><?= $first_name . ' ' . $middle_name . ' ' . $last_name; ?></p>
					</div>
					<!-- <div itemprop="description">
									<p><strong>Gender:</strong><?= $gender; ?></p>
								</div> -->
					<div itemprop="description">
						<p><strong>Email:</strong><?= $email; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>Phone:</strong><?= $phone; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>Billing Address 1:</strong><?= $billing_address_1; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>Billing Address 2:</strong><?= $billing_address_2; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>State:</strong><?= $billing_state; ?></p>
					</div>
					<div itemprop="description">
						<p><strong>Country:</strong><?= $zenta_operation->get_country_name_by_id($billing_country); ?></p>
					</div>
				</div>

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>