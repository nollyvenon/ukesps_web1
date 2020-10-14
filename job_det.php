<?php
include_once("main_header.php");
$detail_id = $_GET['sid'];
$job_det = $zenta_operation->get_job_by_id($detail_id);
extract($job_det);

$recruiter_detail = $zenta_operation->get_recruiter_detail($recruiter_code);
$recruiter_name = $recruiter_detail['first_name'] . ' ' . $recruiter_detail['last_name'];
$recruiter_img = $recruiter_detail['image'];
//print_r($content);
if (isset($user_code)) {
	$user_id = $_SESSION['client_unique_code'];
	$zenta_operation->add_view_job($detail_id, $user_id);
} elseif (isset($jobseek_code)) {
	$user_id = $_SESSION['jobsek_unique_code'];
	$zenta_operation->add_view_job($detail_id, $user_id);
}
?>

<!-- page header -->

<!-- / page header -->
<!-- content -->
<div class="page-content">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<!-- main content -->
				<main>
					<section>
						<h2><?= $job_title; ?></h2>
						<div class="row">
							<div class="col-lg-5 col-md-5">
								<div class="picture">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="img/job_companies/<?= $job_img; ?>" class="fancy fa fa-search"></a>
									</div>
									<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" alt>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div>
									<div class="star-rating" title="Rated 4.00 out of 5">
										<span style="width:100%"></span>
									</div>
									<div class="count-reviews">( reviews 10 )</div>
								</div>
								<p><b>Category</b>: <?= $category_name; ?></p>
								<!-- <p><b>Sub category</b>: <?= $sub_category_name; ?></p> -->
								<p><b>Job Level</b>: <?= $joblevel_name; ?></p>
								<p><b>Company name</b>: <?= $company_name; ?></p>
								<p><b>Job type</b>: <?= $jobtype_name; ?></p>
								<p><b>Sector</b>: <?= $sector_name; ?></p>
								<div class="category-info">
									<span class="price">
										<span class="amount">
											<?= $SiteCurrency; ?><?= formatMoney($amount_per_period, true); ?>
										</span>
										<span class="description-price"><?= $salary_period; ?></span>
									</span>
									<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
									<div class="course-lector">
										<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" class="avatar" alt="Job Image">
										<div class="lector-name">
											<h6>Posted by</h6>
											<span><?= $recruiter_name; ?></span>
										</div>
									</div>
									<div class="count-users"><a href="<?= SITE_URL ?>/job_panel/apply?sid=<?= $jobs_id ?>" class="cws-button small bt-color-3 ">Apply Now</a></div>
								</div>
							</div>
						</div>

						<!-- woocommerce tabs -->
						<!-- tabs -->
						<div class="tabs">
							<div class="block-tabs-btn clear-fix">
								<div class="tabs-btn active" data-tabs-id="tabs1">Description</div>
								<div class="tabs-btn" data-tabs-id="tabs2">Requirements</div>
								<div class="tabs-btn" data-tabs-id="tabs3">Apply Info</div>
							</div>
							<!-- tabs keeper -->
							<div class="tabs-keeper">
								<!-- tabs container -->
								<div class="container-tabs active" data-tabs-id="cont-tabs1">
									<?= $descript; ?>
								</div>
								<!--/tabs container -->
								<!-- tabs container -->
								<div class="container-tabs" data-tabs-id="cont-tabs2">
									<?= $requirements; ?>
								</div>
								<!--/tabs container -->
								<!-- tabs container -->
								<div class="container-tabs" data-tabs-id="cont-tabs3">
									<?= $apply_info; ?>
								</div>
								<!--/tabs container -->
							</div>
							<!--/tabs keeper -->
						</div>
						<!-- /tabs -->
					</section>
					<hr class="divider-color" />

				</main>
				<!-- / main content -->
			</div>
			<!-- sidebar -->
			<?php include_once('course_sidebar.php'); ?>
			<!-- / sidebar -->
		</div>
	</div>
</div>
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->