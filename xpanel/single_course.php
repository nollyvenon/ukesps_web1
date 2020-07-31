<?php
require_once("z_db.php");
if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
error_reporting(-1);
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
	"Female";
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="<?= SITE_URL ?>/img/favicon.png">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/fi/flaticon.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/main.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/main2.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/<?= SITE_URL ?>/css/settings.css" media="screen">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/animate.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/css/styles.css">
	<!--styles -->

	<link rel="stylesheet" href="<?= SITE_URL ?>/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!--styles -->
</head>

<body class="">
	<?php include("header.php");
	$course = $db_class->fetch_course_by_id($_GET['id']);
	?>

	<div class="grid-col grid-col-9">
		<main>
			<section class="clear-fix">
				<h2>Past Applied Jobs</h2>
				<hr>
				<!-- Shop -->
				<div role="main">
					<div itemscope="" itemtype="http://schema.org/Product" class="product">
						<?php

						if (isset($course) && !empty($course)) {
							foreach ($course as $row) {

						?>
								<!-- item -->
								<div style="cursor:pointer" class="category-item list clear-fix" onclick='location="course?id=<?= $row["course_id"] ?>"'>
									<div class="picture">
										<div class="hover-effect"></div>
										<div class="link-cont">
											<a href="http://placehold.it/270x200" class="fancy fa fa-search"></a>
										</div>
										<img src='<?= $row["course_img"] ?>' data-at2x="http://placehold.it/270x200" alt>
									</div>
									<h3><?= limit_text($row["course_title"], 10) ?></h3>
									<div>
										<div class="star-rating" title="Rated 4.00 out of 5">
											<span style="width:100%"></span>
										</div>
										<div class="count-reviews">( reviews 10 )</div>
									</div>
									<p><?= limit_text(htmlspecialchars($row["description"]), 70) ?></p>
									<div class="category-info">
										<span class="price">
											<span class="amount">
												<b><?= $row['course_fee'] ?> $</b>
											</span>

										</span>
										<span class="price">


										</span>
										<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
										<div class="course-lector">

										</div>
									</div>
								</div>


						<?php  }
						} ?>

						<hr class="divider-color" />
						<!-- woocommerce relative product -->
						<section>
							<div class="carousel-container">
								<div class="title-carousel">
									<h2>Some Category</h2>
									<div class="carousel-nav">
										<div class="carousel-button">
											<div class="prev"><i class="fa fa-angle-left"></i></div>
											<!-- 
											 -->
											<div class="next"><i class="fa fa-angle-right"></i></div>
										</div>
									</div>
								</div>
								<div class="grid-col-row">
									<div class="owl-carousel owl-three-item">
										<div class="gallery-item">
											<!-- product -->
											<div class="product new">
												<div class="picture">
													<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt="">
													<span class="hover-effect"></span>
													<div class="link-cont">
														<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
														<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
													</div>

												</div>
												<div class="product-name">
													<a href="shop-single-product.html">Suspendisse interdum</a>
												</div>
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<span class="price">
													<span class="amount">355<sup>$</sup></span>
												</span>

												<div class="product-description">
													<div class="short-description">
														<p>Vivamus fringilla eu nisl non laoreet, nunc nec faucibus arcu quis pretium</p>
													</div>
													<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
												</div>

												<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
											<!-- product -->
										</div>
										<div class="gallery-item">
											<!-- product -->
											<div class="product new">
												<div class="picture">
													<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt="">
													<span class="hover-effect"></span>
													<div class="link-cont">
														<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
														<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
													</div>

												</div>
												<div class="product-name">
													<a href="shop-single-product.html">Suspendisse interdum</a>
												</div>
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<span class="price">
													<span class="amount">225<sup>$</sup></span>
												</span>

												<div class="product-description">
													<div class="short-description">
														<p>Vivamus fringilla eu nisl non laoreet, nunc nec faucibus arcu quis pretium</p>
													</div>
													<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
												</div>

												<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
											<!-- product -->
										</div>
										<div class="gallery-item">
											<!-- product -->
											<div class="product new">
												<div class="picture">
													<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt="">
													<span class="hover-effect"></span>
													<div class="link-cont">
														<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
														<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
													</div>

												</div>
												<div class="product-name">
													<a href="shop-single-product.html">Suspendisse interdum</a>
												</div>
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<span class="price">
													<span class="amount">345<sup>$</sup></span>
												</span>

												<div class="product-description">
													<div class="short-description">
														<p>Vivamus fringilla eu nisl non laoreet, nunc nec faucibus arcu quis pretium</p>
													</div>
													<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
												</div>

												<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
											<!-- product -->
										</div>
										<div class="gallery-item">
											<!-- product -->
											<div class="product new">
												<div class="picture">
													<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt="">
													<span class="hover-effect"></span>
													<div class="link-cont">
														<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
														<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
													</div>

												</div>
												<div class="product-name">
													<a href="shop-single-product.html">Suspendisse interdum</a>
												</div>
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<span class="price">
													<span class="amount">555<sup>$</sup></span>
												</span>

												<div class="product-description">
													<div class="short-description">
														<p>Vivamus fringilla eu nisl non laoreet, nunc nec faucibus arcu quis pretium</p>
													</div>
													<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
												</div>

												<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
											<!-- product -->
										</div>
										<div class="gallery-item">
											<!-- product -->
											<div class="product new">
												<div class="picture">
													<img src="http://placehold.it/270x200" data-at2x="http://placehold.it/270x200" alt="">
													<span class="hover-effect"></span>
													<div class="link-cont">
														<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
														<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
													</div>

												</div>
												<div class="product-name">
													<a href="shop-single-product.html">Suspendisse interdum</a>
												</div>
												<div class="star-rating" title="Rated 5.00 out of 5">
													<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
												</div>
												<span class="price">
													<span class="amount">265<sup>$</sup></span>
												</span>

												<div class="product-description">
													<div class="short-description">
														<p>Vivamus fringilla eu nisl non laoreet, nunc nec faucibus arcu quis pretium</p>
													</div>
													<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
												</div>

												<a href="" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
											<!-- product -->
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- woocommerce relative product -->
					</div>
				</div>
				<!--Shop -->
			</section>
		</main>
	</div>
	<?php include("footer.php") ?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>

	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>

</html>