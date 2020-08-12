<?php
include_once("z_db.php");
$detail_id = $_GET['sid'];
$course_det = $zenta_operation->get_course_by_id($detail_id);
extract($course_det);
var_dump($course_det);
die();
$_SESSION['payment_category'] = '4'; //courses
if (isset($user_code)) {
	$user_id = $_SESSION['client_unique_code'];
	$zenta_operation->add_view_course($detail_id, $user_id);
} elseif (isset($jobseek_code)) {
	$user_id = $_SESSION['jobsek_unique_code'];
	$zenta_operation->add_view_course($detail_id, $user_id);
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
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<!--styles -->
	<link href="css/select2.css" rel="stylesheet" />
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
							<h2><?= $course_title; ?></h2>
							<div class="picture">
								<div class="hover-effect"></div>
								<div class="link-cont">
									<a href="img/courses/<?= $course_img; ?>" class="fancy fa fa-search"></a>
								</div>
								<img src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" alt>
							</div><br>
							<div itemprop="description">
								<p><strong>Category:</strong><?= $category_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Sub category:</strong><?= $sub_category_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Duration:</strong><?= $duration; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Location:</strong><?= $location_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Study Level:</strong><?= $study_level_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Study Method:</strong><?= $study_method_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Institution:</strong><?= $institute_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Course type:</strong><?= $type_name; ?></p>
							</div>
							<div itemprop="description">
								<p><strong>Quick Overview:</strong><?= $course_overview; ?></p>
							</div>
							<div class="main-features">
								<p class="head"><strong>Career Path:</strong></p>
								<?= $career_path; ?>
							</div>
							<div class="main-features">
								<p class="head"><strong>Who is the Course For?:</strong></p>
								<?= $who_is_course_for; ?>
							</div>
							<div class="category-info">
								<span class="price">
									<span class="amount">
										<?= $course_fee; ?><sup><?= $course_currency; ?></sup>
									</span>
									<span class="description-price"><?= $fee_period; ?></span>
								</span>
								<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
								<!--<div class="course-lector">
									<img src="img/recruiter/<?= $recruiter_img; ?>" data-at2x="img/recruiter/<?= $recruiter_img; ?>" class="avatar" alt>
									<div class="lector-name">
										<h4>Posted by</h4>
										<span><?= $recruiter_name; ?></span>
									</div>
								</div>-->
								<div class="count-users"><a href="add_to_cart?sssid=<?= $course_id; ?>&tpp=courses" class="cws-button small bt-color-3 ">Add To Cart</a></div>
							</div>
							<!-- woocommerce tabs -->
							<!-- tabs -->
							<div class="tabs">
								<div class="block-tabs-btn clear-fix">
									<div class="tabs-btn active" data-tabs-id="tabs1">Description</div>
									<div class="tabs-btn" data-tabs-id="tabs2">Course Structure</div>
									<div class="tabs-btn" data-tabs-id="tabs3">Entry Requirements</div>
									<div class="tabs-btn" data-tabs-id="tabs4">Apply</div>
								</div>
								<!-- tabs keeper -->
								<div class="tabs-keeper">
									<!-- tabs container -->
									<div class="container-tabs active" data-tabs-id="cont-tabs1">
										<?= $description; ?>
									</div>
									<!--/tabs container -->
									<!-- tabs container -->
									<div class="container-tabs" data-tabs-id="cont-tabs2">
										<?= $course_structure; ?>
									</div>
									<!--/tabs container -->
									<!-- tabs container -->
									<div class="container-tabs" data-tabs-id="cont-tabs3">
										<?= $entry_requirements; ?>
									</div>
									<!--/tabs container -->
									<!-- tabs container -->
									<div class="container-tabs" data-tabs-id="cont-tabs4">
										<?= $apply_info; ?>
									</div>
									<!--/tabs container -->
								</div>
								<!--/tabs keeper -->
							</div>
							<!-- /tabs -->
						</section>
						<hr class="divider-color" />
						<div class="comments">
							<div class="comment-title">Course reviews</div>
							<ol class="commentlist">
								<?php
								$comments = $zenta_operation->get_course_reviews_by_courseID($course_id, '5');
								//$review_count = $zenta_operation->get_course_review_by_id($course_id)['review_count'];
								if (isset($comments) && !empty($comments)) {
									foreach ($comments as $row) {
										$comment_poster = $row['comment_poster'];
										$comment = $row['comment'];
										$timestamp = $row['timestamp'];
								?>
										<li class="comment">
											<div class="comment_container clear">
												<img src="http://placehold.it/70x70" data-at2x="http://placehold.it/70x70" alt="" class="avatar">
												<div class="comment-text">
													<div class="star-rating" title="Rated 5.00 out of 5">
														<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
													</div>
													<p class="meta">
														<strong><?= $comment_poster; ?></strong>
														<time datetime="2016-06-07T12:14:53+00:00">/<?php echo date('Y.m.d H:i:s', $timestamp); ?></time>
													</p>
													<div class="description">
														<p><?= $comment; ?></p>
													</div>
												</div>
											</div>
										</li>
								<?php }
								} ?>
							</ol>
						</div>
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