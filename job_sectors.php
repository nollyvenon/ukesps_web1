<?php
include_once("main_header.php");
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name FROM jobs jbv
        INNER JOIN job_sectors jbc ON jbv.job_sector=jbc.sector_id
        WHERE (jbc.sector_name LIKE '%$search_text%' OR jbv.job_title LIKE '%$search_text%') order by jbv.jobs_id DESC ";
} else {
	$query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name FROM jobs jbv
        INNER JOIN job_sectors jbc ON jbv.job_sector=jbc.sector_id order by jbv.jobs_id DESC ";
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
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<!-- main content -->
				<main>
					<!-- search -->
					<div class="category-search">
						<i class="fa fa-search"></i>
						<!-- 
						 -->
						<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
							<input name="search_text" type="text" class="input-text" value placeholder="Job Sector, e.g IT Sector">
							<button class="cws-button smaller border-radius alt">Search Sector</button>
						</form>
					</div>
					<!-- / search -->
					<?php if (isset($content) && !empty($content)) {
						foreach ($content as $row) {
							$sector_id = $row['sector_id'];
							$sector_name = $row['sector_name'];
							$sector_img = $row['sector_img'];

							echo "<div class=\"pb-sm-4 grid-col grid-col-4 job-sector\">
									<div class=\"course-item\">
										<div class=\"course-hover\">
                                            <img src=\"img/job_sectors/$sector_img\" data-at2x=\"img/job_sectors/$sector_img\" alt>
                                            <div class=\"hover-bg bg-color-1\"></div>
											<a href=\"job_sector?sid=$sector_id\">
                                                $sector_name
											</a>
										</div>
										<div class=\"course-name clear-fix\">
											<h3><a href=\"job_sector?sid=$sector_id\">$sector_name Jobs</a></h3>
										</div>
									</div>
								</div>";
						}
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