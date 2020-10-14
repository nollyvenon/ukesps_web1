<?php
require_once("main_header.php");
$sid = $_GET['sid'];
$contact = $zenta_operation->get_contact_details();
?>
<!-- / header -->
<!-- page content -->
<div class="page-title bg-color-4">
	<div class="grid-row">
		<h1><?php echo $zenta_operation->get_content_by_page_location($sid)['title']; ?></h1>
		<!-- bread crumb -->
		<nav class="bread-crumb">
			<a href="<?= SITE_URL ?>">Home</a>
			<i class="fa fa-long-arrow-right"></i>
			<a href="#"><?php echo $zenta_operation->get_content_by_page_location($sid)['page_name']; ?></a>
		</nav>
		<!-- / bread crumb -->
	</div>
</div>
<div class="page-content">
	<div class="container clear-fix">
		<div class="grid-col-row">

			<div class="grid-col grid-col-12">
				<!-- main content -->
				<main>

					<h2><?php echo $zenta_operation->get_content_by_page_location($sid)['title']; ?></h2>
					<?php echo $zenta_operation->get_content_by_page_location($sid)['info']; ?>


					<!-- quote -->
				</main>
				<!-- / main content -->
			</div>
			<?php //include_once('sidebar.php'); 
			?>
		</div>
	</div>

</div>
<!-- / page content -->
<?php if ($sid == 'about') : ?>
	<!-- / paralax section -->
	<hr class="divider-color" />
	<!-- paralax section -->
	<section class="fullwidth-background padding-section">
		<div class="grid-row grid-row-clear clear-fix">
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-5">
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
					<a href="about" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a>
				</div>
				<div class="col-lg-6 col-md-6">
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
	<!-- / section -->
	<hr class="divider-color" />
	<!-- section -->
	<section class="padding-section">
		<h2 class="center-text">Our Offices</h2>
		<p class="text-center">Visit us to find out more</p>
		<div class="grid-row grid-row-clear clear-fix">
			<div class="row">
				<?php foreach ($contact as $cont_info) : ?>
					<div class="col-lg-6 col-md-6 widget-address">
						<section>
							<h2>Our <?= $cont_info['country'] ?> Office</h2>
							<address>

								<p><strong class="fs-18">Address:</strong><br /><?= $cont_info['address'] ?></p>
								<p><strong class="fs-18">Phone number:</strong><br />
									<a href="tel:<?= $cont_info['phone'] ?>"><?= $cont_info['phone'] ?></a><br />
									<!-- <a href="tel:+2348112851444">234(811) 285 1444</a> -->
								</p>
								<p><strong class="fs-18">E-mail:</strong><br />

									<a href="mailto:<?= $cont_info['email'] ?>"><?= $cont_info['email'] ?></a>
								</p>
							</address>
						</section>
					</div>
				<?php endforeach ?>
				<!-- <div class="grid-col grid-col-6 widget-address">
						<section>
							<h2>Our Uk Office</h2>
							<address>
								<p><strong class="fs-18">Address:</strong><br />The UK address is 19 Richland house, Goldsmith Road, London Se15 5SZ. </p>
								<p><strong class="fs-18">Phone number:</strong><br />
									<a href="tel:+447448443723">+447448443723</a><br />

								</p>
								<p><strong class="fs-18">E-mail:</strong><br />
									<a href="mailto:info@ukesps.com">info@ukesps.com</a><br />

								</p>
							</address>
						</section>
					</div> -->
			</div>
		</div>
	</section>
	<!-- / section -->
<?php endif ?>
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->