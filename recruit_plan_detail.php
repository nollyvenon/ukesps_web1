<?php
include_once("main_header.php");
$sid = $_GET['sid'];
$recru_detail = $zenta_operation->recruiting_plan_by_id($sid);
extract($recru_detail);
?>

<div class="page-content container clear-fix">
	<div class="grid-row">
		<div class="grid-col grid-col-9">
			<main>
				<div class="blog-post">
					<article>
						<div class="grid-row">
							<?php if ($plan_image != NULL) : ?>
								<div class="grid-col grid-col-5">
									<div class="blog-media picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="#" class="cws-left fancy fa fa-link"></a>
											<a href="img/pricings/<?= $plan_image; ?>" class="fancy fa fa-search"></a>
											<a href="#" class="cws-right fa fa-heart"></a>
										</div>
										<img src="img/pricings/<?= $plan_image; ?>" class="columns-col-12" alt>
									</div>
								</div>
							<?php endif ?>
							<div class="grid-col grid-col-7">
								<h2><?= $plan_name; ?></h2>

								<h5>Cost: <?= $plan_currency; ?><?= $plan_cost; ?></h5>
								<h5>Duration: <?= $plan_period; ?></h5>
								<h5>Summary: <?= $highlights; ?></h5>
								<?= $description; ?>
							</div>
						</div>
						<p><a href="recru_panel/cart?sssid=<?= $plan_id; ?>&pptc=1" class="cws-button border-radius bt-color-3  alt">Buy Now</a></p>
					</article>
				</div>
			</main>
		</div>
		<?php include_once('recru_panel/recru_sidebar.php'); ?>
	</div>
</div>
<?php include_once('main_footer.php'); ?>