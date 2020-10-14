<?php
include_once("../main_header.php");
//check if the user is logged and has an active recruiting plan. If yes, redirect to the job upload page
if ($session_event_prov->is_logged_in() && $event_prov_object->is_provider_plan_valid($event_prov_code)) {
	redirect_to("add_event");
}
$event_providing_plans = $event_prov_object->event_providing_plans();
$_SESSION['payment_category'] = '5'; //event host
?>
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
<?php include_once('../main_footer.php'); ?>