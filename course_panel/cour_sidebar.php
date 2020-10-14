<div class="grid-col grid-col-3 sidebar">
	<!-- widget instructor -->
	<aside class="widget-instructor">
		<h2>Menu</h2>
		<!-- carousel navigation -->
		<div class="carousel-nav">
			<div class="carousel-button">
				<div class="prev"><i class="fa fa-angle-double-left"></i></div>
				<!-- 
							 -->
				<div class="next"><i class="fa fa-angle-double-right"></i></div>
			</div>
		</div>
		<!-- / carousel navigation -->
		<hr class="divider-big" />
		<div class="owl-carousel widget-carousel">
			<!-- carousel item -->
			<aside class="widget-categories">
				<hr class="divider-big" />
				<ul>
					<li class="cat-item cat-item-1 current-cat"><a href="index">Home </span></a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="past_payments">View Past Payments </span></a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="posted_courses">View Posted Courses</a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="add_course">Add Courses</a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="view_profile">Company Profile</a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="update_profile">Update Profile</a></li>
					<li class="cat-item cat-item-1 current-cat"><a href="logout">Logout</a></li>
				</ul>
			</aside>

			<!-- / carousel item -->
			<!-- carousel item 
							<div>
								<article class="clear-fix">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" alt>
									<h4>Alisia Anderson</h4>
									<div class="course-date">
										<div>Information Technology</div>
									</div>
									<p>Donec ut velit varius, sodales velit ac, aliquet purus. Fusce nec nisl vulputate ullamcorper augue quis...</p>
								</article>
								<article class="clear-fix">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" alt>
									<h4>Lorem ipsum dolor</h4>
									<div class="course-date">
										<div>Information Technology</div>
									</div>
									<p>Sed pharetra lorem ut dolor dignissim, sit amet pretium tortor mattis...</p>
								</article>
							</div>
							/ carousel item -->
		</div>
	</aside>
	<!-- / widget instructor -->
	<!-- widget popular courses -->
	<aside class="widget-popular">
		<h2>Popular Course</h2>
		<div class="carousel-nav">
			<div class="carousel-button">
				<div class="prev"><i class="fa fa-angle-left"></i></div>
				<!-- 
							 -->
				<div class="next"><i class="fa fa-angle-right"></i></div>
			</div>
		</div>
		<div class="owl-carousel widget-carousel">
			<?php if (isset($content) && !empty($content)) {
				foreach ($content as $row) {
					$course_id = $row['course_id'];
					$course_img = $row['course_img'];
					$course_fees = $row['course_fee'];
					$course_title = $row['course_title'];
					$course_currency = $row['course_currency'];
					$timestamp = $row['timestamp'];
			?>
					<div class="popular-item">
						<img src="../img/courses/<?= $course_img; ?>" data-at2x="../img/courses/<?= $course_img; ?>" alt>
						<div class="course-name clear-fix">
							<span class="price"><?= $course_currency; ?><?= $course_fees; ?></span>
							<h3><a href="../course_det?sid=<?= $course_id; ?>"><?= $course_title; ?>e</a></h3>
						</div>
						<div class="course-date bg-color-1 clear-fix">
							<div class="day"><i class="fa fa-calendar"></i><?php echo date('d, F', $timestamp); ?></div>
							<div class="time"><i class="fa fa-clock-o"></i>At <?php echo date('h:i a', $timestamp); ?></div>
						</div>
					</div>
			<?php }
			} ?>
		</div>
	</aside>
	<!-- widget popular courses -->
	<!-- widget recent comments -->
	<aside class="widget-comments">
		<h2>Recent Comments</h2>
		<hr class="divider-big" />
		<div class="comments">
			<?php
			$course_comments = $zenta_operation->get_course_comments("", 3);
			if (isset($course_comments) && !empty($course_comments)) {
				foreach ($course_comments as $row) {
					$comment_poster = $row['comment_poster'];
					$comment = $row['comment'];
					$timestamp = $row['timestamp'];
			?>
					<div class="comment">
						<div class="header-comments">
							<div class="date"><?php echo date('d.m.Y', $timestamp); ?> /</div>
							<div class="author"><?= $comment_poster; ?></div>
						</div>
						<p><?= $comment; ?></p>
					</div>
			<?php }
			} ?>
		</div>
	</aside>
	<!--/ widget recent comments -->
	<!-- widget tag cloud -->
	<aside class="widget-tag">
		<h2>Tag Cloud</h2>
		<hr class="divider-big margin-bottom" />
		<div class="tag-cloud">
			<?php
			$course_tags = $zenta_operation->get_all_course_tags_as_array('', 10);
			if (isset($course_tags) && !empty($course_tags)) {
				foreach ($course_tags as $row) {
			?>
					<a href="#" rel="tag"><?= $row['tag']; ?></a>,
			<?php }
			} ?>
		</div>
		<hr class="margin-top" />
	</aside>
	<!-- / widget tag cloud -->
</div>