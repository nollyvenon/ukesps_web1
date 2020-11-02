<?php
include_once('main_header.php');
$detail_id = $_GET['sid'];
$course_det = $zenta_operation->get_course_by_id($detail_id);
extract($course_det);

$_SESSION['payment_category'] = '4'; //courses

if (isset($user_code)) {
	$user_id = $_SESSION['client_unique_code'];
	$zenta_operation->add_view_course($detail_id, $user_id);
} elseif (isset($jobseek_code)) {
	$user_id = $_SESSION['jobsek_unique_code'];
	$zenta_operation->add_view_course($detail_id, $user_id);
}

?>
<!-- / page header -->
<!-- content -->
<div class="page-content">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<!-- main content -->
				<main>
					<section>
						<h2><?= $course_title; ?></h2>
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<div class="picture">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="img/courses/<?= $course_img; ?>" class="fancy fa fa-search"></a>
									</div>
									<img style="" src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" alt>
								</div>
							</div>
							<div class="col-lg-5 col-md-5">
								<div itemprop="description">
									<p><strong>Category:</strong><?= $category_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Sub category:</strong><?= $sub_category_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Duration:</strong><?= $duration; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Location:</strong><?= $location_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Study Level:</strong><?= $study_level_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Study Method:</strong><?= $study_method_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Institution:</strong><?= $institute_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Course type:</strong><?= $type_name; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Course Fee:</strong><?= $course_currency; ?> <?= $course_fee; ?></p>
								</div>
								<div itemprop="description">
									<p><strong>Fee Duration:</strong><?= $fee_period; ?> Months</p>
								</div>
								<?= $course_fee == 0 ? '<div class="count-users"><a href="' . SITE_URL . '/apply-online/index.php" class="cws-button small bt-color-3 ">Apply Now</a></div>' : '<div class="count-users"><a href="add_to_cart?sssid=' . $course_id . '&pptc=courses" class="cws-button small bt-color-3 ">Add To Cart</a> <a href="add_to_cart?sssid=' . $course_id . '&pptc=courses&bn=buynow" class="cws-button small bt-color-2 ">Buy Now</a></div>' ?>
							</div>
						</div>
						<div class="col-md-12" style="clear: both;">
							<div itemprop="description">
								<p><strong>Quick Overview:</strong><?= $course_overview; ?></p>
							</div>
							<div class="main-features">
								<p class="head"><strong>Career Path:</strong></p>
								<?= $career_path; ?>
							</div>
							<div class="main-features">
								<p class="head"><strong>Who is the Course For?:</strong></p>
								<?= $who_is_course_for; ?>
							</div>
							<div class="category-info">
								<div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
								<div class="course-lector">
									<img src="img/11_administrator.png" data-at2x="img/11_administrator.png" class="avatar" alt>
									<div class="lector-name">
										<h4>Posted by</h4>
										<span>Admin</span>
									</div>
								</div>
								<!-- <div class="count-users"><a href="cart?sssid=<?= $course_id; ?>&tpp=courses" class="cws-button small bt-color-3 ">Add To Cart</a></div> -->
							</div>
						</div>
						<!-- woocommerce tabs -->
						<!-- tabs -->
						<div class="tabs">
							<div class="block-tabs-btn clear-fix">
								<div class="tabs-btn active" data-tabs-id="tabs1">Description</div>
								<div class="tabs-btn" data-tabs-id="tabs2">Course Structure</div>
								<div class="tabs-btn" data-tabs-id="tabs3">Entry Requirements</div>
								<div class="tabs-btn" data-tabs-id="tabs4">Apply</div>
							</div>
							<!-- tabs keeper -->
							<div class="tabs-keeper">
								<!-- tabs container -->
								<div class="container-tabs active" data-tabs-id="cont-tabs1">
									<?= $description; ?>
								</div>
								<!--/tabs container -->
								<!-- tabs container -->
								<div class="container-tabs" data-tabs-id="cont-tabs2">
									<?= $course_structure; ?>
								</div>
								<!--/tabs container -->
								<!-- tabs container -->
								<div class="container-tabs" data-tabs-id="cont-tabs3">
									<?= $entry_requirements; ?>
								</div>
								<!--/tabs container -->
								<!-- tabs container -->
								<div class="container-tabs" data-tabs-id="cont-tabs4">
									<?= $apply_info; ?>
								</div>
								<!--/tabs container -->
							</div>
							<!--/tabs keeper -->
						</div>
						<!-- /tabs -->
					</section>
					<hr class="divider-color" />
					<div class="comments">
						<div class="comment-title">Course reviews</div>
						<ol class="commentlist">
							<?php
							$comments = $zenta_operation->get_course_reviews_by_courseID($course_id, '5');
							//$review_count = $zenta_operation->get_course_review_by_id($course_id)['review_count'];
							if (isset($comments) && !empty($comments)) {
								foreach ($comments as $row) {
									$comment_poster = $row['comment_poster'];
									$comment = $row['comment'];
									$timestamp = $row['timestamp'];
							?>
									<li class="comment">
										<div class="comment_container clear">
											<img src="http://placehold.it/70x70" data-at2x="http://placehold.it/70x70" alt="" class="avatar">
											<div class="comment-text">
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<p class="meta">
													<strong><?= $comment_poster; ?></strong>
													<time datetime="2016-06-07T12:14:53+00:00">/<?php echo date('Y.m.d H:i:s', $timestamp); ?></time>
												</p>
												<div class="description">
													<p><?= $comment; ?></p>
												</div>
											</div>
										</div>
									</li>
							<?php }
							} ?>
						</ol>
					</div>
				</main>
				<!-- / main content -->
			</div>
			<!-- sidebar -->
			<?php include_once('course_sidebar.php'); ?>
			<!-- / sidebar -->
		</div>
	</div>
</div>
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->