<?php
require_once("z_db.php");
if (!$session_jobseek->is_logged_in()) {
    redirect_to("login.php");
}
$details = $client_operation->applicant_detail($jobseek_code);
extract($details);

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../js/jquery.min.js"></script>

	 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
  <script>
  $( function() {
    $( "#education_period_year_from_1, #education_period_year_to_1" ).datepicker();
  } );
  </script>
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('../recru_panel/header.php');?>
	
	<div class="page-content sitemap container container-fluid clear-fix">
		<div class="row">
    <div class="col-9">
		<?php include_once("../layouts/feedback_message.php");?>
		<h4>Upload Work Experience data</h4>
		<?php if($current_work_experience_month_from_1 != ""){ ?>
						<div class="col-sm-12">
                             <H4>Current Work Experience</H4>
                        </div>
                        <div class="col-sm-8">
                             <div class="col-sm-12"><?= $current_work_experience_month_from_1.' '.$current_work_experience_year_from_1.' - '.$current_work_experience_month_to_1.' '.$current_work_experience_year_to_1;?></div>
							<div class="col-sm-12"><?= $current_work_experience_position_1;?></div>
							<div class="col-sm-12"><?= $current_work_experience_company_1;?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $current_work_experience_duties_1;?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $current_work_experience_highlights_1;?>
							</div>
                        </div>
						<?php }else{ ?>
								
						<?php } ?>
						<?php if($previous_work_experience_month_from_1 != ""){ ?>
						<div class="col-sm-12">
                             <H4>Previous Work Experience</H4>
                        </div>
                        <div class="col-sm-12">
                             <div class="col-sm-12"><?= $previous_work_experience_month_from_1.' '.$previous_work_experience_year_from_1.' - '.$current_work_experience_month_to_1.' '.$previous_work_experience_year_to_1;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_1;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_1;?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_1;?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_1;?>
							</div>
                        </div>
						<?php }
						
						if($previous_work_experience_month_from_2 != ""){ ?>
						<div class="col-sm-12">
                             <div class="col-sm-12"><?= $previous_work_experience_month_from_2.' '.$previous_work_experience_year_from_2.' - '.$current_work_experience_month_to_2.' '.$previous_work_experience_year_to_2;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_2;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_2;?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_2;?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_2;?>
							</div>
                        </div>
						<?php }
						
						if($previous_work_experience_month_from_3 != ""){ ?>
						<div class="col-sm-12">
                             <div class="col-sm-12"><?= $previous_work_experience_month_from_3.' '.$previous_work_experience_year_from_3.' - '.$current_work_experience_month_to_3.' '.$previous_work_experience_year_to_3;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_3;?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_3;?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_3;?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_3;?>
							</div>
                        </div>
						<?php } ?>
  	</div>
	<div class="col-3">
		<?php include_once('xpanel_sidebar.php');?>
	</div>
			
</div>
						 
						  
									
						</div>
						
						
						
						


	<?php include_once('../recru_panel/footer.php');?>
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