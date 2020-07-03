<?php
require_once("z_db.php");
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($zenta_operation->job_detail($hiss));
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
                      <h3>Job Title: <?=$job_title;?></h3>
                                

								
				 <div class="row m-b-20">
					 <div class="col-md-3"><h3>Recruiter Name: </div><div class="col-md-9"><h3><?php echo $recruit_object->get_recruiter_name_by_code($recruiter_code); ?></h3></div>

					 <div class="col-lg-3"> <p><b>Category:</b> </div><div class="col-md-9"><?= $category_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Sub Category:</b></div><div class="col-md-9"> <?= $sub_category_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Sector:</b> </div><div class="col-md-9"><?= $sector_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Job Type:</b> </div><div class="col-md-9"><?= $jobtype_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Job Level:</b> </div><div class="col-md-9"><?= $joblevel_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Description:</b></div><div class="col-md-9"> <?= $descript;?></span></p></div>
					<div class="col-md-3"> <p><b>Post Date:</b></div><div class="col-md-9"> <?= date('d M, Y', strtotime($startDate));?></span></p></div>
					<div class="col-md-3"> <p><b>Expiry Date:</b></div><div class="col-md-9"> <?= date('d M, Y', strtotime($endDate));?></span></p></div>
					<div class="col-md-3"> <p><b>Location:</b></div><div class="col-md-9"> <?= $location_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Country:</b> </div><div class="col-md-9"><?= $country_name;?></span></p></div>
				</div>

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