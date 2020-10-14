<?php
include_once("../main_header.php");
$rec_cv_plan = $recruit_object->get_recruiting_cv_plans();
$recruiting_plans = $zenta_operation->recruiting_plans();
?>

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

<div class="page-content container ">

	<div class="">
		<div class="col-12">
			<h4>CV Search</h4>
			<?php include_once("../layouts/feedback_message.php"); ?>
			<div class="row row-cols-2 shadow p-3 mb-5 bg-white rounded ">
				<div class="col p-4 bg-success marginRow">
					<h4 style="color: white">Premium+ job advert</h4>
					<ul class="check-list first_pricing_div">
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Job live for up to six weeks</p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Applications straight to your inbox </p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Included in job alert emails to candidates</p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Branded company profile and applicant management tools</p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3">Your job emailed to up to 100 best matching candidates </p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Link to your own application form from your ad</p>
						</li>
						<li class="mb-3"><i class="checkmark"></i>
							<p class="ml-3"> Use screening questions to filter applications faster</p>
						</li>
					</ul>
					<div class="border-triangle "></div>
				</div>
				<div class="col p-4 text-center">
					<h4>Get your first Premium+ job for </h4>
					<div id="one_month">
						<br>
						<h4><b><?php echo $recruiting_plans[2]['plan_currency'] . $recruiting_plans[2]['plan_cost']; ?></b></h4><br>
						<a href="cart?sssid=<?= $recruiting_plans[2]['plan_cost']; ?>&pptc=1" class="cws-button bt-color-2 border-radius">Buy now</a>
					</div>

				</div>
			</div>

		</div>


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
					<div id="one_month" style="display: none">
						<br>
						<h4><b><?php echo $rec_cv_plan[2]['plan_currency'] . $rec_cv_plan[2]['plan_cost']; ?></b></h4><br>
						<a href="cart?sssid=<?= $rec_cv_plan[2]['plan_cost']; ?>&pptc=2" class="cws-button bt-color-2 border-radius">Buy now</a>
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
<?php include_once('../main_footer.php'); ?>