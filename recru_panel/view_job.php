<?php
require_once("../main_.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($zenta_operation->job_detail($hiss));
?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<h3>Job Title: <?= $job_title; ?></h3>



				<div class="row m-b-20">
					<div class="col-md-3">
						<h3>Recruiter Name:
					</div>
					<div class="col-md-9">
						<h3><?php echo $recruit_object->get_recruiter_name_by_code($recruiter_code); ?></h3>
					</div>

					<div class="col-lg-3">
						<p><b>Category:</b>
					</div>
					<div class="col-md-9"><?= $category_name; ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Sub Category:</b>
					</div>
					<div class="col-md-9"> <?= $sub_category_name; ?></span></p>
					</div>
					<div class="col-lg-3">
						<p><b>Sector:</b>
					</div>
					<div class="col-md-9"><?= $sector_name; ?></span></p>
					</div>
					<div class="col-lg-3">
						<p><b>Job Type:</b>
					</div>
					<div class="col-md-9"><?= $jobtype_name; ?></span></p>
					</div>
					<div class="col-lg-3">
						<p><b>Job Level:</b>
					</div>
					<div class="col-md-9"><?= $joblevel_name; ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Description:</b>
					</div>
					<div class="col-md-9"> <?= $descript; ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Post Date:</b>
					</div>
					<div class="col-md-9"> <?= date('d M, Y', strtotime($startDate)); ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Expiry Date:</b>
					</div>
					<div class="col-md-9"> <?= date('d M, Y', strtotime($endDate)); ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Location:</b>
					</div>
					<div class="col-md-9"> <?= $location_name; ?></span></p>
					</div>
					<div class="col-md-3">
						<p><b>Country:</b>
					</div>
					<div class="col-md-9"><?= $country_name; ?></span></p>
					</div>
				</div>

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>