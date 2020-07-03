<!DOCTYPE HTML>
<html>
<head>
	<title>UniLearn - Education and Courses Template</title>
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
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
					<!-- main content -->
					<main>
						<!-- search -->
						<div class="category-search">
							<i class="fa fa-search"></i><!-- 
						 --><form action="" method="post" class="form-horizontal tasi-form"  enctype="multipart/form-data"><!-- 
							 <select name="category-id" class="category-id">
									<option>Course ID</option>
									<option value="eng">English</option>
									<option value="ua">China</option>
									<option value="ru">Russian</option>									
								</select><!-- 
							 --><input type="text" class="input-text" value placeholder="Subject or qualification, e.g IT"><!-- 
							 --><button class="cws-button smaller border-radius alt">Search  Courses</button>
							</form>
						</div>
						<!-- / search -->
						<!-- item -->
						<div class="category-item list clear-fix">
							<div class="picture">
								<div class="hover-effect"></div>
								<div class="link-cont">
									<a href="img/courses/<?=$course_img;?>" class="fancy fa fa-search"></a>
								</div>
								<img src="img/courses/<?=$course_img;?>" data-at2x="courses/img/<?=$course_img;?>" alt>
							</div>
							<h3><?=$course_title;?></h3>
							<div>
								<div class="star-rating" title="Rated 4.00 out of 5">
									<span style="width:100%"></span>
								</div>
								<div class="count-reviews">( reviews 10 )</div>
							</div>
							<p><?=$course_overview;?></p>
							<div class="category-info">
								<span class="price">
									<span class="amount">
										355<sup>$</sup>
									</span>
									<span class="description-price">per 1 year</span>
								</span>
								<!--<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
								<div class="course-lector">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" class="avatar" alt>
									<div class="lector-name">
										<h4>Robert Doe</h4>
										<span>Doctor</span>
									</div>
								</div>-->
							</div>
						</div>
						<!-- / item -->
						
					</main>
					<!-- / main content -->
					<!-- pagination -->
					<div class="page-pagination clear-fix">
						<a href="#"><i class="fa fa-angle-double-left"></i></a><!--
						--><a href="#">1</a><!-- 
						--><a href="#">2</a><!-- 
						--><a href="#" class="active">3</a><!-- 
						--><a href="#"><i class="fa fa-angle-double-right"></i></a>
					</div>
					<!-- / pagination -->
				</div>
				<!-- side bar -->
				<?php include_once('course_sidebar.php');?>
				<!-- / side bar -->
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