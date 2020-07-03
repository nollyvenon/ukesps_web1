<?php
include("z_db.php");
$job_sector = $zenta_operation->get_job_sector(3);
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="fi/flaticon.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/main2.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
	<!--styles -->
	
	  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- page header -->
	<?php include_once('header.php'); ?>
	<!-- / page header -->
	<!-- revolution slider -->
	<div class="tp-banner-container">
		<div class="tp-banner-slider">
			<ul>
				<li data-masterspeed="700">
					<img src="rs-plugin/assets/loader.gif" data-lazyload="img/option-3.jpg" alt>
					<div class="tp-caption sl-content align-left" data-x="['left','center','center','center']" data-hoffset="20" data-y="center" data-voffset="0" data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
						<div class="sl-title">The Agency for you</div>
						<p>fastest growing UK based agency that has been recruiting students from Nigeria, Ghana, Kenya and Pakistan </p>
						<a href="" class="cws-button border-radius">Join us <i class="fa fa-angle-double-right"></i></a>
					</div>
				</li>
				<li data-masterspeed="700">
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
				</li>
			</ul>
		</div>
	</div>
	<!-- / revolution slider -->
	<hr class="divider-color">
	<!-- content -->

	<div class="main-content">
		<div class="side-banner-one">
			<!-- <div class="side-banner"><img src="./img/banners/side-banner.png" alt="" /></div> -->
		</div>
		<div id="home" class="clear-fix">

			<!-- section -->


			<section class="padding-section">
				<div class="grid-row grid-row-clear clear-fix">
					<h2 class="center-text">Choose your Sector of Preference</h2>
					<h6 class="center-text">Get a job from a sector that best suits your skill</h6>
					<div class="grid-col grid-col-row">
						<?php if (isset($job_sector) && !empty($job_sector)) {
							foreach ($job_sector as $row) { ?>
								<div class="grid-col grid-col-4 job-sector">
									<!-- course item -->
									<div class="course-item">
										<div class="course-hover">
											<img src="img/job_sectors/<?php echo $row['sector_img']; ?>" data-at2x="img/job_sectors/<?php echo $row['sector_img']; ?>" alt>
											<div class="hover-bg bg-color-1"></div>
											<a href="job_sector?seid=<?php echo $row['sector_id']; ?>"><?php echo $row['sector_name']; ?></a>
										</div>
										<div class="course-name clear-fix">
											<!--<span class="price">$75</span>-->
											<h3><a href="job_sector?seid=<?php echo $row['sector_id']; ?>"><?php echo $row['sector_name']; ?></a></h3>
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
				<div class="grid-row grid-row-clear">
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
							<a href="about" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a>
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
					<form class="subscribe">
						<input type="text" name="email" value="" size="40" placeholder="Enter your email" aria-required="true"><input type="submit" value="Subscribe">
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
							<p>The video explains the concept, vision and mission of UKESPS</p>
							<br />
							<br />
							<br />
							<br />
							<a href="about" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</section>
			<!-- / section -->
			<!-- parallax section -->
			<div class="parallaxed banner">
				<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
					<img src="./img/banners/topbanner_468x60.png" alt="" />
				</div>
				<!-- <div class="them-mask bg-color-3"></div> -->
				<!-- <div class="grid-row grid-row-clear center-text"> -->
				<!-- twitter -->
				<!-- <div class="twitter-1"></div> -->
				<!-- / twitter -->
				<!-- </div> -->
			</div>
			<!-- parallax section -->

			<hr class="divider-color" />
			<!-- section -->
			<section class="fullwidth-background testimonial padding-section">
				<div class="grid-row grid-row-clear">
					<h2 class="center-text">Testimonials</h2>
					<div class="owl-carousel testimonials-carousel">
						<div class="gallery-item">
							<div class="quote-avatar-author clear-fix"><img style="height:40px;width:40px;" src="img/option-3.jpg" data-at2x="img/option-3.jpg" alt="">
								<div class="author-info">Adebimpe Shola<br><span>Writer</span></div>
							</div>
							<p>UKESPS has a respectable work ethic and professional manner which aligns well with The University of Melbourne's </p>
						</div>
						<div class="gallery-item">
							<div class="quote-avatar-author clear-fix"><img style="height:40px;width:40px;" src="img/option-3.jpg" data-at2x="img/option-3.jpg" alt="">
								<div class="author-info">John Emeka<br><span>Student, Ireland</span></div>
							</div>
							<p>In less than a month, both my wife and I were granted visas; thanks to the meticulous work that the staff of UKESPS did. I would recommend UKESPS to anyone intending on Studying Abroad.</p>
						</div>
						<div class="gallery-item">
							<div class="quote-avatar-author clear-fix"><img style="height:40px;width:40px;" src="img/option-3.jpg" data-at2x="img/option-3.jpg" alt="">
								<div class="author-info">Kunle Yomi<br><span>Sussex, UK</span></div>
							</div>
							<p>Thanks for the opportunity. </p>
						</div>
					</div>
				</div>
			</section>
			<!-- / section -->
			<!-- google map -->
			<!--<div class="wow fadeInUp">
			<div id="map" class="google-map"></div>
		</div>
		 / google map -->



			<!-- / content -->
			<!-- parallax section -->
			<div class="parallaxed banner">
				<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
					<img src="./img/banners/topbanner_468x60.png" alt="" />
				</div>
				<!-- <div class="them-mask bg-color-3"></div> -->
				<!-- <div class="grid-row grid-row-clear center-text"> -->
				<!-- twitter -->
				<!-- <div class="twitter-1"></div> -->
				<!-- / twitter -->
				<!-- </div> -->
			</div>
			<!-- parallax section -->
		</div>
		<table class="side-banner-two">
			<tr>
				<td class="side-banner"><img src="./img/banners/side-banner.png" alt="" /></td>
			</tr>
			<tr>
				<td class="side-banner" style="margin-top: 20px;"><img src="./img/banners/side-banner.png" alt="" /></td>
			</tr>
			<tr>
				<td class="side-banner" style="margin-top: 20px;"><img src="./img/banners/side-banner.png" alt="" /></td>
			</tr>
		</table>
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
	<!-- footer -->
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	
	
	
	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>-->
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.tweet.js"></script>
	<script>
		$(document).ready(function(){
			$('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'modal_job_subcat_list.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
			//$("input[name='hidjobcat']").val(data);
            }
        });
     });
		});
	</script>
</body>

</html>