<?php
require_once("z_db.php");
if (!$session_client->is_logged_in()) {
    redirect_to("login");
}
extract($recruit_object->get_user_detail($recruiter_code));
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
	<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
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
								
				 <div class="grid-col-row">
					 <div class="col-md-3"><h3>Username: </div><div class="col-md-9"><h3><?php echo $zenta_operation->get_user_by_code($user_code)['username']; ?></h3></div>

					<div class="col-md-3"> <b>Full Name:</b></div><div class="col-md-9"> <?= $first_name.' '.$middle_name.' '.$last_name;?></div>
					 <div class="col-md-3"> <b>Gender:</b> </div><div class="col-md-9"><?= $gender;?></div>
					 <div class="col-md-3"><b>Email:</b> </div><div class="col-md-9"><?= $email;?></div>
					 <div class="col-md-3"> <b>Phone:</b> </div><div class="col-md-9"><?= $phone;?></div>
					<div class="col-md-3"> <b>Address:</b></div><div class="col-md-9"> <?= $mailing_address;?></div>
					<div class="col-md-3"> <b>Country:</b> </div><div class="col-md-9"><?= $zenta_operation->get_country_name_by_id($country);?></div>
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