<?php
include("z_db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

	// Build POST request:
	$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret = '6Lf4TPcUAAAAAJMJ3YGsKoAt1uCidDUIRQAU0GW3';
	$recaptcha_response = $_POST['recaptcha_response'];

	// Make and decode POST request:
	$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	$recaptcha = json_decode($recaptcha);
	//print_r($recaptcha);
	// Take action based on the score returned:
	if ($recaptcha->score >= 0.5) {
		$username = $db_handle->sanitizePost($_POST['username']);
		$password = $db_handle->sanitizePost($_POST['password']);
		$remember_me = $db_handle->sanitizePost($_POST['remember_me']);


		if (strlen($username) < 6) {
			$message_error .= "Email must be more than 5 char length<BR>";
		}

		if (strlen($password) < 6) { //checking if password is greater then 8 or not
			$message_error .= "Password must be more than 5 char length<BR>";
		}


		// Check database to see if username/password exist.
		$found_client = $jobsk_operation->authenticate($username, $password);

		if ($found_client) {
			$seeker_code = $found_client[0]['seeker_code'];
			if ($jobsk_operation->user_is_active($seeker_code)) {
				$found_client = $found_client[0];
				$session_jobseek->login($found_client);
				redirect_to("index");
			} else {
				$message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
			}
		} else {
			// username/password combo was not found in the database
			$message_error = "Username and password combination do not match.";
		}
	} else {
		// spam submission
		// show error message
		$message_error .= "Error in your submission.";
	}
}
$page_title = 'Login';
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
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/styles.css">

	<!--styles -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV"></script>
	<script>
		grecaptcha.ready(function() {
			grecaptcha.execute('6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV', {
				action: 'contact'
			}).then(function(token) {
				var recaptchaResponse = document.getElementById('recaptchaResponse');
				recaptchaResponse.value = token;
			});
		});
	</script>

<body class="">
	<header class="only-color">
		<!-- header top panel -->
		<div class="page-header-top">
			<div class="grid-row clear-fix">
				<address>
					<a href="tel:+44 7448 443723" class="phone-number"><i class="fa fa-phone"></i>+44 7448 443723</a>
					<a href="mailto:info@ukesps.com" class="email"><i class="fa fa-envelope-o"></i>info@ukesps.com</a>
					&nbsp;&nbsp;<a href="recru_panel/login"><i class="fa fa-envelope-o"></i>&nbsp;Recruiting? Post a job</a>
				</address>
				<div class="header-top-panel">
					<a href="cart" class="fa fa-shopping-cart"><sup><?php if ($cart_volume > 0) {
																														echo $cart_volume;
																													} ?></sup></a>
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
					<img src="img/logo.png" data-at2x="img/logo@2x.png" alt>
					<h1>UKESPS</h1>
				</a> -->
					<!-- / logo -->
					<nav class="main-nav">
						<ul class="clear-fix">
							<li><a href="index" class="active">Home</a></li>
							<li><a href="page_sup?sid=about">About</a></li>
							<li><a href="javascript:void(0)" class="dropdown_item">Services<i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-news"><a href="page_sup?sidi=scholarships" title="News"><span>Scholarships</span></a></li>
									<li class="mi-events"><a href="page_sup?sidi=scholarships" title="University Visits"><span>University Representation</span></a></li>
									<li class="mi-testimonials"><a href="page_sup?sidi=scholarships" title="Student Testimonials"><span>English Tests</span></a></li>
									<li class="mi-university-comments"><a href="page_sup?sidi=accomodation_support" title="Accomodation Support"><span>Accommodation Support</span></a></li>
									<li class="mi-faqs"><a href="page_sup?sidi=student_support" title="FAQs"><span>Student Support</span></a></li>
									<li class="mi-faqs"><a href="page_sup?sidi=exhibition_events" title="FAQs"><span>Exhibition and Events</span></a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)" class="dropdown_item">Study Match<i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-events"><a href="page_sup?sidi=study_abroad" title="Studying Abroad"><span>Studying Abroad</span></a></li>
									<li class="mi-news"><a href="page_sup?sidi=universities" title="Universities"><span>Universities</span></a></li>
									<li class="mi-faqs"><a href="page_sup?sidi=enquiry_now" title="FAQs"><span>Enquire Now</span></a></li>
								</ul>
							</li>
							<li><a href="javascript:void(0)" class="dropdown_item">Users Portal <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-news"><a href="login" title="News"><span>Student Area</span></a></li>
									<li class="mi-events"><a href="course_panel/login" title="University Visits"><span>University Area</span></a></li>
									<li class="mi-events"><a href="recru_panel/login" title="University Visits"><span>Recruiter Area</span></a></li>
									<li class="mi-events"><a href="job_panel/login" title="University Visits"><span>Applicant Area</span></a></li>
									<li class="mi-testimonials"><a href="register" title="Student Testimonials"><span>Student Registration</span></a></li>
									<!--<li class="mi-university-comments"><a href="apply-online" title="University Comments"><span>Online Application</span></a></li>-->

								</ul>
							</li>
							<li><a href="events">Events</a></li>
							<li><a href="courses">Courses </i></a></li>
							<li><a href="recru_panel/add_job">Post a Job</a></li>

							<li><a href="#">Skills Match</a></li>
							<!-- <li>
								<a href="contact">Contact Us</a>
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
							<a href="help">Help</a>
						</li>
						<li class="entry-nav">
							<a href="recru_panel/cv_search">CV Search</a>
						</li>
						<li class="entry-nav"><a href="search_job">Search Jobs</a></li>
						<li class="entry-nav">
							<a href="courses">Find a course</a>
						</li>
						<li class="entry-nav">
							<a href="contact">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo.png" data-at2x='img/logo@2x.png' alt>
						<h2>UKESPS</h2>
					</div>
					<!--<a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
					<a href="#" class="twitter cws-button border-radius half-button">Twitter</a>-->
					<div class="clear-both"></div>
					<form action="" id="login" method="post" class="form-horizontal tasi-form" name="login" enctype="multipart/form-data">
						<?php include_once('../layouts/feedback_message.php'); ?>
						<div class="form-group">
							<input type="text" name="username" class="login-input" placeholder="Email">
							<span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="login-input" placeholder="Pasword">
							<span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
						</div>
						<p class="small">
							<a href="forgot_password">Forgot Password?</a>
						</p>
						<input type="hidden" name="recaptcha_response" id="recaptchaResponse">


						<input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" onclick="ValidateEmail(document.login.username)" value="Login ">
						<br><br>
						<span class="text-right"><a href="register" class="cws-button bt-color-2 border-radius">Register</a></span>
					</form>

				</div>
			</div>
		</section>
	</main>

	<?php include_once('footer.php'); ?>