<?php
include_once("main_header.php");
$events = $zenta_operation->upcoming_events(date('Y-m-d'));
?>

<!-- content -->
<div class="page-content">
	<div class="container clear-fix">
		<h2>Events</h2>
		<h5>See our upcoming events</h5>
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<main>
					<?php if (isset($events) && !empty($events)) {
						foreach ($events as $row) {
					?>
							<div class="grid-col grid-col-3">
								<!-- course item -->
								<div class="course-item event-item">
									<div class="course-hover">
										<img src="img/events/<?php echo $row['event_img']; ?>" data-at2x="img/events/<?php echo $row['event_img']; ?>" alt>
										<div class="hover-bg bg-color-1"></div>
										<a href="event_det?sid=<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a>
									</div>
									<div class="course-name">
										<h3><a href="event_det?sid=<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a></h3>
										<div style="float: right;"><?= $row['event_type'] == '1' ? '<span class="text-right badge-success p-2 br-5">Free</span>' : '<span class="text-right badge-warning p-2 br-5">Paid</span>' ?></div>
									</div>
								</div>
								<!-- / course item -->
							</div>
					<?php  }
					} ?>
				</main>
			</div>
			<?php include_once('event_sidebar.php'); ?>
		</div>
	</div>
</div>
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->