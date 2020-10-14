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

$course = $db_class->fetch_course_by_id($_GET['id']);

$course_cat = $db_class->fetch_course_by_category($course[0]['course_category']);
$view = $db_class->View_course($user_code, $_GET['id']);
?>

<div class="page-content container clear-fix">

	<div class="row">
		<?php include('stu_menu.php') ?>
		<div class="col-md-8">
			<main>
				<section class="clear-fix">
					<h2>Course</h2>
					<hr style="margin-bottom:5px;" />
					<!-- Shop -->
					<div role="main">

						<div itemscope="" itemtype="http://schema.org/Product" class="product">
							<?php

							if (isset($course) && !empty($course)) {
								foreach ($course as $row) {

							?>
									<!-- item -->
									<div style="cursor:pointer;margin-bottom:5px;" class="category-item list clear-fix">
										<div class="picture">
											<div class="hover-effect"></div>
											<div class="link-cont">
												<a href="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" class="fancy fa fa-search"></a>
											</div>
											<img src='<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>' data-at2x="<?= SITE_URL ?>/img/courses/<?= $row["course_img"] ?>" alt>
										</div>
										<h3><?= $row["course_title"] ?></h3>
										<div>
											<div class="star-rating" title="Rated 4.00 out of 5">
												<span style="width:100%"></span>
											</div>
											<div class="count-reviews">( reviews 10 )</div>
										</div>
										<p><?= $row["description"] ?></p>
										<div class="category-info">
											<span class="price">

												<button type="submit" class="cws-button corner-radius-bottom alt">
													<i class="fa fa-book"></i> Enroll Now</button>
											</span>
											<span class="price">
												<span class="amount">
													<b><?= $row['course_fee'] ?> $</b>
												</span>

											</span>

											<div class="count-users"><i class="fa fa-user">

												</i> 25 students</div>
											<div class="course-lector">

											</div>
										</div>
									</div>


							<?php  }
							} ?>

							<hr class="divider-color" />
							<!-- woocommerce relative product -->
							<section>
								<div class="carousel-container">
									<div class="title-carousel">
										<h2>Related Courses</h2>
										<div class="carousel-nav">
											<div class="carousel-button">
												<div class="prev"><i class="fa fa-angle-left"></i></div>
												<!-- 
											 -->
												<div class="next"><i class="fa fa-angle-right"></i></div>
											</div>
										</div>
									</div>
									<div class="grid-col-row">
										<div class="owl-carousel owl-three-item">
											<?php if (isset($course_cat) && !empty($course_cat)) {
												foreach ($course_cat as $row) {

											?>

													<div class="gallery-item" style="cursor:pointer" onclick='location="course?id=<?= $row["course_id"] ?>"'>
														<!-- product -->
														<div class="product new">
															<div class="picture">
																<img src='<?= SITE_URL ?>/img/courses/<?php echo $row["course_img"] ?>' data-at2x="<?= SITE_URL ?>/img/courses/<?php echo $row["course_img"] ?>" alt="">
																<span class="hover-effect"></span>
																<div class="link-cont">
																	<a href="course?id=<?= $row["course_id"] ?>" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
																	<a href="course?id=<?= $row["course_id"] ?>" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
																</div>

															</div>
															<div class="product-name">
																<a href="course?id=<?= $row["course_id"] ?>"><?php echo substr($row["course_title"], 0, 40) . '....' ?></a>
															</div>
															<div class="star-rating" title="Rated 5.00 out of 5">
																<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
															</div>
															<span class="price">
																<span class="amount"><?php echo $row["course_fee"] ?><sup>$</sup></span>
															</span>

															<div class="product-description">

																<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
															</div>
														</div>
														<!-- product -->
													</div>
											<?php }
											} ?>
										</div>
									</div>
								</div>
							</section>
							<!-- woocommerce relative product -->
						</div>
					</div>
					<!--Shop -->
				</section>
			</main>
		</div>
	</div>
</div>
<?php include("../main_footer.php") ?>