<?php
include_once("main_header.php");
require_once(LIB_PATH . DS . "class_recruiter.php");
$recruit_object = new RecruitUser();
$countries = $zenta_operation->get_all_countries();
if (isset($_POST['job_search'])) {
	$search_text = $_POST['search_text'];
	$job_loc = $_POST['job_loc'];
	$job_country = $_POST['country'];
	$query = "SELECT jbv.*, jbl.location_id, jbl.location_name, jbl.location_img FROM jobs jbv
		LEFT JOIN job_locations jbl ON jbv.job_location=jbl.location_id
        WHERE jbv.job_title LIKE '%$search_text%' AND jbl.location_name LIKE '%$job_loc%' AND jbv.country_id LIKE '%$job_country%' order by jbv.jobs_id DESC ";
	$numrows = $db_handle->numRows($query);
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
				<input type="hidden" name="job_search">
				&nbsp;What
				<input name="search_text" type="text" size="10" class="input-text" value placeholder="e.g software developer">
				Where
				<select name="country" id="country">
					<option value="">Select Country</option>
					<?php foreach ($countries as $country) { ?>
						<option value="<?= $country['country_id'] ?>"><?= $country['country_name'] ?></option>
					<?php	} ?>

				</select>
				<input name="job_loc" type="text" style="width: 80%;" size="10" value="" value placeholder="town or postcode">
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
				<?php foreach ($content as $row) {
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
							<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" alt>
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
								<img src="img/job_companies/<?= $job_img; ?>" data-at2x="img/job_companies/<?= $job_img; ?>" class="avatar" alt>
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
			<h2 class="center-text">Current Jobs</h2>
			<h5 class="center-text">The most prominent jobs</h5>
			<div class="row">
				<?php

				echo $zenta_operation->show_popular_viewed_job_types('12', '1');
				?>


			</div>
		</div>
	</div>
</div>
<hr class="divider-color" />
<section class="padding-section">
	<div class="grid-row grid-row-clear clear-fix">
		<h2 class="center-text">Find your dream job</h2>
		<h6 class="center-text">You are a click away from getting your dream job. Apply now!</h6>
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
		<h2 class="center-text">Choose your section</h2>
		<h6 class="center-text">Get a job from a section that best suits your skill</h6>
		<div class="grid-col grid-col-row">
			<?php echo $zenta_operation->show_top_job_sectors('4'); ?>
		</div>

	</div>
</section>

<section class="padding-section">
	<div class="grid-row grid-row-clear clear-fix">
		<div class="grid-col grid-col-row">
			<?php echo $zenta_operation->show_top_job_sector_list('5', '44'); ?>
		</div>

	</div>

	<div class="center-text"><a href="job_sectors" class="cws-button border-radius alt">See All Job Sectors</a></div>
</section>

<hr class="divider-color" />
<section class="padding-section">
	<div class="grid-row grid-row-clear clear-fix">
		<h2 class="center-text">Skim local jobs</h2>
		<h6 class="center-text">See who’s recruiting in your neighbourhood. Find a job close to you.</h6>
		<div class="grid-col-row">
			<?php echo $zenta_operation->show_top_local_jobs('4'); ?>
		</div>
	</div>

</section>

<section class="padding-section">
	<div class="grid-row grid-row-clear clear-fix">
		<div class="grid-col grid-col-row">
			<?php echo $zenta_operation->show_top_job_location_list('5', '44'); ?>
		</div>

	</div>
	<div class="center-text"><a href="job_locations" class="cws-button border-radius alt">See All Job Locations</a></div>

</section>

<hr class="divider-color" />

<!--=================================
 special-feature -->
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->