<?php
$courses = $zenta_operation->get_all_courses('2');
$contact = $zenta_operation->get_contact_details();
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
					<a href="tel:<?= $contact[0]['phone'] ?>" class="phone-number"><?= $contact[0]['phone'] ?></a>
					<br />
					<a href="mailto:<?= $contact[0]['email'] ?>" class="email"><?= $contact[0]['email'] ?></a>
					<br />
					<a href="www.ukesps.com" class="site">www.ukesps.com</a>
					<br />
					<a class="address"><?= $contact[0]['address'] ?></a>
				</address>
				<div class="footer-social">
					<a href="" class="fa fa-twitter"></a>
					<a href="https://web.facebook.com/Ukesps-100483061805345/" target="_blank" class="fa fa-facebook"></a>
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
					<p><span class="your-email"><input type="email" name="email" value="" size="40" placeholder="Email" aria-invalid="false" required></span> </p>
					<p><span class="your-email"><input type="text" name="phone" value="" size="40" placeholder="Phone" aria-invalid="false" required></span> </p>
					<p><span class="your-message"><textarea name="message" placeholder="Comments" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
					<button type="submit" class="cws-button bt-color-3 border-radius alt icon-right">Submit <i class="fa fa-angle-right"></i></button>
				</form>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<?php foreach ($banners as $banner) : ?>
				<?php if ($banner['position'] == 'footer_banner_1') : ?>
					<div class="banner banner-foot"><a href="<?= $banner['banner_url'] ?>"><img style="min-height: 80px; width: 100%; max-height:100px" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="" /></a></div>
				<?php endif ?>
			<?php endforeach ?>
			<!-- <div class="banner banner-foot"><img style="width: 100%;" src="<?= SITE_URL ?>/img/banners/topbanner_468x60.png" alt="" /></div> -->
		</div>
		<div class="col-lg-5 col-md-5">
			<?php foreach ($banners as $banner) : ?>
				<?php if ($banner['position'] == 'footer_banner_2') : ?>
					<div class="banner banner-foot"><a href="<?= $banner['banner_url'] ?>"><img style="min-height: 80px; width: 100%;  max-height:100px" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="" /></a></div>
				<?php endif ?>
			<?php endforeach ?>
			<!-- <div class="banner banner-foot">
				<img style="width: 100%;" src="<?= SITE_URL ?>/img/banners/topbanner_468x60.png" alt="">
			</div> -->
		</div>
	</div>
	<div class="footer-bottom">

		<div class="page-header-top sub-nav-section">
			<div class="grid-row clear-fix">
				<nav class="footer-nav">
					<ul class="clear-fix">
						<li class="entry-nav">
							<a href="<?= SITE_URL ?>/faq">FAQs</a>
						</li>
						<li class="entry-nav">
							<a href="<?= SITE_URL ?>/page_sup?sid=about">About</a>
						</li>
						<li class="entry-nav">
							<a href="<?= SITE_URL ?>/contact">Contact Us</a>
						</li>
						<!-- <li class="entry-nav"><a href="<?= SITE_URL ?>/search_job">Search Jobs</a></li> -->
						<li class="entry-nav">
							<a href="<?= SITE_URL ?>/page_sup?sid=terms_and_conditions">Terms and Conditions</a>
						</li>
						<li class="entry-nav">
							<a href="<?= SITE_URL ?>/page_sup?sid=privacy_policy">Privacy Policy</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="grid-row clear-fix">
			<div class="copyright">UKESPS<span></span> <?php echo date('Y'); ?> . All Rights Reserved</div>
		</div>
	</div>
</footer>
<script src="//code.tidio.co/3hg0q2zevuqyglsjat6ga0ytmavzldaw.js" async></script>