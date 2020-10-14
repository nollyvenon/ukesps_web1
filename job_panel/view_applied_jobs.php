<?php
include_once("../main_header.php");
$query = $client_operation->past_applied_jobs_query($session_jobseek);
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
$applied_jobs = $db_handle->fetchAssoc($result);
//$applied_jobs = $zenta_operation->get_applied_jobs($user_id);
?>

<div class="page-content container clear-fix">

	<div class="grid-col-row">

		<div class="grid-col grid-col-9">
			<main>
				<?php if (isset($applied_jobs) && !empty($applied_jobs)) {
					foreach ($applied_jobs as $row) {
						$jobs_id = $row['jobs_id'];
						$job_img = $row['job_img'];
						$job_title = $row['job_title'];
						$descript = $row['descript'];
				?>
						<!-- item -->
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
						<!-- / item -->
				<?php  }
				} ?>
			</main>
		</div>
		<?php include_once('../sidebar.php'); ?>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>