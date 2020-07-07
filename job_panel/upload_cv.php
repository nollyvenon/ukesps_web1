<?php
require_once("z_db.php");
if (!$session_jobseek->is_logged_in()) {
    redirect_to("login");
}
$details = $client_operation->applicant_detail($jobseek_code);
extract($details);

if ($_POST['submit']){
	$uploaddir = "../img/cover_letters/";
	$cover_letter = basename($_FILES['cover_letter']['name']);
	$cover_letter1 = $uploaddir . basename($cover_letter);
	move_uploaded_file($_FILES['cover_letter']['tmp_name'], $cover_letter1);

	$uploaddir = "../img/resumes/";
	$cover_letter = basename($_FILES['resume']['name']);
	$resume1 = $uploaddir . basename($resume);
	move_uploaded_file($_FILES['resume']['tmp_name'], $resume1);

	$biodata = $client_operation->upload_cv($applicant_code, $resume, $cover_letter);
	if($biodata){
		$message_success = "CV Upload was successful.";
	}else{
		$message_error = "CV Upload wasn't successful.";
	}
}
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
	<link rel="stylesheet" href="../css/styles.css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<!--styles -->
</head>
<body class="">
	<!-- header -->
		<!-- header -->
	<?php include_once('header2.php');?>
    <!-- / header -->


    <!-- / header -->
	<div class="page-content container clear-fix">

		<div class="row">
			<div class="col-md-3 sidebar">
				<!-- widget search -->
				
				<!-- widget categories -->
				<aside class="widget-categories" style="boder:1px solid red;">
					<h2>Navigations</h2>
					<hr class="divider-big" />
					<ul>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="index">My Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="upload_biodata">Update Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="applications">VIEW Application STATUS <span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="last_view_jobs">Last viewed Jobs<span> (14) </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="job_prefs">My job Preference <span></span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="upload_cv">Upload CV <span></span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="past_applied_jobs">VIEW Past Applied Jobs<span> (11) </span></a></li>
						<!-- <li class="cat-item cat-item-1 current-cat">
                        <a href="#">Settings <span> </span></a></li> -->
					</ul>
				</aside>
		</div>
<div class="col-md-8">
		
				<main>
                <section class="clear-fix">
					<h2>Upload your CV</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-11">
							<div class="row">
							
                    <?php include_once("../layouts/feedback_message.php");?>
					 <div class="col-md-12"><h5>Dear <?= $first_name.' '.$last_name;?></h5></div>

					<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
						<div class="row mb-3">
		  					<div class="col-md-8">Resume <input type="file" name="resume" id="resume" class="form-control"></div>
						</div>
						<div class="row mb-2">
							<div class="col-md-8">Cover Letter <input type="file" name="cover_letter" id="cover_letter" class="form-control"></div>
						</div>
						<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">
						
					</form>
							</div>
							
						</div>
						
						</div>
                    </div>
             </section>

				
					
					
				</main>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
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