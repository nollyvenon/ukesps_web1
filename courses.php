<?php
include_once("z_db.php");
require_once(LIB_PATH . DS . "class_course_provider.php");
$course_provider_obj = new CoursProvUser();
$course_categories = $zenta_operation->get_course_categories();
$course_types = $zenta_operation->get_course_types('4');
$similar_courses = $zenta_operation->get_similar_courses('5');
$countries = $zenta_operation->get_all_countries();
if (isset($_POST['course_search'])) {

	$search_text = $_POST['search_text'];
	$course_location = $_POST['course_location'];
	$job_country = $_POST['country'];
	$query = "SELECT cour.*, coul.location_id, coul.location_name, coul.country_id, countr.country_name FROM courses cour
		LEFT JOIN course_locations coul ON cour.location=coul.location_id
		LEFT JOIN countries countr ON coul.country_id=countr.country_id
        WHERE cour.course_title LIKE '%$search_text%' AND coul.location_name LIKE '%$course_location%' AND cour.country LIKE '%$job_country%' order by cour.course_id DESC ";
	$numrows = $db_handle->numRows($query);
	// For search, make rows per page equal total rows found, meaning, no pagination
	// for search results
	if (isset($_POST['course_search'])) {
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
?>
<!-- page header -->
<?php include_once('main_header.php'); ?>
<!-- edu header -- -->

<!-- / page header -->
<div class="page-content" style=" background-image: url('./img/courses/student2.png');">
	<div class="search-container container clear-fix">
		<div class="search-title">
			<h2>Find a Course</h2>
			<h5>What do you want to learn?</h5>
		</div>
		<!-- search -->
		<div class="category-search">
			<i class="fa fa-search"></i>
			<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
				<input type="hidden" name="course_search">
				<input type="text" class="form-control" class="input-text search-func" name="search_text" value placeholder="Subject or Course Title, e.g Management">
				<select name="country" class="form-control" id="country">
					<option value="">Select Country</option>
					<?php foreach ($countries as $country) { ?>
						<option value="<?= $country['country_id'] ?>"><?= $country['country_name'] ?></option>
					<?php	} ?>
				</select>
				<input name="course_location" type="text" class="form-control" size="10" value="" value placeholder="City or location">
				<button type="submit" class="cws-button smaller border-radius alt">Search</button>
			</form>
		</div>
		<!-- / search -->
	</div>
</div>
<hr class="divider-color" />
<div class="fullwidth-background no-padding">
	<div class="padding-sect">
		<div class="container">
			<!-- / search -->
			<?php if (isset($content) && !empty($content)) { ?>

				<h3><?= sizeof($content) ?> Search Results </h3>
				<?php foreach ($content as $row) {
					$course_id = $row['course_id'];
					$course_img = $row['course_img'];
					$course_title = $row['course_title'];
					$description = $row['description'];
					$location_name = $row['location_name'];
					$course_fee = $row['course_fee'];
					$couprov_code = $row['couprov_code'];
					$couprov_detail = $course_provider_obj->get_course_provider_detail($couprov_code);
					$couprov_name = $couprov_detail['first_name'] . ' ' . $couprov_detail['last_name'];
					$SiteCurrency = $row['course_currency'];
					// $recruiter_img = $couprov_detail['image'];
				?>
					<!-- item -->
					<div class="category-item list clear-fix">
						<div class="picture">
							<div class="hover-effect"></div>
							<div class="link-cont">
								<a href="course_det?sid=<?= $course_id; ?>" class="fancy fa fa-search"></a>
							</div>
							<img src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" alt>
						</div>
						<h3><a href="course_det?sid=<?= $course_id; ?>"><?= $course_title; ?></a></h3>
						<div>
							<div class="star-rating" title="Rated 4.00 out of 5">
								<span style="width:100%"></span>
							</div>
							<div class="count-reviews">( reviews 10 )</div>
						</div>
						<p><?= limit_text($description, 25); ?></p>
						<div class="category-info">
							<span class="price">
								<span class="amount">
									<?= $SiteCurrency; ?><?= formatMoney($course_fee, true); ?>
								</span>
								<!--<span class="description-price"><?= $course_fee; ?></span>-->
							</span>
							<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
							<div class="course-lector">
								<img src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" class="avatar" alt>
								<div class="lector-name">
									<h4>Posted by</h4>
									<span><?= $couprov_name; ?></span>
								</div>
							</div>
						</div>
					</div>
					<!-- / item -->
			<?php  }
			} else {
				if (isset($_POST['course_search'])) {
					echo "<h5>No result found</h5>";
				}
			} ?>
		</div>
	</div>
</div>
<div class="fullwidth-background no-padding">
	<div class="padding-sect">
		<div class="container">
			<h2 class="center-text">Common among other learners</h2>
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
		<h6 class="center-text">Skim thousands of courses and find your motivation</h6>
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
						<h3>Get deals</h3>
						<p>Exclusive offers and appropriate discounts only for Ukesps users</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 icon-class">
						<img src="img/courses/resources/notebook.svg" class="" alt="Learn icon">
						<h3>Study</h3>
						<p>Easily search and examine thousands of courses</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 icon-class">
						<img src="img/courses/resources/globe.svg" class="" alt="Attain icon">
						<h3>Attain</h3>
						<p>Most scholars achieve the knowledge they want from our courses</p>
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
<?php include_once('main_footer.php'); ?>
<!-- / footer -->