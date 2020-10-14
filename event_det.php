<?php
include_once("main_header.php");
$sid = $_GET['sid'];
$event_detail = $zenta_operation->get_event_detail($sid);
extract($event_detail);
?>

<div class="page-content container clear-fix">

	<div class="grid-col-row">

		<div class="grid-col grid-col-8">
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

								<h5>Date: <small><?= $startDate === $endDate ? date('d M, Y', strtotime($startDate)) : date('d M, Y', strtotime($startDate)) . ' to ' . date('d M, Y', strtotime($endDate)); ?></small></h5>
								<h5>Time: <small><?= date("g:iA", strtotime($startTime)); ?> to <?= date("g:iA", strtotime($endTime)); ?></small></h5>
								<h5>Event Location: <small><?= $event_location; ?></small></h5>
								<h5>Event Type: <small><?= $event_type == '1' ? 'Free' : 'Paid'; ?></small></h5>
								<h5>Summary: <small><?= $event_summary; ?></small></h5>
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
<?php include_once('main_footer.php'); ?>