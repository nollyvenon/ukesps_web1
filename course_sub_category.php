<?php
include_once("main_header.php");
$cou_cat = $_GET['sid'];
$_SESSION['payment_category'] = '4'; //courses
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT * FROM courses WHERE course_subcategory='$cou_cat' AND (course_title LIKE '%$search_text%' OR qualification LIKE '%$search_text%' OR location LIKE '%$search_text%')  ORDER BY course_id DESC ";
} else {
	$query = "SELECT * FROM courses WHERE course_subcategory='$cou_cat' order by course_id DESC ";
}
$numrows = $db_handle->numRows($query);

// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
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
$content = $db_handle->fetchAssoc($result);
if ($_SERVER['HTTP_REFERER'] == 'add_to_cart') { ?>
	<div id="mycartModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cart Update</h4>
				</div>
				<div class="modal-body">
					<p>Your cart has been updated successfully.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="cws-button small bt-color-3" data-dismiss="modal">Continue</button>
					<a href="cart?pptc=courses" class="cws-button small bt-color-4 ">Proceed to Checkout</a>
				</div>
			</div>

		</div>
	</div>

<?php } ?>

<script>
	$(document).ready(function() {

		$("#mycartModal").modal('show');

	});
</script>

<!-- content -->
<div class="page-content">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<!-- main content -->
				<main>
					<!-- search -->
					<div class="category-search">
						<i class="fa fa-search"></i>
						<!-- 
						 -->
						<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
							<input type="text" class="input-text" value placeholder="Subject or qualification, e.g IT">
							<button class="cws-button smaller border-radius alt">Search Courses</button>
						</form>
					</div>
					<!-- / search -->
					<?php if (isset($content) && !empty($content)) {
						foreach ($content as $row) {
							$course_id = $row['course_id'];
							$course_img = $row['course_img'];
							$course_fees = $row['course_fee'];
							$fee_period = $row['fee_period'];
							$course_title = $row['course_title'];
							$course_overview = $row['course_overview'];
							$duration = $row['duration'];
							$course_currency = $row['course_currency'];
							$comment_count = $zenta_operation->get_course_comment_count($course_id);
							$review_count = $zenta_operation->get_course_review_by_id($course_id)['review_count'];
							$course_total_rating = $zenta_operation->get_total_course_rating($course_id);
							$course_avg_rating = $course_total_rating / $comment_count;
							$rating_percent = (($course_total_rating / $comment_count) / 5) * 100;
					?>
							<!-- item -->
							<div class="category-item list clear-fix">
								<div class="picture">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="course_det?sid=<?= $course_id; ?>" class="fancy fa fa-search"></a>
									</div>
									<img src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" alt>
								</div>
								<h3><a href="course_det?sid=<?= $course_id; ?>"><?= $course_title; ?></a></h3>
								<div>
									<div class="star-rating" title="Rated 4.00 out of 5">
										<span style="width:100%"></span>
									</div>
									<div class="count-reviews">( reviews <?= $review_count; ?> )</div>
									&nbsp;&nbsp;<span align="right"><a href="course_det?sid=<?= $course_id; ?>" class="cws-button border-radius small bt-color-3 alt">Read More</a></span>
								</div>
								<p><?= $course_overview; ?></p>
								<div class="category-info">
									<span class="price">
										<span class="amount">
											<?= $course_currency; ?><?= $course_fees; ?><sup></sup>
										</span>
										<span class="description-price">per <?= $fee_period; ?></span>
									</span>
									<div class="count-users"><a href="add_to_cart?sssid=<?= $course_id; ?>&pptc=courses" class="cws-button small bt-color-3 ">Add To Cart</a></div>
									<!--<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
								<div class="course-lector">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" class="avatar" alt>
									<div class="lector-name">
										<h4>Robert Doe</h4>
										<span>Doctor</span>
									</div>
								</div>-->
								</div>
							</div>
							<!-- / item -->
					<?php  }
					} ?>
				</main>
				<!-- / main content -->
				<!-- pagination -->
				<div class="page-pagination clear-fix">
					<?php
					if ($currentpage  > 1) { ?>
						<a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage - 1; ?>"><i class="fa fa-angle-double-left"></i></a>
						<?php }
					for ($currentpage = $totalpages; $currentpage < $totalpages; $i++) : if ($currentpage <= $totalpages) : ?>
							<a href="?sid=<?= $_GET['sid']; ?>&=<?= $currentpage; ?>" class="active"><?= $pg; ?>
							<?php endif;
					endfor;
					if ($currentpage > $totalpages) { ?>
							--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 1; ?>"><?= $currentpage + 1; ?></a>
							<!-- 
						--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 2; ?>"><?= $currentpage + 2; ?></a>
							<!-- 
						--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 3; ?>"><i class="fa fa-angle-double-right"></i></a>
						<?php }  ?>
				</div>
				<!-- / pagination -->
			</div>
			<!-- side bar -->
			<?php include_once('course_sidebar.php'); ?>
			<!-- / side bar -->
		</div>
	</div>
</div>
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->