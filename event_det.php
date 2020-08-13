<?php
include_once("z_db.php");
$sid = $_GET['sid'];
$event_detail = $zenta_operation->get_event_detail($sid);
extract($event_detail);
?>
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
	<!--styles -->
</head>

<body class="">
	<?php include_once('header.php'); ?>
	<div class="page-content container clear-fix">

		<div class="grid-col-row">

			<div class="grid-col grid-col-9">
				<main>
					<div class="blog-post">
						<article>
							<div class="post-info clear-fix">
								<div class="date-post">
									<div class="day"><?= date('d', strtotime($startDate)); ?></div>
									<div class="month"><?= date('M', strtotime($startDate)); ?></div>
								</div>
								<div class="post-info-main">
									<div class="author-post">by <?= $event_author; ?></div>
								</div>
							</div>
							<div class="grid-col grid-col-12">
								<div class="grid-col grid-col-5">
									<div class="blog-media picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="#" class="cws-left fancy fa fa-link"></a>
											<a href="img/events/<?= $event_img; ?>" class="fancy fa fa-search"></a>
											<a href="#" class="cws-right fa fa-heart"></a>
										</div>
										<img src="img/events/<?= $event_img; ?>" class="columns-col-12" alt>
									</div>
								</div>

								<div class="grid-col grid-col-7">
									<h2><?= $event_title; ?></h2>

									<h5>Date: <?= date('d M, Y', strtotime($startDate)); ?> to <?= date('d M, Y', strtotime($endDate)); ?></h5>
									<h5>Time: <?= $startTime; ?> to <?= $endTime; ?></h5>
									<h5>Event Location: <?= $event_location; ?></h5>
									<h5>Summary: <?= $event_summary; ?></h5>
								</div>
							</div>
							<div class="grid-col grid-col-12" style="clear: both;">
								<?= $event_description; ?>
							</div>

						</article>
					</div>
				</main>
			</div>
			<?php include_once('event_sidebar.php'); ?>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
	<script src="js/jquery.min.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
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