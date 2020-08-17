<?php
require_once("z_db.php");

if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
error_reporting(-1);
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
	"Female";
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="<?= SITE_URL ?>/img/favicon.png">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/fi/flaticon.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/main.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/main2.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/<?= SITE_URL ?>/css/settings.css" media="screen">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/animate.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/styles.css">
	<!--styles -->

	<link rel="stylesheet" href="<?= SITE_URL ?>/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!--styles -->
</head>

<body class="">
	<?php include("header.php");
	// $query = $client_operation->past_applied_jobs_query($user_code);
	// $numrows = $db_handle->numRows($query);


	// For search, make rows per page equal total rows found, meaning, no pagination
	// for search results
	if (isset($_POST['search_text'])) {
		$rowsperpage = $numrows;
	} else {
		$rowsperpage = 20;
	}


	$courses = $db_class->fetch_courses();
	?>
	<div class="page-content container clear-fix">

		<div class="row">
			<div class="col-md-3 sidebar">
				<!-- widget search -->

				<!-- widget categories -->
				<aside class="widget-categories" style="border:1px solid red; padding:10px; border-radius:5px">
					<h2>Navigations</h2>
					<hr class="divider-big" />
					<ul>
						<li class="cat-item cat-item-1 current-cat">
							<a href="index">My Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="upload_biodata">Update Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="view_courses">VIEW Courses<span> (26) </span></a></li>
						<!-- <li class="cat-item cat-item-1 current-cat">
							<a href="applications">VIEW Application STATUS <span> </span></a></li> -->
						<li class="cat-item cat-item-1 current-cat">
							<a href="last_view_courses">Last viewed courses<span> (14) </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="<?= SITE_URL ?>/courses">Buy more courses<span> (14) </span></a></li>
					</ul>
				</aside>
			</div>
			<div class="col-md-8">
				<main>
					<section class="clear-fix">
						<h2>View Courses</h2>
						<hr>
						<div class="grid-col-row">
							<div class="grid-col grid-col-12">
								<main>
									<?php

									if (isset($courses) && !empty($courses)) {
										foreach ($courses as $row) {

									?>
											<!-- item -->
											<div style="cursor:pointer" class="category-item list clear-fix" onclick='location="course?id=<?= $row["course_id"] ?>"'>
												<div class="picture">
													<div class="hover-effect"></div>
													<div class="link-cont">
														<a href="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" class="fancy fa fa-search"></a>
													</div>
													<img src='<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>' data-at2x="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" alt>
												</div>
												<h3><?= limit_text($row["course_title"], 10) ?></h3>
												<div>
													<div class="star-rating" title="Rated 4.00 out of 5">
														<span style="width:100%"></span>
													</div>
													<div class="count-reviews">( reviews 10 )</div>
												</div>
												<p><?= limit_text($row["description"], 70) ?></p>
												<div class="category-info">
													<span class="price">
														<span class="amount">
															<b><?= $row['course_fee'] ?> $</b>
														</span>

													</span>
													<span class="price">


													</span>
													<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
													<div class="course-lector">

													</div>
												</div>
											</div>

											<!-- / item -->
									<?php  }
									} ?>
								</main>
							</div>
						</div>
					</section>
				</main>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>

	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>

</html>