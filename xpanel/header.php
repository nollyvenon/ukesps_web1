<?php
	require_once("z_db.php");
	if (!$session_client->is_logged_in()) {
		redirect_to("../login.php");
	}
	error_reporting(-1);
	$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
	$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
	$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
	$email = $zenta_operation->get_user_by_code($user_code)['email'];
	$country = $zenta_operation->get_user_by_code($user_code)['country'];
	$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
	$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
	$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
	$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
	$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] ==1? 'Male' :
	"Female";
 ?>
<!DOCTYPE HTML>
<html>  
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	
	


	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<!--styles -->
</head>
<body class="">
	<!-- header -->
	<header class="only-color">
	<!-- header top panel -->
	<div class="page-header-top">
		<div class="grid-row clear-fix">
			<address>
				<a href="tel:+44 7448 443723" class="phone-number"><i class="fa fa-phone"></i>+44 7448 443723</a>
				<a href="mailto:info@ukesps.com" class="email"><i class="fa fa-envelope-o"></i>info@ukesps.com</a>
			</address>
			<div class="header-top-panel">
				<a href="" class="fa fa-shopping-cart"><sup><?php if($cart_volume > 0){echo $cart_volume;}?></sup></a>
				<a href="login" class="fa fa-user login-icon"></a>
				<div id="top_social_links_wrapper">
					<div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
					<div class="cws_social_links"><a href="https://plus.google.com/" class="cws_social_link" title="Google +"><i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i></a><a href="http://twitter.com/" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a><a href="http://facebook.com" class="cws_social_link" title="Facebook"><i class="share-icon fa fa-facebook"></i></a><a href="http://dribbble.com" class="cws_social_link" title="Dribbble"><i class="share-icon fa fa-dribbble"></i></a></div>
				</div>
				<a href="#" class="search-open"><i class="fa fa-search"></i></a>
				<form action="#" class="clear-fix">
					<input type="text" placeholder="Search" class="clear-fix">
				</form>

			</div>
		</div>
	</div>
	<!-- / header top panel -->

	<section class="full-width-banner">
		<div class="grid-row clear-fix">
			<div class="menu-banner-container">
				<div class="logo-ad">
					<a href="index" class="logo">
						<img src="../img/logo.png" data-at2x="../img/logo@2x.png" alt>
						<h1>UKESPS</h1>
					</a>
				</div>
			</div>
			<div class="banner banner-one"><img src="../img/banners/topbanner_468x60.png" alt="" /></div>
			<div class="banner banner-two">
				<img src="../img/banners/topbanner_468x60.png" alt="">
			</div>
		</div>
	</section>


	<!-- sticky menu -->
	<div class="sticky-wrapper">
		<div class="sticky-menu">
			<div class="grid-row clear-fix">
				<!-- logo -->
				<!-- <a href="index" class="logo">
					<img src="../img/logo.png" data-at2x="../img/logo@2x.png" alt>
					<h1>UKESPS</h1>
				</a> -->
				<!-- / logo -->
				<nav class="main-nav">
					<ul class="clear-fix">
						<li><a href="../index" class="active">Home</a></li>
						<li><a href="../page_sup?sid=about">About</a></li>
						<li><a href="javascript:void(0)" class="dropdown_item">Services<i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<li class="mi-news"><a href="../page_sup?sidi=scholarships" title="News"><span>Scholarships</span></a></li>
								<li class="mi-events"><a href="../page_sup?sidi=scholarships" title="University Visits"><span>University Representation</span></a></li>
								<li class="mi-testimonials"><a href="../page_sup?sidi=scholarships" title="Student Testimonials"><span>English Tests</span></a></li>
								<li class="mi-university-comments"><a href="../page_sup?sidi=accomodation_support" title="Accomodation Support"><span>Accommodation Support</span></a></li>
								<li class="mi-faqs"><a href="../page_sup?sidi=student_support" title="FAQs"><span>Student Support</span></a></li>
								<li class="mi-faqs"><a href="../page_sup?sidi=exhibition_events" title="FAQs"><span>Exhibition and Events</span></a></li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)" class="dropdown_item">Study Match<i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<li class="mi-events"><a href="../page_sup?sidi=study_abroad" title="Studying Abroad"><span>Studying Abroad</span></a></li>
								<li class="mi-news"><a href="../page_sup?sidi=universities" title="Universities"><span>Universities</span></a></li>								
								<li class="mi-faqs"><a href="../page_sup?sidi=enquiry_now" title="FAQs"><span>Enquire Now</span></a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0)" class="dropdown_item">Users Portal <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<li class="mi-news"><a href="../login" title="News"><span>Student Area</span></a></li>
								<li class="mi-events"><a href="../course_panel/login" title="University Visits"><span>University Area</span></a></li>
								<li class="mi-events"><a href="../recru_panel/login" title="University Visits"><span>Recruiter Area</span></a></li>
								<li class="mi-events"><a href="../job_panel/login" title="University Visits"><span>Applicant Area</span></a></li>
								<li class="mi-testimonials"><a href="../register" title="Student Testimonials"><span>Student Registration</span></a></li>
								<!--<li class="mi-university-comments"><a href="apply-online" title="University Comments"><span>Online Application</span></a></li>-->

							</ul>
						</li>
						<li><a href="../event">Events</a></li>
						<li><a href="../courses">Courses </i></a></li>
						<li><a href="../recru_panel/add_job">Post a Job</a></li>

						<li><a href="#">Skills Match</a></li>
						<!-- <li>
								<a href="../contact">Contact Us</a>
							</li> -->
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- sticky menu -->
	<!-- edu header -->
	<div class="page-header-top sub-nav-section">
		<div class="grid-row clear-fix">
			<nav class="footer-nav">
				<ul class="clear-fix">
					<li class="entry-nav">
						<a href="../help">Help</a>
					</li>
					<li class="entry-nav">
						<a href="cv_search">CV Search</a>
					</li>
					<li class="entry-nav"><a href="../search_job">Search Jobs</a></li>
					<li class="entry-nav">
						<a href="../courses">Find a course</a>
					</li>
					<li class="entry-nav">
						<a href="../contact">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
    <!-- / header -->
    <hr>
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
                        <a href="view_courses">VIEW Courses<span> (26) </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="applications">VIEW Application STATUS <span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="last_view_courses">Last viewed courses<span> (14) </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="job_prefs">My job Preference <span></span></a></li>
						<li class="cat-item cat-item-1 current-cat">
                        <a href="past_applied_jobs">VIEW Past Applied Jobs<span> (11) </span></a></li>
						<!-- <li class="cat-item cat-item-1 current-cat">
                        <a href="#">Settings <span> </span></a></li> -->
					</ul>
				</aside>
		</div>
<div class="col-md-8">
