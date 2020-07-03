<?php
require_once("z_db.php");
if (!$session_course_prov->is_logged_in()) {
    redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($course_prov_object->get_course_provider_detail($course_prov_code));
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
								
				 <div class="grid-col-row">
						 
						 		<div itemprop="description">
									<p><strong>course_provider Name:</strong><?= $course_prov_object->get_course_provider_name_by_code($course_prov_code);;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Full Name:</strong><?= $first_name.' '.$middle_name.' '.$last_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Gender:</strong><?= $gender;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Email:</strong><?= $email;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Phone:</strong><?= $phone;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Billing Address 1:</strong><?= $billing_address_1;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Billing Address 2:</strong><?= $billing_address_2;?></p>
								</div>
								<div itemprop="description">
									<p><strong>State:</strong><?= $billing_state;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Country:</strong><?= $zenta_operation->get_country_name_by_id($billing_country);?></p>
								</div>
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