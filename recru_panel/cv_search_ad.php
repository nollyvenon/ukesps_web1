<?php
include_once("z_db.php");
if ($session_recruiter->is_logged_in() && $recruit_object->is_recruit_plan_valid($recruiter_code)) {
	redirect_to("cv_search");
}
$rec_plan = $recruit_object->get_recruiting_cv_plans();
$_SESSION['payment_category'] = '2'; //cv search
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">

	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" href="../css/styles.css">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../js/jquery.min.js"></script>
	<!--styles -->
	<style>
		.marginRow {
			margin: -15px 0px -15px -15px !important;

		}

		.first_pricing_div {
			color: white !important;
			font-weight: 500;
		}

		.triangle-right {
			width: 0;
			height: 0;
			border-top: 25px solid transparent;
			border-left: 50px solid #555;
			border-bottom: 25px solid transparent;
		}

		.border-triangle {
			z-index: 1;
			position: absolute;
			left: 105%;
			bottom: 40%;
			transform: translateX(-50%);
			width: 0;
			height: 0;
			border-right: 34px solid transparent;
			border-top: 34px solid transparent;
			border-left: 34px solid #1FAB2F;
			border-bottom: 34px solid transparent
		}
	</style>

</head>

<body class="">
	<?php include_once('header.php'); ?>
	<div class="page-content container ">

		<div class="">
			<div class="col-12">
				<h4>CV Search</h4>
				<?php include_once("../layouts/feedback_message.php"); ?>
				<div class="row row-cols-2 shadow p-3 mb-5 bg-white rounded ">
					<div class="col p-4 bg-success marginRow">
						<h4 style="color: white">CV Search features</h4>
						<ul class="check-list first_pricing_div">
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> 11.6 million high quality candidate CVs at your fingertips </p>
							</li>
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> Target by skills, job title, salary, location, education and more </p>
							</li>
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> Preview a candidate’s profile for free before viewing their CV </p>
							</li>
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> Download up to 100 CVs a day </p>
							</li>
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> Be the first to know about new candidates with daily email alerts </p>
							</li>
							<li class="mb-3"><i class="checkmark"></i>
								<p class="ml-3"> Shortlist candidates and share them with colleagues </p>
							</li>
						</ul>
						<div class="border-triangle "></div>
					</div>
					<div class="col p-4 text-center">
						<h4>Choose your CV Search access for</h4>
						<div class="btn-group ml-5 text-center">
							<button onclick="onedayFunction()" type="button" class="btn btn-outline-primary btn-lg">1 Day</button>
							<button onclick="oneweekFunction()" type="button" class="btn btn-outline-primary btn-lg">1 Week</button>
							<button onclick="onemonthFunction()" type="button" class="btn btn-outline-primary btn-lg">1 Month</button>
						</div>
						<div id="one_day">
							<br>
							<h4><b><?php echo $rec_plan[0]['plan_currency'] . $rec_plan[0]['plan_cost']; ?></b></h4><br>
							<a href="cart?sssid=<?= $rec_plan[0]['plan_cost']; ?>" class="cws-button bt-color-2 border-radius">Buy now</a>
						</div>
						<div id="one_week" style="display: none">
							<br>
							<h4><b><?php echo $rec_plan[1]['plan_currency'] . $rec_plan[1]['plan_cost']; ?></b></h4><br>
							<a href="cart?sssid=<?= $rec_plan[2]['plan_cost']; ?>" class="cws-button bt-color-2 border-radius">Buy now</a>
						</div>
						<div id="one_month" style="display: none">
							<br>
							<h4><b><?php echo $rec_plan[2]['plan_currency'] . $rec_plan[2]['plan_cost']; ?></b></h4><br>
							<a href="cart?sssid=<?= $rec_plan[2]['plan_cost']; ?>" class="cws-button bt-color-2 border-radius">Buy now</a>
						</div>

					</div>
				</div>

			</div>

			<section class="fullwidth-background testimonial padding-section">
				<div class="grid-row">
					<h2 class="center-text">Testimonials</h2>
					<div class="owl-carousel testimonials-carousel">
						<?php
						$content = $zenta_operation->get_testimonials();
						//print_r($content);
						if (isset($content) && !empty($content)) {
							foreach ($content as $row) {
								$testi_image = $row['testi_image'];
								$testi_designation = $row['testi_designation'];
								$testi_content = $row['testi_content'];
								$testi_name = $row['testi_name'];
						?>
								<div class="gallery-item">
									<div class="quote-avatar-author clear-fix"><img src="img/testi/<?= $testi_image; ?>" data-at2x="img/testi/<?= $testi_image; ?>" alt="">
										<div class="author-info"><?= $testi_name; ?><br><span><?= $testi_designation; ?></span></div>
									</div>
									<p><?= $testi_content; ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script>
		var x = document.getElementById("one_day");
		var y = document.getElementById("one_week");
		var z = document.getElementById("one_month");

		x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";

		function onedayFunction() {
			if (x.style.display === "none") {
				x.style.display = "block";
				y.style.display = "none";
				z.style.display = "none";
			} else {
				x.style.display = "none";
			}
		}

		function oneweekFunction() {
			if (y.style.display === "none") {
				x.style.display = "none";
				y.style.display = "block";
				z.style.display = "none";
			} else {
				y.style.display = "none";
			}
		}

		function onemonthFunction() {
			if (z.style.display === "none") {
				x.style.display = "none";
				y.style.display = "none";
				z.style.display = "block";
			} else {
				z.style.display = "none";
			}
		}
	</script>
	<?php include_once('../footer.php'); ?>
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