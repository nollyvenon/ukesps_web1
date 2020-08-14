<?php
include_once("z_db.php");
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
<!DOCTYPE HTML>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<!--styles -->
	<link href="css/select2.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/styles.css">
</head>

<body class="courses-list">
	<!-- page header -->
	<?php include_once('header.php'); ?>
	<!-- / page header -->
	<!-- content -->
	<div class="page-content">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
					<!-- main content -->
					<main>
						<section>
							<h2><?= $job_title; ?></h2>
							<div class="grid-col-row">
								<div class="grid-col grid-col-5">
									<div class="picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="img/job_companies/<?= $job_img; ?>" class="fancy fa fa-search"></a>
										</div>
										<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" alt>
									</div>
								</div>
								<div class="grid-col grid-col-7">
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
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	<script src="js/jquery.min.js"></script>
	<script src="js/select2.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>

	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
</body>

</html>