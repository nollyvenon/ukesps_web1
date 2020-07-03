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
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('../recru_panel/header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
                    <?php include_once("../layouts/feedback_message.php");?>
                    <div class="jumbotron text-center">
                      <h3>Applicant Detail</h3>
                      <p>Applicant Name: <?php echo $first_name.' '.$last_name;?></p>
                    </div>
                    <div class="container">
                        <!--<div class="col-sm-4">
                             Applicant Code
                        </div>-->
                        <div class="col-sm-8">
                            <input name="applicant_code"  class="form-control" type="hidden" id="applicant_code" size="30" value="<?php echo $jobseek_code;?>" />
                        </div>
						<div class="col-sm-4">
                             Resume
                        </div>
                        <div class="col-sm-8">
                             <input type="file" name="resume" id="resume" class="form-control">
							<a href="docsxxx/<?=$jobseek_code;?>/<?= $resume;?>"><?= $resume;?></a>
                        </div>
						<div class="col-sm-4">
                             Cover Letter
                        </div>
                        <div class="col-sm-8">
                             <input type="file" name="cover_letter" id="cover_letter" class="form-control">
							<a href="docsxxx/<?=$jobseek_code;?>/<?= $cover_letter;?>"><?= $cover_letter;?></a>
                        </div>
						<div class="col-sm-4">
                             Place of Birth
                        </div>
                        <div class="col-sm-8">
                              <input name="place_of_birth"  class="form-control" type="text" id="place_of_birth" size="30" value="<?php echo $place_of_birth;?>" />
                        </div>
						<div class="col-sm-4">
                             Country of Residence
                        </div>
                        <div class="col-sm-8">
                             <input name="country_of_residence"  class="form-control" type="text" id="country_of_residence" size="30" value="<?php echo $country_of_residence;?>" />
                        </div>
						<div class="col-sm-4">
                            Nationality
                        </div>
                        <div class="col-sm-8">
                             <input name="country_of_nationality"  class="form-control" type="text" id="country_of_nationality" size="30" value="<?php echo $country_of_nationality;?>" />
                        </div>
						<div class="col-sm-8">
                             Languages
                        </div>
						<div class="col-sm-8">
                             <input name="languages"  class="form-control" type="text" id="languages" size="30" value="<?php echo $languages;?>" />
                        </div>
						<div class="col-sm-4">
                             Linkedin Profile
                        </div>
                        <div class="col-sm-8">
                             <input name="linkedin_profile"  class="form-control" type="text" id="linkedin_profile" size="30" value="<?php echo $linkedin_profile;?>" />
                        </div>
						<div class="col-sm-4">
                             Twitter ID
                        </div>
                        <div class="col-sm-8">
                             <input name="twitter_profile"  class="form-control" type="text" id="twitter_profile" size="30" value="<?php echo $twitter_profile;?>" />
                        </div>
						<div class="col-sm-4">
                             Hobbies
                        </div>
                        <div class="col-sm-8">
                             <input name="hobbies"  class="form-control" type="text" id="hobbies" size="30" value="<?php echo $hobbies;?>" />
                        </div>
						<div class="col-sm-4">
                            Skills
                        </div>
                        <div class="col-sm-8">
                             <input name="skills"  class="form-control" type="text" id="skills" size="30" value="<?php echo $skills;?>" />
                        </div>
						<div class="col-sm-4">
                             Institutions Attended with Dates
                        </div>
                        <div class="col-sm-8">
                            <div class="col-sm-12"><?= $education_period_month_from_1.' '.$education_period_year_from_1.' - '.$education_period_month_to_1.' '.$education_period_year_to_1;?></div>
							<div class="col-sm-12"><?= $education_cert_obtained_1;?></div>
							<div class="col-sm-12"><?= $education_course_studied_1.', '.$edu_institution_1;?></div>
							<div class="col-sm-12"><?= $education_course_description_1;?></div>
                        </div>
						<div class="col-sm-8">
                            <div class="col-sm-12"><?= $education_period_month_from_2.' '.$education_period_year_from_2.' - '.$education_period_month_to_2.' '.$education_period_year_to_2;?></div>
							<div class="col-sm-12"><?= $education_cert_obtained_2;?></div>
							<div class="col-sm-12"><?= $education_course_studied_2.', '.$edu_institution_2;?></div>
							<div class="col-sm-12"><?= $education_course_description_2;?></div>
                        </div>
						<div class="col-sm-12">
                            <div class="col-sm-12"><?= $education_period_month_from_3.' '.$education_period_year_from_3.' - '.$education_period_month_to_3.' '.$education_period_year_to_3;?></div>
							<div class="col-sm-12"><?= $education_cert_obtained_3;?></div>
							<div class="col-sm-12"><?= $education_course_studied_3.', '.$edu_institution_3;?></div>
							<div class="col-sm-12"><?= $education_course_description_3;?></div>
                        </div>
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
					 
				</div>
				<?php include_once('xpanel_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('../recru_panel/footer.php');?>
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