<?php
include_once("z_db.php");
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
if ($currentpage > $totalpages) { $currentpage = $totalpages; }
if ($currentpage < 1) { $currentpage = 1; }

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$applied_jobs = $db_handle->fetchAssoc($result);
//$applied_jobs = $zenta_operation->get_applied_jobs($user_id);
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<!--styles -->
</head>
<body class="">
	<?php include_once('../header.php');?>
	<div class="page-content container clear-fix">

		<div class="grid-col-row">
			
			<div class="grid-col grid-col-9">
				<main>
						<?php if(isset($applied_jobs) && !empty($applied_jobs)) { foreach ($applied_jobs as $row) { 
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
									<a href="job_det?sidi=<?=$jobs_id;?>" class="fancy fa fa-search"></a>
								</div>
								<img src="img/jobs/<?=$job_img;?>" data-at2x="img/jobs/<?=$job_img;?>" alt>
							</div>
							<h3><a href="job_det?sid=<?=$jobs_id;?>"><?=$job_title;?></a></h3>
							<div>
								<div class="star-rating" title="Rated 4.00 out of 5">
									<span style="width:100%"></span>
								</div>
								<div class="count-reviews">( reviews 10 )</div>
							</div>
							<p><?= limit_text($descript,10);?></p>
							
						</div>
						<!-- / item -->
						<?php  }} ?>
					</main>
			</div>
			<?php include_once('user_sidebar.php');?>
		</div>
	</div>
	<?php include_once('../footer.php');?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>
</html>