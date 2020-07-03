<?php
include_once("z_db.php");
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="fi/flaticon.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/styles.css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<!--styles -->
	
</head>
<body class="contact-page">

	<!-- page header -->
	<?php include_once('header.php');?>
	<!-- / page header -->
	<!-- page content -->
	<div class="page-content woocommerce">
		<!-- map -->
		<div class="container clear-fix">
			<div class="map wow fadeInUp">
				<div id="map" class="google-map"></div>
			</div>
		</div>
		<!-- / map -->
		<!-- contact form section -->
		<div class="grid-row clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-8">
					<section>
						<h2>Contact us</h2>
						<div class="widget-contact-form">
							<!-- contact-form -->
							<div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
								<strong>Attention!</strong>
								<div class="message"></div>
							</div>
							<div class="email_server_responce"></div>
							<form action="php/contacts-process.php" method="post" class="contact-form alt clear-fix">
								<input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true">
								<input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true">
								<input type="text" name="subject" value="" size="40" placeholder="Subject" aria-invalid="false" aria-required="true">
								<textarea name="message"  cols="40" rows="3" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>
								<input type="submit" value="Send" class="cws-button border-radius alt">
							</form>
							<!--/contact-form -->
						</div>
					</section>
				</div>
				<div class="grid-col grid-col-4 widget-address">
					<section>
						<h2>Our Offices</h2>
						<address>
							<p>Visit us to find out more</p>
							<p><strong class="fs-18">Address:</strong><br/>Lagos, Nigeria</p>
							<p><strong class="fs-18">Phone number:</strong><br/>
								<a href="tel:+2348188885094">234(818) 888 5094</a><br/>
								<a href="tel:+2348112851444">234(811) 285 1444</a>
							</p>
							<p><strong class="fs-18">E-mail:</strong><br/>
								<a href="mailto:info@ukesps.com">info@ukesps.com</a><br/>
								<a href="mailto:sales@ukesps.com">sales@ukesps.com</a>
							</p>
						</address>
					</section>
				</div>
			</div>
		</div>
		<!-- / contact form section -->
	</div>
	<!-- / page content -->
	<!-- footer -->
	<?php include_once('footer.php');?>
	<!-- / footer -->
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
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