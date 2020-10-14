<?php
$banners = $zenta_operation->getBanner();
$study_levels = $zenta_operation->get_study_levels();
if (isset($_POST['course-search'])) {
	$_SESSION['course_search'] = $_POST;
	unset($_SESSION['university_search']);
	header('Location:' . SITE_URL . '/universities-courses-search');
} else if (isset($_POST['university-search'])) {
	$_SESSION['university_search'] = $_POST;
	unset($_SESSION['course_search']);
	header('Location:' . SITE_URL . '/universities-courses-search');
}
?>
<header class="only-color">
	<!-- header top panel -->
	<?php include('./top_header.php') ?>
	<!-- / header top panel -->
	<div class="full-width-banner">
		<div class="container">
			<div class="row clear-fix">
				<div class="col-lg-6 col-md-6">
					<?php foreach ($banners as $banner) : ?>
						<?php if ($banner['position'] == 'top_banner_1') : ?>
							<div class="banner banner-one"><a href="<?= $banner['banner_url'] ?>"><img style="min-height:80; width: 100%; min-height: 80; width: 100%;  max-height:100px " src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="" /></a></div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="col-lg-5 col-md-5">
					<?php foreach ($banners as $banner) : ?>
						<?php if ($banner['position'] == 'top_banner_2') : ?>
							<div class="banner banner-two"><a href="<?= $banner['banner_url'] ?>"><img style="min-height:80px; width: 100%; min-height: 80px; width: 100%;  max-height:100px" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="" /></a></div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>


	<!-- sticky menu -->
	<div class="sticky-wrapper">
		<div class="sticky-menu">
			<div class="grid-row clear-fix">
				<!-- logo -->
				<a href="<?= SITE_URL ?>" class="logo">
					<img src="<?= SITE_URL ?>/img/logo.jpg" data-at2x="<?= SITE_URL ?>/img/logo.jpg" alt>
				</a>
				<!-- / logo -->
				<nav class="main-nav margin-t">
					<ul class="clear-fix">
						<li><a href="<?= SITE_URL ?>" class="active">Home</a></li>
						<li><a href="<?= SITE_URL ?>/page_sup?sid=about">About</a></li>
						<li><a href="javascript:void(0)" class="dropdown_item">Services<i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<?php foreach ($pages as $page) {
									if ($page['page_category'] == 'services') { ?>
										<li class="mi-news"><a href="<?= SITE_URL ?>/page_sup?sid=<?= $page['page_slug'] ?>" title="<?= $page['page_name'] ?>"><span><?= $page['page_name'] ?></span></a></li>
								<?php 	}
								} ?>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)" class="dropdown_item">Study Match<i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<li class="mi-news"><a href="<?= SITE_URL ?>/studying_abroad" title="Study Abroad"><span>Study Abroad</span></a></li>
								<li class="mi-news"><a href="<?= SITE_URL ?>/universities" title="Universities"><span>Universities</span></a></li>
								<li class="mi-news"><a href="<?= SITE_URL ?>/page_sup?sid=enquiry_now" title="Enquire Now"><span>Enquire Now</span></a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0)" class="dropdown_item">Users Portal <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-parent">
								<li class="mi-news"><a href="<?= SITE_URL ?>/login" title="News"><span>Student Login Area</span></a></li>
								<li class="mi-events"><a href="<?= SITE_URL ?>/course_panel/login" title="University Visits"><span>University Login Area</span></a></li>
								<li class="mi-events"><a href="<?= SITE_URL ?>/recru_panel/login" title="University Visits"><span>Recruiter Login Area</span></a></li>
								<li class="mi-events"><a href="<?= SITE_URL ?>/events/login" title="Events Posting"><span>Events Login Area</span></a></li>
								<li class="mi-events"><a href="<?= SITE_URL ?>/job_panel/login" title="University Visits"><span>Job Seeker's Login Area</span></a></li>
								<li class="mi-testimonials"><a href="<?= SITE_URL ?>/register" title="Student Testimonials"><span>Student Registration</span></a></li>
								<!--<li class="mi-university-comments"><a href="<?= SITE_URL ?>/apply-online" title="University Comments"><span>Online Application</span></a></li>-->

							</ul>
						</li>
						<li><a href="<?= SITE_URL ?>/event">Events</a></li>
						<li><a href="<?= SITE_URL ?>/courses">Courses </i></a></li>
						<li><a href="<?= SITE_URL ?>/recru_panel/add_job">Post a Job</a></li>

						<li><a href="<?= SITE_URL ?>/skills_match.php">Skills Match</a></li>
						<!-- <li>
								<a href="<?= SITE_URL ?>/contact">Contact Us</a>
							</li> -->
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- sticky menu -->
	<!-- edu header -->
	<div class="page-header-top sub-nav-section">
		<div class="grid-row clear-fix">
			<nav class="footer-nav">
				<ul class="clear-fix">
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/job_panel/upload_cv">Upload CV</a>
					</li>
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/faq">FAQs</a>
					</li>
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/events/add_event">Post Events</a>
					</li>
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/recru_panel/cv_search">CV Search</a>
					</li>
					<li class="entry-nav"><a href="<?= SITE_URL ?>/search_job">Search Jobs</a></li>
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/courses">Find a course</a>
					</li>
					<li class="entry-nav">
						<a href="<?= SITE_URL ?>/contact">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- header top panel -->
	<div class="page-header-top" style="background-color: #fff; color:#333; padding:15px 0 15px 0;">
		<div class="grid-row clear-fix">

			<div class="row">

				<div class="col-lg-6 col-md-6">

					<form action="" method="post">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">COURSES:</span>
							</div>
							<select name="country" id="country" class="form-control">
								<option value="">Select Country</option>
								<option value="13">Australia</option>
								<option value="39">Canada</option>
								<option value="227">United Kingdom</option>
								<option value="228">United States</option>
								<option value="all_countries">All Coutries</option>
							</select>
							<select name="study_level" class="form-control" id="study_level">
								<option value="">Select Level</option>
								<?php foreach ($study_levels as $st_level) { ?>
									<option value="<?= $st_level['sl_id'] ?>"><?= $st_level['sl_name'] ?></option>
								<?php	} ?>

							</select>
							<input type="hidden" name="course-search" value="course-search">
							<input type="text" name="course" id="course" placeholder="Enter course" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2"><button type="submit"><i class="fa fa-search"></i></button></span>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-5 col-md-5">
					<form action="" method="post">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">UNIVERSITIES:</span>
							</div>
							<select name="country" id="country" class="form-control">
								<option value="">Select Country</option>
								<option value="13">Australia</option>
								<option value="39">Canada</option>
								<option value="227">United Kingdom</option>
								<option value="228">United States</option>
								<option value="all_countries">All Coutries</option>
							</select>
							<input type="hidden" name="university-search" value="university-search">
							<input type="text" name="university" id="university" placeholder="Enter university" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2"><button type="submit"><i class="fa fa-search"></i></button></span>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- / header top panel -->
</header>