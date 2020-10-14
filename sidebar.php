<div class="col-md-3 sidebar">
	<!-- widget search -->
	<!-- <aside class="widget-search">
		<form method="get" class="search-form" action="#">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:">
			</label>
			<input type="submit" class="search-submit" value="GO">
		</form>
	</aside> -->
	<!-- widget categories -->
	<aside class="widget-categories">
		<h2>Events</h2>
		<hr class="divider-big" />
		<ul>
			<?php foreach ($events as $event) { ?>
				<li class="cat-item cat-item-1 current-cat"><a href="<?= SITE_URL . '/event_det?sid=' . $event['event_id'] ?>"><?= $event['name'] ?></a></li>
			<?php } ?>
		</ul>
		<?php if ($events == null) { ?>
			<h5>No Events Yet</h5>
		<?php	} ?>
	</aside>
	<!-- widget categories -->
	<!-- course finder -->
	<aside class="widget-course-details">
		<h2>Popular Courses</h2>
		<?php $similar_courses = $zenta_operation->get_similar_courses('5');
		$i = 0;
		foreach ($similar_courses as $row) {
		?>
			<?php if ($i < 2) : ?>
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
			<?php endif ?>
			<?php $i++ ?>
		<?php } ?>
	</aside>
	<!-- <aside>
		<h2>Course Finder</h2>
		<p><strong>Mauris posuere consectetur libero</strong><br /><br />Fusce in facilisis elit. Morbi a ligula quis arcu adipiscing commodo</p>
		<form class="course_finder" action="#" method="post">
			<p class="form-row form-row-wide select-arrow">
				<select name="select_category" id="select_category" class="select_category" rel="select_category">
					<option value="" selected="selected">Select Category</option>
					<option value="AF">History</option>
					<option value="AL">Software Training</option>
					<option value="DZ">Information Technology</option>
				</select>
			</p>
			<p class="form-row form-row-wide select-arrow">
				<select name="select_teacher" class="select_teacher" rel="calc_shipping_state">
					<option value="">Select Teacher</option>
					<option value="JD">Jacob Doe</option>
					<option value="JoD">John Doe</option>
					<option value="AD">Anna Doe</option>
					<option value="JD">Jane Doe</option>
				</select>
			</p>
			<p class="form-row form-row-wide">
				<textarea class="input-text" rows="3" placeholder="Your Comment" name="calc_shipping_postcode" id="calc_shipping_postcode"></textarea>
			</p>
			<p>
				<button type="submit" name="calc_shipping" value="1" class="cws-button border-radius alt small">Submit</button>
			</p>
		</form>
	</aside> -->
	<!-- / course finder -->
	<!-- widget follow -->
	<aside class="widget-subscribe">
		<h2>Follow &amp; Subscribe</h2>
		<hr class="divider-big margin-bottom">
		<div><a href="#" class="fa fa-twitter"></a><a href="" class="fa fa-skype"></a><a href="" class="fa fa-google-plus"></a><a href="" class="fa fa-rss"></a><a href="" class="fa fa-youtube"></a></div>
	</aside>
	<!-- / widget follow -->
</div>