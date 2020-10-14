<?php
require_once("../main_header.php");
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($event_prov_object->get_event_provider_detail($event_prov_code));
?>


<div class="page-content container clear-fix">

	<div class="row">
		<?php include('./event_sidebar.php') ?>
		<div class="col-md-8">
			<main>
				<section class="clear-fix">
					<h2>My Profile</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-12">
							<div class="row">

								<a href="#!" class="col-md-6">
									<div class="info-box">
										<h4><?php echo $firstname . ' ' . $middlename . ' ' . $lastn ?></h4>
										<span class="instructor-profession"><?php echo $email ?></span>
										<div class="divider"></div>
										<p><?= $phone ?></p>
										<p><?= $address ?></p>



									</div>
								</a>
								<div class="col-md-4">
									<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country) ?></p>
									<p><b>Gender: </b> <?= $gender ?></p>
									<p><b>Course preference: </b> <?= $course ?></p>

								</div>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>