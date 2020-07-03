<?php
include_once("z_db.php");
$job_sector = $zenta_operation->get_job_sector();
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<!--styles -->
	<link href="css/select2.css" rel="stylesheet" />
</head>
<body class="courses-list">

	<!-- page header -->
	<?php include_once('header.php');?>
	<!-- content -->
    
	<div class="page-content">
		<div class="container clear-fix">
			<h2>Search Jobs</h2>
			<!-- search -->
            
						<div class="category-search">
							<i class="fa fa-search"></i><!-- 
						 --><form  method="post" ><!-- 
							 -->
							&nbsp;What
							<input type="text" size="10"  class="input-text" value placeholder="e.g software developer">
							Where
							<input type="text" size="10" value="" value placeholder="town or postcode"><!-- 
							 --><button class="cws-button smaller border-radius alt">Search</button>
							</form>
						</div>
						<!-- / search -->
			<div class="grid-col-row">
					<?php if(isset($job_sector) && !empty($job_sector)) { foreach ($job_sector as $row) { ?>
					<div class="grid-col grid-col-4">
						<!-- course item -->
						<div class="course-item">
							<div class="course-hover">
								<img src="img/job_sectors/<?php echo $row['sector_img'];?>" data-at2x="<?php echo $row['sector_img'];?>" alt>
								<div class="hover-bg bg-color-1"></div>
								<a href="job_sect?seid=<?php echo $row['sector_id'];?>"><?php echo $row['sector_name'];?></a>
							</div>
							<div class="course-name clear-fix">
								<!--<span class="price">$75</span>-->
							<h3><a href="job_sect?seid=<?php echo $row['sector_id'];?>"><?php echo $row['sector_name'];?></a></h3>
								</div>
						</div>
						<!-- / course item -->
					</div>
					<?php  }} ?> 
							
						</div>
		</div>
	</div>
	<!-- / content -->
	<!-- footer -->
	<?php include_once('footer.php');?>
	<!-- / footer -->
	<script src="js/jquery.min.js"></script>
	<script src="js/select2.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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