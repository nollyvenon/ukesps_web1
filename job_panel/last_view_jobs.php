<?php include("../main_header.php");
// $query = $client_operation->past_applied_jobs_query($session_jobseek);
// $numrows = $db_handle->numRows($query);


// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
	$rowsperpage = $numrows;
} else {
	$rowsperpage = 20;
}

// $totalpages = ceil($numrows / $rowsperpage);
// // get the current page or set a default
// if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
//    $currentpage = (int) $_GET['pg'];
// } else {
//    $currentpage = 1;
// }
// if ($currentpage > $totalpages) { $currentpage = $totalpages; }
// if ($currentpage < 1) { $currentpage = 1; }

// $prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
// $prespagehigh = $currentpage * $rowsperpage;
// if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

// $offset = ($currentpage - 1) * $rowsperpage;
// $query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
// $result = $db_handle->runQuery($query);
// $applied_jobs = $db_handle->fetchAssoc($result);
$jobs = $db_class->fetch_viewed_jobs($jobseek_code);

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div id="content" role="main">
					<?php include_once("../layouts/feedback_message.php"); ?>
					<?php

					if (isset($jobs) && !empty($jobs)) {
						foreach ($jobs as $row) {

					?>
							<h3>Last Viewed Jobs</h3>
							<!-- item -->
							<div style="cursor:pointer" class="category-item list clear-fix" onclick='location="job_det?sidi=<?= $row["jobs_id"] ?>"'>
								<div class="picture">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="../job_det?sidi=<?= $row['jobs_id'] ?>" class="fancy fa fa-search"></a>
									</div>
									<img src='../img/jobs/<?= $row["job_img"] ?>' data-at2x="../img/jobs/<?= $row["job_img"] ?>" alt>
								</div>
								<h3><?= limit_text($row["job_title"], 10) ?></h3>
								<div>
									<div class="star-rating" title="Rated 4.00 out of 5">
										<span style="width:100%"></span>
									</div>
									<div class="count-reviews">( reviews 10 )</div>
								</div>
								<p><?= limit_text(htmlspecialchars($row["descript"]), 70) ?></p>
								<div class="category-info">
									<span class="price">
										<span class="amount">
											<b>$<?= $row['amount_per_period'] ?> per <?= $row['salary_period']; ?></b>
										</span>

									</span>
									<span class="price">


									</span>
									<div class="count-users"><i class="fa fa-user"></i> <?= $row['views']; ?> students</div>
									<div class="course-lector">

									</div>
								</div>
							</div>

							<!-- / item -->
					<?php  }
					} else {

						echo "<center><h3>Last Viewed Jobs</h3><em>No results to display</em></center>";
					} ?>
				</div>
			</div>
			<?php include('./jobpanel_sidebar.php') ?>
		</div>
	</div>
</div>

<?php include("../main_footer.php") ?>