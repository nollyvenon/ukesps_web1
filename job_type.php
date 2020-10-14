<?php
include_once("main_header.php");
require_once(LIB_PATH . DS . "class_recruiter.php");
$recruit_object = new RecruitUser();
$job_type = $_GET['sid'];
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT jbv.*, jbc.jobtype_id, jbc.jobtype_name, jbl.location_name FROM jobs jbv
        INNER JOIN job_types jbc ON jbv.jobstype=jbc.jobtype_id
  		INNER JOIN job_locations jbl ON jbv.job_location=jbl.location_id
      WHERE (jbc.jobtype_name LIKE '%$search_text%' OR jbv.job_title LIKE '%$search_text%') AND (jbc.jobtype_id='$job_type' OR jbc.jobtype_name='$job_type') order by jbv.jobs_id DESC ";
} else {
	$query = "SELECT jbv.*, jbc.jobtype_id, jbc.jobtype_name, jbl.location_name FROM jobs jbv
        INNER JOIN job_types jbc ON jbv.jobstype=jbc.jobtype_id
 		INNER JOIN job_locations jbl ON jbv.job_location=jbl.location_id
       WHERE (jbc.jobtype_id='$job_type' OR jbc.jobtype_name='$job_type') order by jbv.jobs_id DESC ";
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
?>



<!-- content -->
<div class="page-content">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<!-- main content -->
				<main>
					<!-- search -->
					<div class="category-search">
						<i class="fa fa-search"></i>
						<!-- 
						 -->
						<form name='search_text' action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
							<input type="text" class="input-text" value placeholder="Job Type, e.g IT Specialist">
							<button class="cws-button smaller border-radius alt">Search Job Type</button>
						</form>
					</div>
					<h3>Search for <?php echo $_POST['search_text']; ?> Type</h3>
					<!-- / search -->
					<?php if (isset($content) && !empty($content)) {
						foreach ($content as $row) {
							$jobs_id = $row['jobs_id'];
							$job_img = $row['job_img'];
							$job_title = $row['job_title'];
							$descript = $row['descript'];
							$location_name = $row['location_name'];
							$amount_per_period = $row['amount_per_period'];
							$recruiter_code = $row['recruiter_code'];
							$recruiter_detail = $recruit_object->get_recruiter_detail($recruiter_code);
							$recruiter_name = $recruiter_detail['first_name'] . ' ' . $recruiter_detail['last_name'];
							$recruiter_img = $recruiter_detail['image'];
					?>
							<!-- item -->
							<div class="category-item list clear-fix">
								<div class="picture">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="job_det?sid=<?= $jobs_id; ?>" class="fancy fa fa-search"></a>
									</div>
									<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/jobs/<?= $job_img; ?>" alt>
								</div>
								<h3><a href="job_det?sid=<?= $jobs_id; ?>"><?= $job_title; ?></a></h3>
								<div>
									<div class="star-rating" title="Rated 4.00 out of 5">
										<span style="width:100%"></span>
									</div>
									<div class="count-reviews">( reviews 10 )</div>
								</div>
								<p><?= limit_text($descript, 25); ?></p>
								<div class="category-info">
									<span class="price">
										<span class="amount">
											<?= $SiteCurrency; ?><?= formatMoney($amount_per_period, true); ?>
										</span>
										<!--<span class="description-price"><?= $amount_per_period; ?></span>-->
									</span>
									<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
									<div class="course-lector">
										<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" class="avatar" alt>
										<div class="lector-name">
											<h4>Posted by</h4>
											<span><?= $recruiter_name; ?></span>
										</div>
									</div>
								</div>
							</div>
							<!-- / item -->
					<?php  }
					} else {
						echo "<h5>No result found</h5>";
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