<?php
require_once("z_db.php");
$ssid = $_GET['xxid'];
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}
//$payments = $recruit_object->get_all_past_payments($recruiter_code);

if(isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
    $search_text = $_POST['search_text'];
    
    $query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.first_name AS first_name, us.email AS appl_email, us.location AS appl_location, jbs.job_title, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, co.country_name AS appl_country FROM applications appl 
	INNER JOIN countries co ON us.country=co.country_id 
	INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
	INNER JOIN users us ON appl.applicant_code=us.user_code
	INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
	INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory
	WHERE recruiter_code = '$recruiter_code' AND (us.email LIKE '%$search_text%' OR us.first_name LIKE '%$search_text%' OR us.last_name LIKE '%$search_text%') ORDER BY appl.appl_id DESC ";
} else {
	$query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.first_name AS first_name, us.email AS appl_email, us.location AS appl_location, jbs.job_title, jobc.category_name AS category_name, jobsc.category_name AS sub_category_name, co.country_name AS appl_country FROM applications appl 
	INNER JOIN countries co ON us.country=co.country_id 
	INNER JOIN jobs jbs ON appl.job_id=jbs.jobs_id 
	INNER JOIN users us ON appl.applicant_code=us.user_code
	INNER JOIN job_categories jobc ON jobc.category_id=jbs.job_category
	INNER JOIN job_sub_categories jobsc ON jobsc.subcat_id=jbs.job_subcategory
	WHERE recruiter_code = '$recruiter_code' ";
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
if ($currentpage > $totalpages) { $currentpage = $totalpages; }
if ($currentpage < 1) { $currentpage = 1; }

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/styles.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
                    <?php include_once("../layouts/feedback_message.php");?>
                      <h3>Applications</h3>
                                
                                <table class="table table-responsive table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Applicant Name</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                            <th>Desired Salary</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Appl. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox" id="select_appl" name="select_appl"></td>
                                            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                            <td><?php echo $row['appl_email']; ?></td>
                                            <td><?php echo $row['job_title']; ?></td>
                                            <td><?php echo $row['desired_salary']; ?></td>
                                            <td><?php echo $row['appl_location']; ?></td>
                                            <td><?php echo applicant_status($row['appl_status']); ?></td>
                                            <td><?php echo date('d M, Y', strtotime($row['timestamp'])); ?></td>
                                            <td><a class="btn btn-border green" href="application_det?hiss=<?php echo encrypt($row['appl_id']); ?>"><span> Application Info</span></a>
												<a class="btn btn-border green" href="applicant_det?hiss=<?php echo encrypt($row['applicant_code']); ?>"><span> Applicant Info</span></a>
											</td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table> 
                                <!-- pagination -->
                                <div class="page-pagination clear-fix">
                                    <?php $pg = intval($_GET['pg']);
                                        if($pg > 1){ ?>
                                    <a href="?pg=<?=$pg-1;?>"><i class="fa fa-angle-double-left"></i></a>
                                    <a href="?pg=<?=$pg;?>" class="active"><?=$pg;?></a>
                        <?php } ?>
                            <!-- 
                                    --><a href="?pg=<?=$pg+1;?>"><?=$pg+1;?></a><!-- 
                                    --><a href="?pg=<?=$pg+2;?>"><?=$pg+2;?></a><!-- 
                                    --><a href="?pg=<?=$pg+3;?>"><i class="fa fa-angle-double-right"></i></a>
                                </div>
                                <!-- / pagination -->

				</div>
				<?php include_once('recru_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>
</html>