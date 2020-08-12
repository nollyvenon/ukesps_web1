<?php
include_once("z_db.php");
require_once(LIB_PATH . DS . "class_recruiter.php");
$recruit_object = new RecruitUser();
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	echo $search_text = $_POST['search_text'];
	echo $job_loc = $_POST['job_loc'];
	$query = "SELECT jbv.*, jbl.location_id, jbl.location_name, jbl.location_img FROM jobs jbv
		LEFT JOIN job_locations jbl ON jbv.job_location=jbl.location_id
        WHERE jbv.job_title LIKE '%$search_text%' or jbl.location_name LIKE '%$job_loc%' order by jbv.jobs_id DESC ";
echo $numrows = $db_handle->numRows($query);

// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
	$rowsperpage = $numrows;
} else {
	$rowsperpage = 20;
}

$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
	$currentpage = (int) $_GET['pg'];
} else {
	$currentpage = 1;
}
if ($currentpage > $totalpages) {
	$currentpage = $totalpages;
}
if ($currentpage < 1) {
	$currentpage = 1;
}

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if ($prespagehigh > $numrows) {
	$prespagehigh = $numrows;
}

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);
}

//$popular_view_job_types = $zenta_operation->get_popular_viewed_job_types('12','1');
$similar_courses = $zenta_operation->show_top_job_companies('5');

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
    <style>

/* Style the input container */
.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

/* Style the form icons */
.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
    </style>
</head>

<body>
	<!-- page header -->
	<?php include_once('header.php'); ?>
	<!-- edu header -->

	<!-- / page header -->
	<div class="page-content" style=" background-image: url('./img/job2.jpg');">
		<div class="search-container container clear-fix">
			<div class="search-title">
				<h2>Find Your Favourite Jobs</h2>
				<!--<h5>What do you want to learn?</h5>-->
			</div>
			<!-- search -->
			<div class="category-search">
				<i class="fa fa-search"></i>
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                      &nbsp;What
                      <input name="search_text" type="text" size="10"  class="input-text" value placeholder="e.g software developer">
                      Where
                      <input name="job_loc" type="text" style="width: 30%;" size="10" value="" value placeholder="town or postcode">
                      <button type="submit" class="cws-button smaller border-radius alt">Search</button>
                </form>
			</div>
          <!--  <div class="input-container">
    
    <input class="input-field" type="text" placeholder="Username" name="usrnm">
                <i class="fa flaticon-pin icon"></i>
  </div>-->
			<!-- / search -->
		</div>
	</div>
	<hr class="divider-color" />
	<div class="fullwidth-background no-padding">
		<div class="padding-sect">
			<div class="container">
						<!-- / search -->
						<?php if (isset($content) && !empty($content)) { ?>
	
				<h3>Search for <?php echo $_POST['search_text']; ?> Job in <?php echo $_POST['job_loc']; ?> </h3>
						<?php	foreach ($content as $row) {
								$jobs_id = $row['jobs_id'];
								$job_img = $row['job_img'];
								$job_title = $row['job_title'];
								$descript = $row['descript'];
								$location_name = $row['location_name'];
								$amount_per_period = $row['amount_per_period'];
								$recruiter_code = $row['recruiter_code'];
								$recruiter_detail = $recruit_object->get_recruiter_detail($recruiter_code);
								$recruiter_name = $recruiter_detail['first_name'] . ' ' . $recruiter_detail['last_name'];
								$recruiter_img = $recruiter_detail['image'];
						?>
								<!-- item -->
								<div class="category-item list clear-fix">
									<div class="picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="job_det?sid=<?= $jobs_id; ?>" class="fancy fa fa-search"></a>
										</div>
										<img src="img/jobs/<?= $job_img; ?>" data-at2x="img/jobs/<?= $job_img; ?>" alt>
									</div>
									<h3><a href="job_det?sid=<?= $jobs_id; ?>"><?= $job_title; ?></a></h3>
									<div>
										<div class="star-rating" title="Rated 4.00 out of 5">
											<span style="width:100%"></span>
										</div>
										<div class="count-reviews">( reviews 10 )</div>
									</div>
									<p><?= limit_text($descript, 25); ?></p>
									<div class="category-info">
										<span class="price">
											<span class="amount">
												<?= $SiteCurrency; ?><?= formatMoney($amount_per_period, true); ?>
											</span>
											<!--<span class="description-price"><?= $amount_per_period; ?></span>-->
										</span>
										<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
										<div class="course-lector">
											<img src="img/recruiter/<?= $recruiter_img; ?>" data-at2x="img/recruiter/<?= $recruiter_img; ?>" class="avatar" alt>
											<div class="lector-name">
												<h4>Posted by</h4>
												<span><?= $recruiter_name; ?></span>
											</div>
										</div>
									</div>
								</div>
								<!-- / item -->
						<?php  }
						} else {
							//echo "<h5>No result found</h5>";
						} ?>
			</div>
		</div>
	</div>
	
	<hr class="divider-color" />
	<div class="fullwidth-background no-padding">
		<div class="padding-sect">
			<div class="container">
				<h2 class="center-text">Popular Jobs</h2>
                <h5 class="center-text">The most popular job types in the last 24 hours</h5>
				<div class="row">                    
                    <?php

                    echo $zenta_operation->show_popular_viewed_job_types('12','1');
                    ?>


				</div>
			</div>
		</div>
	</div>
	<hr class="divider-color" />
	<section class="padding-section">
		<div class="grid-row grid-row-clear clear-fix">
			<h2 class="center-text">Find a job you love </h2>
			<h6 class="center-text">Your next role could be with one of these leading companies. Apply today.</h6>
			<div class="grid-col grid-col-row">
				<?php echo $zenta_operation->show_top_job_companies('5'); ?>
				</div>
			</div>
        
            <div class="center-text"><a href="job_companies" class="cws-button border-radius alt">See All Job Companies</a></div>

		</div>
	</section>
	<hr class="divider-color" />

	<section class="padding-section">
				<div class="grid-row grid-row-clear clear-fix">
					<h2 class="center-text">Choose your Sector</h2>
					<h6 class="center-text">Get a job from a sector that best suits your skill</h6>
					<div class="grid-col grid-col-row">
						<?php echo $zenta_operation->show_top_job_sectors('4'); ?>
					</div>

				</div>
			</section>
    
    <section class="padding-section">
				<div class="grid-row grid-row-clear clear-fix">
					<div class="grid-col grid-col-row">
						<?php echo $zenta_operation->show_top_job_sector_list('5','44');?>
                    </div>

				</div>
				
				<div class="center-text"><a href="job_sectors" class="cws-button border-radius alt">See All Job Sectors</a></div>
			</section>
    
	<hr class="divider-color" />
	<section class="padding-section">
		<div class="grid-row grid-row-clear clear-fix">
			<h2 class="center-text">Browse local jobs</h2>
			<h6 class="center-text">See who's hiring in your area. Find a job close to home!</h6>
			<div class="grid-col-row">
				<?php echo $zenta_operation->show_top_local_jobs('4'); ?>
			</div>
		</div>

	</section>
    
    <section class="padding-section">
				<div class="grid-row grid-row-clear clear-fix">
					<div class="grid-col grid-col-row">
						<?php echo $zenta_operation->show_top_job_location_list('5','44');?>
                    </div>
					
				</div>
				<div class="center-text"><a href="job_locations" class="cws-button border-radius alt">See All Job Locations</a></div>

			</section>
    
	<hr class="divider-color" />
	
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