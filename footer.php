<?php
$courses = $zenta_operation->get_all_courses('2');
?>
<footer>
	<div class="grid-row">
		<div class="grid-col-row clear-fix">
			<section class="grid-col grid-col-4 footer-about">
				<h2 class="corner-radius">About Us</h2>
				<div>
					<h3>A little about UKESPS</h3>
					<p>We're committed to building our brand, growing our audience and driving the most relevant candidates to your vacancies.</p>
				</div>
				<address>
					<p></p>
					<a href="tel:+2348188885094" class="phone-number">234(818) 888 5094</a>
					<br />
					<a href="mailto:info@ukesps.com" class="email">info@ukesps.com</a>
					<br />
					<a href="www.ukesps.com" class="site">www.ukesps.com</a>
					<br />
					<a href="www.ukesps.com" class="address">Lagos, Nigeria</a>
				</address>
				<div class="footer-social">
					<a href="" class="fa fa-twitter"></a>
					<a href="" class="fa fa-skype"></a>
					<a href="" class="fa fa-google-plus"></a>
					<a href="" class="fa fa-rss"></a>
					<a href="" class="fa fa-youtube"></a>
				</div>
			</section>
			<section class="grid-col grid-col-4 footer-latest">
				<h2 class="corner-radius">Latest courses</h2>
				<?php
				if (isset($courses) && !empty($courses)) {
					foreach ($courses as $row) {
				?>
						<article>
							<img src="<?= SITE_URL ?>/img/courses/<?php echo $row['course_img']; ?>" data-at2x="<?= SITE_URL ?>/img/courses/<?php echo $row['course_img']; ?>" alt>
							<h3><?php echo $row['course_title']; ?></h3>
							<div class="course-date">
								<div><?php echo date('H', strtotime($row['course_date'])); ?><sup><?php echo date('i', strtotime($row['course_date'])); ?></sup></div>
								<div><?php echo date('d M, Y', strtotime($row['course_date'])); ?></div>
							</div>
							<p><?php echo limit_text($row['course_overview'], 15); ?></p>
						</article>
				<?php
					}
				}
				?>
			</section>
			<section class="grid-col grid-col-4 footer-contact-form">
				<h2 class="corner-radius">apply for instructor</h2>
				<div class="email_server_responce"></div>
				<form action="php/contacts-process.php" class="contact-form" method="post" novalidate="novalidate">
					<p><span class="your-name"><input type="text" name="name" value="" size="40" placeholder="Name" aria-invalid="false" required></span>
					</p>
					<p><span class="your-email"><input type="text" name="phone" value="" size="40" placeholder="Phone" aria-invalid="false" required></span> </p>
					<p><span class="your-message"><textarea name="message" placeholder="Comments" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
					<button type="submit" class="cws-button bt-color-3 border-radius alt icon-right">Submit <i class="fa fa-angle-right"></i></button>
				</form>
			</section>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="grid-row clear-fix">
			<div class="copyright">UKESPS<span></span> <?php echo date('Y'); ?> . All Rights Reserved</div>

		</div>
	</div>
</footer>