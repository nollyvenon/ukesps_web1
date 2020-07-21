<?php
include_once("z_db.php");
$course_categories = $zenta_operation->get_course_categories();
$course_types = $zenta_operation->get_course_types('4');
$similar_courses = $zenta_operation->get_similar_courses('5');
?>
<!DOCTYPE HTML>
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
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="css/animate.css">

	<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
	<!--styles -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="js/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- page header -->
	<?php include_once('header.php'); ?>
	<!-- edu header -- -->

	<!-- / page header -->
	<div class="page-content" style=" background-image: url('./img/courses/student2.png');">
		<div class="search-container container clear-fix">
			<div class="search-title">
				<h2>Find Your Course</h2>
				<h5>What do you want to learn?</h5>
			</div>
			<!-- search -->
			<div class="category-search">
				<i class="fa fa-search"></i>
				<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
					<!-- <select name="category-id" class="category-id">
						<option>Course ID</option>
						<option value="eng">English</option>
						<option value="ua">China</option>
						<option value="ru">Russian</option>
					</select> -->
					<input type="text" class="input-text search-func" value placeholder="Subject or qualification, e.g IT">
					<button class="cws-button smaller border-radius alt search-func">Search Courses</button>
					<a href="course_panel/add_course.php" class="cws-button smaller border-radius alt search-func">Add Course</a>
				</form>
			</div>
			<!-- / search -->
		</div>
	</div>
	<hr class="divider-color" />
	<div class="fullwidth-background no-padding">
		<div class="padding-sect">
			<div class="container">
				<h2 class="center-text">Popular with other students</h2>
				<div class="row">
					<?php
					if (isset($similar_courses) && !empty($similar_courses)) {
						foreach ($similar_courses as $row) {
					?>
							<div class="col-lg-2 col-md-2 col-sm-5">
								<div class="cert-container">
									<div class="title-text">
										<h5><a href="course_det?sid=<?= $row['course_id']; ?>"><?= $row['course_title']; ?></a></h5>
									</div>
									<span><?= $row['course_institution']; ?></span>
									<h3><?php if ($row['course_fee'] == 0.00) {
												echo "Free";
											} else {
												echo $row['course_currency'] . ' ' . $row['course_fee'];
											} ?></h3>
									<div class="date-schedule">
										<p><span><i class="fa fa-book"></i></span><?= $row['course_method']; ?></p>
										<p><span><i class="fa fa-clock-o"></i></span><?= $row['duration']; ?> Self Paced</p>
									</div>
								</div>
							</div>
					<?php }
					} ?>


				</div>
			</div>
		</div>
	</div>
	<hr class="divider-color" />
	<section class="padding-section">
		<div class="grid-row grid-row-clear clear-fix">
			<h2 class="center-text">What Course do you want to learn?</h2>
			<h6 class="center-text">Browse more than 200 course and find inspiration</h6>
			<div class="grid-col grid-col-row">
				<?php if (isset($course_categories) && !empty($course_categories)) {
					foreach ($course_categories as $row) {

				?>
						<div class="grid-col grid-col-4 job-sector">
							<!-- course item -->
							<div class="course-item list">
								<div class="course-hover">
									<img src="img/course_category/<?php echo $row['course_cat_img']; ?>" data-at2x="img/course_category/<?php echo $row['course_cat_img']; ?>" alt>
									<div class="hover-bg bg-color-1"></div>
									<a href="#myModal" data-toggle="modal" class="course-link" data-id="<?= $row['category_id']; ?>">
										<div class="course-subject-icon"><i class="fa fa-heart-o"></i></div>
										<?php echo $row['category_name']; ?>
									</a>
								</div>
								<div class="course-name clear-fix">
									<!--<span class="price">$75</span>-->
									<h3><a href="#myModal" data-toggle="modal" data-id="<?= $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></h3>
								</div>
							</div>
							<!-- / course item -->
						</div>
				<?php  }
				} ?>
			</div>
		</div>

		</div>
	</section>
	<hr class="divider-color" />

	<section class="home-main">
		<div class="home-container p-0">
			<div class="text-white why-gradient">
				<div class="home-title">
					<h2>Why choose ukesps courses?</h2>
					<!-- <span>Start learning with the UK's #1.<br>Courses from the best known name in recruitment.</span> -->
				</div>
				<div class="container-fluid">
					<div class="row ">
						<div class="col-lg-3 col-md-3 col-sm-3 icon-class">
							<img src="img/courses/resources/wallet.svg" class="" alt="wallet icon">
							<h3>Save</h3>
							<p>Exclusive deals and discounts, only for ukesps users.</p>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 icon-class">
							<img src="img/courses/resources/notebook.svg" class="" alt="Learn icon">
							<h3>Learn</h3>
							<p>Easily search and compare thousands of courses.</p>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 icon-class">
							<img src="img/courses/resources/globe.svg" class="" alt="Achieve icon">
							<h3>Achieve</h3>
							<p>9/10 learners get what they want from our courses.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr class="divider-color" />
	<section class="padding-section">
		<div class="grid-row grid-row-clear clear-fix">
			<h2 class="center-text">Looking for inspiration?</h2>
			<h6 class="center-text">Browse our new and popular courses!</h6>
			<div class="grid-col-row">
				<?php if (isset($course_types) && !empty($course_types)) {
					foreach ($course_types as $row) {

				?>
						<div class="grid-col grid-col-3 popular-courses">
							<!-- course item -->
							<div class="course-item list">
								<div class="course-hover">
									<div class="course-image">
										<img src="img/course_types/<?php echo $row['type_img']; ?>" data-at2x="img/course_types/<?php echo $row['type_img']; ?>" alt>
									</div>
									<div class="hover-bg bg-color-2"></div>

									<a href="course_type?sid=<?php echo $row['type_id']; ?>" class="course-link popular">
										<?php echo $row['type_name']; ?>
									</a>
								</div>
								<div class="course-name clear-fix">
									<!--<span class="price">$75</span>-->
									<h3><a href="course_type?sid=<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></a></h3>
								</div>
							</div>
							<!-- / course item -->
						</div>
				<?php }
				} ?>
			</div>
		</div>

	</section>
	<hr class="divider-color" />
	<section class="padding-section">
		<div class="container">
			<h2 class="center-text">Get Certified</h2>
			<h6 class="center-text">Stand out in your career with our Professional Certifications</h6>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-3">
					<div class="cert-container"></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3">
					<div class="cert-container"></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3">
					<div class="cert-container"></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3">
					<div class="cert-container"></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3">
					<div class="cert-container"></div>
				</div>

			</div>
		</div>
	</section>
	<!--=================================
 special-feature -->
	<!-- / content -->
	<!-- footer -->
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<input name="hidcoucat" type="hidden">
					<div class="fetched-data"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- Modal -->

	<script src="js/select2.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<!-- <script type="text/javascript" src="js/carousel.js"></script> -->

	<!-- <script src="js/owl.carousel.js"></script>
	<script>
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		})
	</script> -->
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>

	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#myModal').on('show.bs.modal', function(e) {
				var rowid = $(e.relatedTarget).data('id');
				$.ajax({
					type: 'post',
					url: 'modal_course_subcat_list.php', //Here you will fetch records 
					data: 'rowid=' + rowid, //Pass $id
					success: function(data) {
						$('.fetched-data').html(data); //Show fetched data from database
						//$("input[name='hidcoucat']").val(data);
					}
				});
			});

		});
	</script>
</body>

</html>