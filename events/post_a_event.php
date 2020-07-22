<?php
include_once("z_db.php");
//check if the user is logged and has an active recruiting plan. If yes, redirect to the job upload page
if ($session_event_prov->is_logged_in() && $event_prov_object->is_provider_plan_valid($event_prov_code)) {
	redirect_to("add_event");
}
$event_providing_plans = $event_prov_object->event_providing_plans();
$_SESSION['payment_category'] = '5'; //event host
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../fi/flaticon.css">
	<link rel="stylesheet" href="../css/main.css">

	<link rel="stylesheet" href="../css/styles.css">

	<!--styles -->
</head>

<body class="">
	<?php include('header.php'); ?>
	<div class="page-content">
		<div class="container">
			<main>
				<h2>Post an Event</h2>
				<p></p>
				<div class="clear-fix">
					<div class="grid-col-row">
						<?php if (isset($event_providing_plans) && !empty($event_providing_plans)) {
							foreach ($event_providing_plans as $row) { ?>
								<div class="grid-col grid-col-3">
									<article class="pricing-table color-1">
										<div class="header-pt clear-fix">
											<!--
								 -->
											<h3><?= $row['plan_name']; ?></h3>
										</div>
										<div class="price-pt"><sup><?= $row['plan_currency']; ?></sup><?= intval($row['plan_cost']); ?><sup>99</sup></div>
										<p></p>
										<p>per <?= $row['plan_period']; ?></p>
										<ul>
											<li><?= $row['highlights']; ?></li>
										</ul>
										<p><a href="cart?sssid=<?= $row['plan_id']; ?>&pptc=5" class="cws-button border-radius bt-color-3  alt">Buy Now</a></p>
										<p><a href="../event_prov_plan_detail?sid=<?= $row['plan_id']; ?>&pptc=5" class="cws-button border-radius bt-color-2 alt">View Details</a></p>
									</article>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			</main>
		</div>
	</div>
	<?php include_once('../footer.php'); ?>
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