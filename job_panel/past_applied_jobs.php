<?php include("../main_header.php");
// $query = $client_operation->past_applied_jobs_query($jobseek_code);
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
// $appl = $db_class->fetch_application_by_appl_code($jobseek_code);
// print_r($appl[0]["appl_id"]);
$applied_jobs = $db_class->fetch_jobs($jobseek_code);

?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div id="content" role="main">
					<?php

					if (isset($applied_jobs) && !empty($applied_jobs)) {
						foreach ($applied_jobs as $row) {
							$jobs_id = $row['jobs_id'];
							$job_img = $row['job_img'];
							$job_title = $row['job_title'];
							$descript = $row['descript'];
					?>
							<h3>Past Applied Jobs</h3>
							<!-- item -->
							<div class="grid-col grid-col-12">
								<div class="category-item list clear-fix">
									<div class="picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="job_det?sidi=<?= $jobs_id; ?>" class="fancy fa fa-search"></a>
										</div>
										<img src="img/jobs/<?= $job_img; ?>" data-at2x="img/jobs/<?= $job_img; ?>" alt>
									</div>
									<h3><a href="job_det?sid=<?= $jobs_id; ?>"><?= $job_title; ?></a></h3>
									<div>
										<div class="star-rating" title="Rated 4.00 out of 5">
											<span style="width:100%"></span>
										</div>
										<div class="count-reviews">( reviews 10 )</div>
									</div>
									<p><?= limit_text($descript, 10); ?></p>

								</div>
							</div>
							<!-- / item -->
					<?php  }
					} else {

						echo "<center><h3>APPLICATIONS</h3><em>No results to display</em></center>";
					} ?>

				</div>
			</div>
			<?php include('./jobpanel_sidebar.php') ?>
		</div>
	</div>
</div>
<?php include("../main_footer.php") ?>