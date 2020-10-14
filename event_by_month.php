<?php
include_once("main_header.php");
$month = $_GET['dd'];
$year = $_GET['yd'];
$events = $zenta_operation->get_events_by_month($month, $year);
?>

<!-- content -->
<div class="page-content">
	<div class="container clear-fix">

		<h2>Events</h2>

		<?php if ($events !== NULL) : ?>
			<h5>See our upcoming events</h5>
			<div class="grid-col-row">
				<?php foreach ($events as $row) : ?>
					<div class="grid-col grid-col-4">
						<!-- course item -->
						<div class="course-item">
							<div class="course-hover">
								<img src="img/events/<?php echo $row['event_img']; ?>" data-at2x="img/events/<?php echo $row['event_img']; ?>" alt>
								<div class="hover-bg bg-color-1"></div>
								<a href="event_det?sid=<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a>
							</div>
							<div class="course-name clear-fix">
								<h3><a href="event_det" ?sid=<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a></h3>
							</div>
						</div>
						<!-- / course item -->
					</div>
				<?php endforeach ?>
			</div>
		<?php else : ?>
			<h5>No Events for this month</h5>
		<?php endif ?>
	</div>
</div>
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->