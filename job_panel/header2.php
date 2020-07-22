	<!-- header -->
	<header class="only-color">
		<!-- header top panel -->
		<div class="page-header-top">
			<div class="grid-row clear-fix">
				<address>
					<a href="tel:+44 7448 443723" class="phone-number"><i class="fa fa-phone"></i>+44 7448 443723</a>
					<a href="mailto:info@ukesps.com" class="email"><i class="fa fa-envelope-o"></i>info@ukesps.com</a>
				</address>
				<div class="header-top-panel">
					<a href="<?= SITE_URL ?>/cart" class="fa fa-shopping-cart"><sup><?php if ($cart_volume > 0) {
																																					echo $cart_volume;
																																				} ?></sup></a>
					<a href="login" class="fa fa-user login-icon"></a>
					<div id="top_social_links_wrapper">
						<div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
						<div class="cws_social_links"><a href="https://plus.google.com/" class="cws_social_link" title="Google +"><i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i></a><a href="http://twitter.com/" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a><a href="http://facebook.com" class="cws_social_link" title="Facebook"><i class="share-icon fa fa-facebook"></i></a><a href="http://dribbble.com" class="cws_social_link" title="Dribbble"><i class="share-icon fa fa-dribbble"></i></a></div>
					</div>
					<a href="#" class="search-open"><i class="fa fa-search"></i></a>
					<form action="#" class="clear-fix">
						<input type="text" placeholder="Search" class="clear-fix">
					</form>

				</div>
			</div>
		</div>
		<!-- / header top panel -->

		<section class="full-width-banner">
			<div class="grid-row clear-fix">
				<div class="menu-banner-container">
					<div class="logo-ad">
						<a href="index" class="logo">
							<img src="<?= SITE_URL ?>/img/logo.png" data-at2x="<?= SITE_URL ?>/img/logo@2x.png" alt>
							<h1>UKESPS</h1>
						</a>
					</div>
				</div>
				<div class="banner banner-one"><img src="<?= SITE_URL ?>/img/banners/topbanner_468x60.png" alt="" /></div>
				<div class="banner banner-two">
					<img src="<?= SITE_URL ?>/img/banners/topbanner_468x60.png" alt="">
				</div>
			</div>
		</section>


		<!-- sticky menu -->
		<div class="sticky-wrapper">
			<div class="sticky-menu">
				<div class="grid-row clear-fix">
					<!-- logo -->
					<!-- <a href="index" class="logo">
					<img src="<?= SITE_URL ?>/img/logo.png" data-at2x="<?= SITE_URL ?>/img/logo@2x.png" alt>
					<h1>UKESPS</h1>
				</a> -->
					<!-- / logo -->
					<nav class="main-nav">
						<ul class="clear-fix">
							<li><a href="<?= SITE_URL ?>/index" class="active">Home</a></li>
							<li><a href="<?= SITE_URL ?>/page_sup?sid=about">About</a></li>
							<li><a href="javascript:void(0)" class="dropdown_item">Services<i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-news"><a href="<?= SITE_URL ?>/page_sup?sidi=scholarships" title="News"><span>Scholarships</span></a></li>
									<li class="mi-events"><a href="<?= SITE_URL ?>/page_sup?sidi=scholarships" title="University Visits"><span>University Representation</span></a></li>
									<li class="mi-testimonials"><a href="<?= SITE_URL ?>/page_sup?sidi=scholarships" title="Student Testimonials"><span>English Tests</span></a></li>
									<li class="mi-university-comments"><a href="<?= SITE_URL ?>/page_sup?sidi=accomodation_support" title="Accomodation Support"><span>Accommodation Support</span></a></li>
									<li class="mi-faqs"><a href="<?= SITE_URL ?>/page_sup?sidi=student_support" title="FAQs"><span>Student Support</span></a></li>
									<li class="mi-faqs"><a href="<?= SITE_URL ?>/page_sup?sidi=exhibition_events" title="FAQs"><span>Exhibition and Events</span></a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)" class="dropdown_item">Study Match<i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-events"><a href="<?= SITE_URL ?>/page_sup?sidi=study_abroad" title="Studying Abroad"><span>Studying Abroad</span></a></li>
									<li class="mi-news"><a href="<?= SITE_URL ?>/page_sup?sidi=universities" title="Universities"><span>Universities</span></a></li>
									<li class="mi-faqs"><a href="<?= SITE_URL ?>/page_sup?sidi=enquiry_now" title="FAQs"><span>Enquire Now</span></a></li>
								</ul>
							</li>
							<li><a href="javascript:void(0)" class="dropdown_item">Users Portal <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-parent">
									<li class="mi-news"><a href="<?= SITE_URL ?>/login" title="News"><span>Student Area</span></a></li>
									<li class="mi-events"><a href="<?= SITE_URL ?>/course_panel/login" title="University Visits"><span>University Area</span></a></li>
									<li class="mi-events"><a href="<?= SITE_URL ?>/recru_panel/login" title="University Visits"><span>Recruiter Area</span></a></li>
									<li class="mi-events"><a href="<?= SITE_URL ?>/events/login" title="Events Posting"><span>Events Area</span></a></li>
									<li class="mi-events"><a href="<?= SITE_URL ?>/job_panel/login" title="University Visits"><span>Applicant Area</span></a></li>
									<li class="mi-testimonials"><a href="<?= SITE_URL ?>/register" title="Student Testimonials"><span>Student Registration</span></a></li>
									<!--<li class="mi-university-comments"><a href="apply-online" title="University Comments"><span>Online Application</span></a></li>-->

								</ul>
							</li>
							<li><a href="<?= SITE_URL ?>/event">Events</a></li>
							<li><a href="<?= SITE_URL ?>/courses">Courses </i></a></li>
							<li><a href="<?= SITE_URL ?>/recru_panel/add_job">Post a Job</a></li>

							<li><a href="#">Skills Match</a></li>
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
							<a href="<?= SITE_URL ?>/help">Help</a>
						</li>
						<li class="entry-nav">
							<a href="cv_search">CV Search</a>
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
	</header>
	<!-- / header -->