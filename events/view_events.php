<?php include("../main_header.php");
$query = $zenta_operation->get_event_query($event_prov_code);
$numrows = $db_handle->numRows($query);

if (isset($_POST['search_text'])) {
	$rowsperpage = $numrows;
} else {
	$rowsperpage = 20;
}

$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
	$currentpage = (int) $_GET['pg'];
} else {
	$currentpage = 1;
}
if ($currentpage > $totalpages) {
	$currentpage = $totalpages;
}
if ($currentpage < 1) {
	$currentpage = 1;
}

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if ($prespagehigh > $numrows) {
	$prespagehigh = $numrows;
}

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$events = $db_handle->fetchAssoc($result);
?>

<!-- / header -->
<hr>
<div class="page-content container clear-fix">

	<div class="row">
		<?php include('./event_sidebar.php') ?>
		<div class="col-md-8">
			<main>
				<section class="clear-fix">
					<h2>View Events</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-12">
							<main>
								<?php

								if (isset($events) && !empty($events)) {
									foreach ($events as $row) {

								?>
										<!-- item -->
										<div style="cursor:pointer" class="category-item list clear-fix" onclick='location="event_det?sidi=<?= $row["event_id"] ?>"'>
											<div class="picture">
												<div class="hover-effect"></div>
												<div class="link-cont">
													<a href="event_det?sidi=<?= $row["event_id"] ?>" class="fancy fa fa-search"></a>
												</div>
												<img src='../img/events/<?= $row["event_img"] ?>' data-at2x="../img/events/<?= $row["event_img"] ?>" alt>
											</div>
											<h3><?= limit_text($row["event_title"], 10) ?></h3>
											<div>
												<div class="star-rating" title="Rated 4.00 out of 5">
													<span style="width:100%"></span>
												</div>
												<div class="count-reviews">( reviews 10 )</div>
											</div>
											<p><?= limit_text($row["event_description"], 70) ?></p>
											<div class="category-info">
												<!--<span class="price">
									<span class="amount">
                                    <b><?= $row['course_fee'] ?> $</b>
									</span>
									
                                </span>-->
												<span class="price">
												</span>
												<div class="count-users"><i class="fa fa-user"></i> <?= $row['event_views']; ?> views</div>
												<div class="course-lector">

												</div>
											</div>
										</div>

										<!-- / item -->
								<?php  }
								} ?>
							</main>
						</div>
					</div>
				</section>
			</main>
		</div>
	</div>
</div>
<?php include("../main_footer.php") ?>