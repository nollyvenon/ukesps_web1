<?php
include_once("z_db.php");
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}
$rec_plan = $recruit_object->get_recruiting_cv_plans();
$_SESSION['payment_category'] = '2'; //cv search
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
	<link rel="stylesheet" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" href="../css/styles.css">	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../js/jquery.min.js"></script>
	<!--styles -->
	
</head>
<body class="">
	<?php include_once('../recru_panel/header.php');?>
	<div class="page-content sitemap container container-fluid clear-fix">


				<div class="row">
    <div class="col-9">
		<?php include_once("../layouts/feedback_message.php");?>
                      <h4>CV Matches</h4>

		<div class="row ">
		  <div class="col-md-12"><b>Looking for</b></div> 
		</div>
		<div class="row mb-3">
		  <div class="col-md-6"><b>Top Sectors Applied To</b></div> 

		  <div class="col-md-6"><b>Skills</b></div> 
		</div>	
		<div class="row mb-3">
		  <div class="col-md-6"><b>Location</b></div> 

		  <div class="col-md-6"><b>Skills</b></div> 
		</div>	
			
			<!-- / search -->
		</div>
		
		
				
	</div>
			

	</div>
	<?php include_once('../recru_panel/footer.php');?>
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