<?php
include_once("z_db.php");
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT jbv.*, jbc.company_id, jbc.company_name FROM jobs jbv
        INNER JOIN job_companies jbc ON jbv.job_company=jbc.company_id
        WHERE (jbc.company_name LIKE '%$search_text%' OR jbv.job_title LIKE '%$search_text%') order by jbv.jobs_id DESC ";
} else {
	$query = "SELECT jbv.*, jbc.company_id, jbc.company_name FROM jobs jbv
        INNER JOIN job_companies jbc ON jbv.job_company=jbc.company_id order by jbv.jobs_id DESC ";
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
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<!--styles -->
	<link href="css/select2.css" rel="stylesheet" />
</head>

<body class="courses-list">

	<!-- page header -->
	<?php include_once('header.php'); ?>
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
								<input name="search_text" type="text" class="input-text" value placeholder="Job Type, e.g IT Specialist">
								<button class="cws-button smaller border-radius alt">Search Company</button>
							</form>
						</div>
						<!-- / search -->
						<?php if (isset($content) && !empty($content)) {
							foreach ($content as $row) {
								$company_id = $row['company_id'];
								$company_name = $row['company_name'];
								$company_img = $row['job_img'];

								echo "<div class=\"pb-sm-4 grid-col grid-col-4 job-sector\">
									<div class=\"course-item\">
										<div class=\"jobcompany_div\">
											<a href=\"job_company?sid=$company_id\">
                                                <img class=\"jobcompany_img\" src=\"img/job_companies/$company_img\" data-at2x=\"img/job_companies/$company_img\" alt>
											</a>
										</div>
										<div class=\"course-name clear-fix\">
											<h3><a href=\"job_company?sid=$company_id\">$company_name Jobs</a></h3>
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
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	<script src="js/jquery.min.js"></script>
	<script src="js/select2.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>

	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
</body>

</html>