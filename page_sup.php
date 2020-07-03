<?php
require_once("z_db.php");
$sid = $_GET['sid'];
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
	<link rel="stylesheet" href="css/main2.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
	<!--styles -->
</head>
<body class="courses-list">
	<!-- header -->
	<?php include_once('header.php'); ?>
	<!-- / header -->
	<!-- page content -->
	<div class="page-title bg-color-4">
			<div class="grid-row">
				<h1><?php echo $zenta_operation->get_content_by_page_location($sid,'topheader');?></h1>
				<!-- bread crumb -->
				<nav class="bread-crumb">
					<a href="index.html"><?php echo $zenta_operation->get_page_info_by_id($sid)['page_category'];?></a>
					<i class="fa fa-long-arrow-right"></i>
					<a href="#"><?php echo $zenta_operation->get_content_by_page_location($sid,'topheader');?></a>
				</nav>
				<!-- / bread crumb -->
			</div>
		</div>
	<div class="page-content">
		<div class="container clear-fix">
		    <div class="grid-col-row">
			
			<div class="grid-col grid-col-9">
				<!-- main content -->
				<main>
					
						<h2><?php echo $zenta_operation->get_content_by_page_location($sid,'topheader');?></h2>
                                <?php echo $zenta_operation->get_content_by_page_location($sid,'intro');?>
                        <p>  <?php echo $zenta_operation->get_content_by_page_location($sid,'full');?></p>
					
					<hr class="divider-color" />
					<!-- quote -->
				</main>
				<!-- / main content -->
			</div>
			<?php //include_once('sidebar.php'); ?>
		    </div>
		</div>
	</div>
	<!-- / page content -->
	<!-- footer -->
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	<script src="js/jquery.min.js"></script>
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