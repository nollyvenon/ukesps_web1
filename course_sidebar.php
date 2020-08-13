<div class="grid-col grid-col-3 sidebar">
	<?php if (substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1) == 'course_det.php') { ?>
		<aside class="widget-course-details">
			<h2>Course Details</h2>
			<?php $similar_courses = $zenta_operation->get_similar_courses('1')[0];
			extract($similar_courses)
			?>
			<p><?= $course_overview; ?></p>
			<div>
				<div class="star-rating" title="Rated 5.00 out of 5">
					<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
				</div>
				<div class="count-reviews">( reviews 5 )</div>
			</div>
			<div class="category-info">
				<img src="img/courses/<?= $course_img; ?>" data-at2x="img/courses/<?= $course_img; ?>" class="avatar" alt>
				<div class="course-lector">
					<h4><?= $zenta_operation->get_study_method_by_id($study_method); ?></h4>
					<span><?= $duration; ?></span>
				</div>
				<span class="price">
					<span class="amount">
						<?= $course_fee; ?><sup><?= $course_currency; ?></sup>
					</span>
					<span class="description-price">per <?= $fee_period; ?></span>
				</span>
			</div>
			<a href="" class="cws-button border-radius small bt-color-3 alt">Read More</a>
		</aside>

	<?php } ?>

	<!-- <aside class="widget-instructor">
						<h2>Top Teachers</h2>

						<div class="carousel-nav">
							<div class="carousel-button">
								<div class="prev"><i class="fa fa-angle-double-left"></i></div>
								<div class="next"><i class="fa fa-angle-double-right"></i></div>
							</div>
						</div>
						<hr class="divider-big" />
						<div class="owl-carousel widget-carousel">

							<div>
								<article class="clear-fix">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" alt>
									<h4>Jane Doe</h4>
									<div class="course-date">
										<div>Information Technology</div>
									</div>
									<p>Donec ut velit varius, sodales velit ac, aliquet purus. Fusce nec nisl vulputate ullamcorper augue quis...</p>
								</article>
								<article class="clear-fix">
									<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" alt>
									<h4>Jone Doe</h4>
									<div class="course-date">
										<div>Architecture and Construction</div>
									</div>
									<p>Sed pharetra lorem ut dolor dignissim, sit amet pretium tortor mattis...</p>
								</article>
							</div>
							
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
							
						</div>
					</aside> -->
	<!-- / widget instructor -->
	<!-- widget popular courses -->
	<!-- <aside class="widget-popular">
		<h2>Popular Course</h2>
		<div class="carousel-nav">
			<div class="carousel-button">
				<div class="prev"><i class="fa fa-angle-left"></i></div>
				<div class="next"><i class="fa fa-angle-right"></i></div>
			</div>
		</div>
		<div class="owl-carousel widget-carousel">
			<div class="popular-item">
				<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt>
				<div class="course-name clear-fix">
					<span class="price">$45</span>
					<h3><a href="#">Design Practice</a></h3>
				</div>
				<div class="course-date bg-color-1 clear-fix">
					<div class="day"><i class="fa fa-calendar"></i>22 January</div>
					<div class="time"><i class="fa fa-clock-o"></i>At 1:00 pm</div>
				</div>
			</div>
			<div class="popular-item">
				<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt>
				<div class="course-name clear-fix">
					<span class="price">$45</span>
					<h3><a href="#">Design Practice</a></h3>
				</div>
				<div class="course-date bg-color-3 clear-fix">
					<div class="day"><i class="fa fa-calendar"></i>22 January</div>
					<div class="time"><i class="fa fa-clock-o"></i>At 1:00 pm</div>
				</div>
			</div>
		</div>
	</aside> -->
	<aside class="widget-course-details">
		<h2>Popular Courses</h2>
		<?php $similar_courses = $zenta_operation->get_similar_courses('5');
		foreach ($similar_courses as $row) {
		?>
			<div>
				<div class="star-rating" title="Rated 5.00 out of 5">
					<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
				</div>
				<div class="count-reviews">( reviews 5 )</div>
			</div>
			<div class="category-info">
				<img src="img/courses/<?= $row['course_img']; ?>" data-at2x="img/courses/<?= $row['course_img']; ?>" class="avatar" alt>
				<div class="course-lector">
					<h4><?= $row['course_title']; ?></h4>
					<span><?= $row['duration']; ?></span>
				</div>
				<span class="price">
					<span class="amount">
						<?= $row['course_fee']; ?><sup><?= $row['course_currency']; ?></sup>
					</span>
					<span class="description-price">per <?= $row['fee_period']; ?></span>
				</span>
			</div>
			<a href="course_det?sid=<?= $row['course_id']; ?>" class="cws-button border-radius small bt-color-3 alt">Read More</a>
	</aside>
<?php } ?>
<!-- widget popular courses -->
<!-- widget recent comments -->
<!-- <aside class="widget-comments">
		<h2>Recent Comments</h2>
		<hr class="divider-big" />
		<div class="comments">
			<div class="comment">
				<div class="header-comments">
					<div class="date">22.04.14 /</div>
					<div class="author">Michael Lawson</div>
				</div>
				<p>Donec ut velit varius, sodales velit ac, aliquet purus. Fusce nec nisl</p>
			</div>
			<div class="comment">
				<div class="header-comments">
					<div class="date">19.04.14 /</div>
					<div class="author">Steven Granger</div>
				</div>
				<p>Donec ut velit varius, sodales velit ac, aliquet purus. Fusce nec nisl</p>
			</div>
			<div class="comment">
				<div class="header-comments">
					<div class="date">14.04.14 /</div>
					<div class="author">Mark Blackwood</div>
				</div>
				<p>Donec ut velit varius, sodales velit ac, aliquet purus. Fusce nec nisl</p>
			</div>
		</div>
	</aside> -->
<!--/ widget recent comments -->
<!-- widget tag cloud -->
<aside class="widget-tag">
	<h2>Tag Cloud</h2>
	<hr class="divider-big margin-bottom" />
	<div class="tag-cloud">
		<a href="#" rel="tag">Daily</a>,
		<a href="#" rel="tag">Design</a>,
		<a href="#" rel="tag">Illustration</a>,
		<a href="#" rel="tag">Label</a>,
		<a href="#" rel="tag">Photo</a>,
		<a href="#" rel="tag">Pofessional</a>,
		<a href="#" rel="tag">Show</a>,
		<a href="#" rel="tag">Sound</a>,
		<a href="#" rel="tag">Sounds</a>,
		<a href="#" rel="tag">Tv</a>,
		<a href="#" rel="tag">Video</a>
	</div>
	<hr class="margin-top" />
</aside>
<!-- / widget tag cloud -->
</div>