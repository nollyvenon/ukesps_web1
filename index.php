<!-- page header -->
<?php include_once('main_header.php'); ?>
<?php $sliders = $zenta_operation->getSlider(); ?>
<!-- / page header -->
<!-- revolution slider -->
<div class="tp-banner-container">
	<div class="tp-banner-slider">
		<ul>
			<?php foreach ($sliders as $slider) { ?>
				<li data-masterspeed="700">
					<img src="rs-plugin/assets/loader.gif" data-lazyload="img/sliders/<?= $slider['image'] ?>" alt>
					<div class="tp-caption sl-content align-left" data-x="['left','center','center','center']" data-hoffset="20" data-y="center" data-voffset="0" data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
						<div class="sl-title"><?= $slider['title'] ?></div>
						<p><?= $slider['sub_title'] ?></p>
						<a href="<?= SITE_URL ?>/register" class="cws-button border-radius">Join us <i class="fa fa-angle-double-right"></i></a>
					</div>
				</li>
			<?php	} ?>

			<!-- <li data-masterspeed="700">
				<img src="rs-plugin/assets/loader.gif" data-lazyload="img/Intro-thumb09.jpg" alt>
				<div class="tp-caption sl-content align-right" data-x="['right','center','center','center']" data-hoffset="20" data-y="center" data-voffset="0" data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
					<div class="sl-title">Welcome to UKESPS</div>
					<p> Find a job you love with the UK's #1 job site </p>
					<a href="" class="cws-button border-radius">Join us <i class="fa fa-angle-double-right"></i></a>
				</div>
			</li>
			<li data-masterspeed="700" data-transition="fade">
				<img src="rs-plugin/assets/loader.gif" data-lazyload="img/118691-2.jpg" alt>
				<div class="tp-caption sl-content align-center" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
					<div class="sl-title">Knowledge for life</div>
					<p>Our staff are well trained by our UK team who visit your country regularly</p>
					<a href="" class="cws-button border-radius">Join us <i class="fa fa-angle-double-right"></i></a>
				</div>
			</li>
			<li data-masterspeed="700" data-transition="fade">
				<img src="rs-plugin/assets/loader.gif" data-bgposition="center right" data-lazyload="img/huffington-post-2-1.jpg" alt>
				<div class="tp-caption sl-content align-left" data-x="['left','center','center','center']" data-hoffset="20" data-y="center" data-voffset="40" data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
					<div class="sl-title">Get your dream job</div>
					<p>Jobs from across over 40 sectors, jobs that match your skillsets</p>
					<a href="" class="cws-button border-radius">Join us <i class="fa fa-angle-double-right"></i></a>
				</div>
			</li> -->
		</ul>
	</div>
</div>
<!-- / revolution slider -->
<hr class="divider-color">
<!-- content -->

<div class="main-content">

	<div class="side-banner-one">
		<!-- <div class="side-banner"><img src="<?= SITE_URL ?>/img/banners/side-banner.png" alt="" /></div> -->
	</div>

	<div id="home" class="clear-fix">
		<?php foreach ($banners as $banner) : ?>
			<?php if ($banner['position'] == 'content_banner_1') : ?>
				<div class="banner"><a href="<?= $banner['banner_url'] ?>"><img class="image-fluid" style="height:auto; width: 100%;" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></div>
			<?php endif ?>
		<?php endforeach ?>
		<section class="container-fluid">
			<table class="side-banner-two">
				<tr>
					<?php foreach ($banners as $banner) : ?>
						<?php if ($banner['position'] == 'right_banner_1') : ?>
							<td class="side-banner"><a href="<?= $banner['banner_url'] ?>"><img src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></td>
						<?php endif ?>
					<?php endforeach ?>

				</tr>
				<tr>
					<?php foreach ($banners as $banner) : ?>
						<?php if ($banner['position'] == 'right_banner_2') : ?>
							<td class="side-banner" style="margin-top: 20px;"><a href="<?= $banner['banner_url'] ?>"><img src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></td>
						<?php endif ?>
					<?php endforeach ?>
					<!-- <td class="side-banner" style="margin-top: 20px;"><a href="hhd.com"><img src="<?= SITE_URL ?>/img/banners/side-banner.png" alt="" /></a></td> -->
				</tr>
				<tr>
					<?php foreach ($banners as $banner) : ?>
						<?php if ($banner['position'] == 'right_banner_3') : ?>
							<td class="side-banner" style="margin-top: 20px;"><a href="<?= $banner['banner_url'] ?>"><img src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></td>
						<?php endif ?>
					<?php endforeach ?>
					<!-- <td class="side-banner" style="margin-top: 20px;"><img src="<?= SITE_URL ?>/img/banners/side-banner.png" alt="" /></td> -->
				</tr>
			</table>
			<div class="grid-row grid-row-clear clear-fix">
				<h2 class="center-text">Choose your Sector of Preference</h2>
				<h6 class="center-text">Get a job from a sector that best suits your skill</h6>
				<div class="grid-col grid-col-row">
					<?php if (isset($job_sector) && !empty($job_sector)) {
						foreach ($job_sector as $row) { ?>
							<div class="grid-col grid-col-4 job-sector">
								<!-- course item -->
								<div class="course-item def">
									<div class="course-hover">
										<img class="image-fluid" src="img/job_sectors/<?php echo $row['sector_img']; ?>" alt>
										<div class="hover-bg bg-color-1"></div>
										<a href="job_sector?sid=<?php echo $row['sector_id']; ?>"><?php echo $row['sector_name']; ?></a>
									</div>
									<div class="course-name clear-fix">
										<!--<span class="price">$75</span>-->
										<h3><a href="job_sector?sid=<?php echo $row['sector_id']; ?>"><?php echo $row['sector_name']; ?></a></h3>
									</div>
								</div>
								<!-- / course item -->
							</div>
					<?php  }
					} ?>

				</div>

			</div>
		</section>

		<hr class="divider-color" />

		<section class="padding-section side-banner-container">
			<div class="grid-row grid-row-clear clear-fix">
				<div class="grid-col-row">
					<?php echo $zenta_operation->show_job_cat_hompage(); ?>

				</div>
			</div>

		</section>
		<!-- / section -->
		<hr class="divider-color" />
		<!-- section -->
		<section class="fullwidth-background padding-section">
			<div class="grid-row grid-row-clear clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<a href="" class="service-icon"><i class="flaticon-pie"></i></a>
						<a href="" class="service-icon"><i class="flaticon-medical"></i></a>
						<a href="" class="service-icon"><i class="flaticon-restaurant"></i></a>
						<a href="" class="service-icon"><i class="flaticon-website"></i></a>
						<a href="" class="service-icon"><i class="flaticon-hotel"></i></a>
						<a href="" class="service-icon"><i class="flaticon-web-programming"></i></a>
						<a href="" class="service-icon"><i class="flaticon-camera"></i></a>
						<a href="" class="service-icon"><i class="flaticon-speech"></i></a>
					</div>
					<div class="grid-col grid-col-6 clear-fix">
						<h2>Our Services</h2>
						<p>UKESPS works with a number of universities that offer a wide range of scholarship options to students. Most of the scholarships are based purely on merit. Some are based on merit and financial need and others on nationality. .</p>
						<a href="about" class="cws-button bt-color-3 border-radius alt icon-right float-right">Learn More<i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- / section -->
		<!-- paralax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="img/parallax.png" alt="">

			</div>
			<div class="them-mask bg-color-1"></div>
			<div class="grid-row">
				<div class="grid-col-row clear-fix">
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-book1"></i>
							<div class="counter" data-count="156">0</div>
							<div class="counter-name">Universities</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-multiple"></i>
							<div class="counter" data-count="4781">0</div>
							<div class="counter-name">Students</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-pencil"></i>
							<div class="counter" data-count="541">0</div>
							<div class="counter-name">Courses</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block last">
							<i class="flaticon-calendar"></i>
							<div class="counter" data-count="120">0</div>
							<div class="counter-name">Events</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / paralax section -->
		<!-- section -->
		<!-- parallax section -->
		<?php foreach ($banners as $banner) : ?>
			<?php if ($banner['position'] === 'content_banner_4') : ?>
				<div class="banner"><a href="<?= $banner['banner_url'] ?>"><img class="image-fluid" style="height:auto; width: 100%;" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></div>
			<?php endif ?>
		<?php endforeach ?>
		<!-- / paralax section -->
		<hr class="divider-color" />
		<!-- paralax section -->
		<section class="fullwidth-background padding-section">
			<div class="grid-row grid-row-clear clear-fix">
				<h2 class="center-text">About Us</h2>
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<h3>Why We Are Better</h3>
						<p>See why we stand out in our services</p>
						<!-- accordions -->
						<div class="accordions">
							<!-- content-title -->
							<div class="content-title active">A trusted brand, with a recruitment heritage</div>
							<!--/content-title -->
							<!-- accordions content -->
							<div class="content">A trusted brand, with a recruitment heritage</div>
							<!--/accordions content -->
							<!-- content-title -->
							<div class="content-title">We provide skill match services</div>
							<!--/content-title -->
							<!-- accordions content -->
							<div class="content">We provide skill match services</div>
							<!--/accordions content -->
							<!-- content-title -->
							<div class="content-title">A one-stop portal for the best courses from the best universities in Europe and America</div>
							<!--/content-title -->
							<!-- accordions content -->
							<div class="content">A one-stop portal for the best courses from the best universities in Europe and America</div>
							<!--/accordions content -->
							<!-- content-title -->
							<div class="content-title">We provide job placement</div>
							<!--/content-title -->
							<!-- accordions content -->
							<div class="content">We provide job placement</div>
							<!--/accordions content -->
						</div>
						<!--/accordions -->
						<a href="page_sup?sid=about" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a>
					</div>
					<div class="grid-col grid-col-6">
						<div class="owl-carousel full-width-slider">
							<div class="gallery-item picture">
								<img src="img/Intro-thumb09.jpg" data-at2x="img/Intro-thumb09.jpg" alt>
							</div>
							<div class="gallery-item picture">
								<img src="img/huffington-post-2-1.jpg" data-at2x="img/huffington-post-2-1.jpg" alt>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- paralax section -->
		<!-- parallax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="img/parallax.png" alt="">
			</div>
			<div class="them-mask bg-color-2"></div>
			<div class="grid-row grid-row-clear center-text">
				<div class="font-style-1 margin-none">Get In Touch With Us</div>
				<div class="divider-mini"></div>
				<p class="parallax-text">Be up to date with latest from our partners, scholarships,job, events by subscribing to your our newsletter.</p>
				<div class="email_server_response"></div>
				<form class="subscribe" action="php/contacts-process.php" method="POST" novalidate="novalidate">
					<p><input type="text" name="email" value="" size="40" placeholder="Enter your email" aria-required="true"><input name="subscribe" type="submit" value="Subscribe"></p>
				</form>
			</div>
		</div>
		<!-- parallax section -->
		<!-- section -->

		<!-- / section -->
		<hr class="divider-color" />
		<!-- section -->
		<section class="padding-section">
			<div class="grid-row grid-row-clear clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<div class="video-player">
							<iframe src="https://www.youtube.com/embed/rZsH88zNxRw"></iframe>
						</div>
					</div>
					<div class="grid-col grid-col-6 clear-fix">
						<h2>Learn More About Us From Video</h2>
						<p>The video explains the concept, vision and mission of UKESPS</p>
						<!-- <p>The video explains the concept, vision and mission of UKESPS</p> -->
						<br />
						<br />
						<br />
						<br />
						<a href="page_sup?sid=about" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- / section -->

		<!-- parallax section -->
		<?php foreach ($banners as $banner) : ?>
			<?php if ($banner['position'] === 'content_banner_2') : ?>
				<div class="banner "><a href="<?= $banner['banner_url'] ?>"><img class="image-fluid" style="height:auto; width: 100%;" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></div>
			<?php endif ?>
		<?php endforeach ?>
		<hr class="divider-color" />
		<!-- section -->
		<section class="fullwidth-background testimonial padding-section">
			<div class="grid-row grid-row-clear">
				<h2 class="center-text">Testimonials</h2>
				<div class="owl-carousel full-width-slider">
					<?php foreach ($testimonials as $testimony) { ?>
						<div class="gallery-item picture">
							<div class="quote-avatar-author clear-fix"><img style="height:40px;width:40px;" src="<?= $testimony['testi_image'] == NULL ? 'img/option-3.jpg' : $testimony['testi_image'] ?>" data-at2x="<?= $testimony['testi_image'] == NULL ? 'img/option-3.jpg' : $testimony['testi_image'] ?>" alt="">
								<div class="author-info"><?= $testimony['testi_name'] ?><br><span><?= $testimony['testi_designation'] ?></span></div>
							</div>
							<p><?= $testimony['testi_content'] ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
			<br><br> <a href="testimonials" class="cws-button bt-color-3 border-radius alt icon-right float-right">View All<i class="fa fa-angle-right"></i></a>
		</section>

		<!-- / section -->
		<!-- google map -->
		<!--<div class="wow fadeInUp">
			<div id="map" class="google-map"></div>
		</div>
		 / google map -->
		<hr class="divider-color" />

		<!-- parallax section -->
		<?php foreach ($banners as $banner) : ?>
			<?php if ($banner['position'] === 'content_banner_3') : ?>
				<div class="banner"><a href="<?= $banner['banner_url'] ?>"><img style="height:auto; width: 100%;" src="<?= SITE_URL ?>/img/banners/<?= $banner['image'] ?>" alt="<?= $banner['title'] ?>" /></a></div>
			<?php endif ?>
		<?php endforeach ?>
	</div>

</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<!--<input name="hidjobcat" type="hidden">-->
				<div class="fetched-data"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div class="col-lg-12" style="display: none;" id="cookie_pol">
	<div class="alert alert-dark alert-dismissible fade show testimonial" role="alert" style="padding-top:30px; position: fixed; height:50px; bottom:0px; width:93%; z-index:999999">
		<strong>By view the content of this site, you accept our <a href="page_sup?sid=terms_and_conditions">Terms and conditions</a></strong>
		<button style="margin-top: 20px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">Close</span>
		</button>
	</div>
</div>
<!-- <script src="js/platform.js" defer></script>
	<div class="elfsight-app-e7b23910-6657-41f9-9f04-ec0f94de60c8"></div> -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->