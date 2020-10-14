<?php
require_once("../main_header.php");

if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
error_reporting(-1);
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
	"Female";

if (isset($_POST['search_text'])) {
	$rowsperpage = $numrows;
} else {
	$rowsperpage = 20;
}


$courses = $db_class->fetch_courses();
?>
<div class="page-content container clear-fix">

	<div class="row">
		<?php include('stu_menu.php') ?>
		<div class="col-md-8">
			<main>
				<section class="clear-fix">
					<h2>View Courses</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-12">
							<main>
								<?php

								if (isset($courses) && !empty($courses)) {
									foreach ($courses as $row) {

								?>
										<!-- item -->
										<div style="cursor:pointer" class="category-item list clear-fix" onclick='location="course?id=<?= $row["course_id"] ?>"'>
											<div class="picture">
												<div class="hover-effect"></div>
												<div class="link-cont">
													<a href="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" class="fancy fa fa-search"></a>
												</div>
												<img src='<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>' data-at2x="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" alt>
											</div>
											<h3><?= limit_text($row["course_title"], 10) ?></h3>
											<div>
												<div class="star-rating" title="Rated 4.00 out of 5">
													<span style="width:100%"></span>
												</div>
												<div class="count-reviews">( reviews 10 )</div>
											</div>
											<p><?= limit_text($row["description"], 70) ?></p>
											<div class="category-info">
												<span class="price">
													<span class="amount">
														<b><?= $row['course_fee'] ?> $</b>
													</span>

												</span>
												<span class="price">


												</span>
												<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
												<div class="course-lector">

												</div>
											</div>
										</div>

										<!-- / item -->
								<?php  }
								} ?>
							</main>
						</div>
					</div>
				</section>
			</main>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script src="../js/jquery.min.js"></script>
<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
<script src="../js/jquery.form.min.js"></script>
<script src="../js/TweenMax.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/jquery.isotope.min.js"></script>

<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jflickrfeed.min.js"></script>
<script src="../js/jquery.tweet.js"></script>

<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/retina.min.js"></script>
</body>

</html>