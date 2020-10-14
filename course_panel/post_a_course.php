<?php
include_once("../main_header.php");
//check if the user is logged and has an active recruiting plan. If yes, redirect to the job upload page
if ($session_course_prov->is_logged_in() && $course_prov_object->is_provider_plan_valid($course_prov_code)) {
	redirect_to("add_course");
}
$course_providing_plans = $zenta_operation->course_providing_plans();
$_SESSION['payment_category'] = '3'; //course provider
?>
<div class="page-content">
	<div class="container">
		<main>
			<h2>Post a Course</h2>
			<p></p>
			<div class="clear-fix">
				<div class="grid-col-row">
					<?php if (isset($course_providing_plans) && !empty($course_providing_plans)) {
						foreach ($course_providing_plans as $row) { ?>
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
									<p><a href="cart?sssid=<?= $row['plan_id']; ?>&pptc=3" class="cws-button border-radius bt-color-3  alt">Buy Now</a></p>
									<p><a href="../course_prov_plan_detail?sid=<?= $row['plan_id']; ?>&pptc=3" class="cws-button border-radius bt-color-2 alt">View Details</a></p>
								</article>
							</div>
					<?php }
					} ?>
				</div>
			</div>
		</main>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>