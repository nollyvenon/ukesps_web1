<?php
require_once("z_db.php");
if (!$session_event_prov->is_logged_in()) {
    redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($event_prov_object->get_event_provider_detail($event_prov_code));
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
<body class="">

	<?php include_once('header.php');?>
	
	<div class="page-content container clear-fix">

		<div class="row">
			<div class="col-md-3 sidebar">
				<!-- widget search -->
				
				<!-- widget categories -->
				<aside class="widget-categories" style="boder:1px solid red;">
					<h2>Navigations</h2>
					<hr class="divider-big" />
					<ul>
						<li class="cat-item cat-item-1 current-cat"><a href="past_payments">View Past payments </span></a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="posted_courses">View Posted Events <span> (7) </span></a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="add_course">My Upcoming Events</a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="add_course">My Past Events</a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="view_profile">My Profile</a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="logout">Logout</a></li>
					</ul>
				</aside>
		</div>
<div class="col-md-8">
			<main>
                <section class="clear-fix">
					<h2>My Profile</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-12">
							<div class="row">
							
								<a href="#!" class="col-md-6">
                                <div class="info-box">
								<h4><?php echo $firstname .' '. $middlename. ' ' . $lastn ?></h4>
									<span class="instructor-profession"><?php echo $email ?></span>
									<div class="divider"></div>
									<p><?= $phone ?></p>
									<p><?= $address ?></p>
									
				
									
								</div>
								</a>
	                            <div class="col-md-4">
								   <p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country)?></p>
								   <p><b>Gender: </b> <?= $gender?></p>
								   <p><b>Course preference: </b> <?= $course?></p>
									
								</div>
							</div>
							
						</div>
						
						</div>
                    </div>
             </section>

				
					
					
				</main>
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