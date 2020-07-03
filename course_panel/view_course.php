<?php
require_once("z_db.php");
if (!$session_course_prov->is_logged_in()) {
    redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($course_prov_object->get_course_provider_detail($course_prov_code));
$comment_count = $zenta_operation->get_course_comment_count($hiss);
$course_total_rating = $zenta_operation->get_total_course_rating($hiss);
$course_avg_rating = $course_total_rating/$comment_count;
$rating_percent = (($course_total_rating/$comment_count)/5)*100;
	if ($_POST['submit']){
		foreach($_POST as $key => $value) {
        	$_POST[$key] = $db_handle->sanitizePost(trim($value));
    	}
    	extract($_POST);
		$zenta_operation->add_course_comment($user_code, $email, $hiss, $comment, $author, $rating);
	}
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="css/styles.css">
	<!--styles -->
</head>
<body class="shop">

	<?php include('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
					<!-- Shop -->
					<div role="main">
						<div  itemscope="" itemtype="http://schema.org/Product" class="product">
							<div class="images">
								<div class="picture">
									<img src="../img/courses/<?=$course_img;?>" data-at2x="../img/courses/<?=$course_img;?>" class="attachment-shop_single" alt="" title="">
									<div class="hover-effect"></div>
									<div class="link-cont">
										<a href="../img/courses/<?=$course_img;?>" class="fancy fa fa-eye woocommerce-main-image zoom" data-fancybox-group="gallery" title="" data-rel="prettyPhoto[product-gallery]"></a>
									</div>
								</div>
								<!--<div class="thumbnails">
									<div class="owl-carousel">
										<div class="pic thumbnail">
											<a href="http://placehold.it/116x116" class="zoom first fancy" data-fancybox-group="gallery" title="" data-rel="prettyPhoto[product-gallery]">
												<div class="hover-effect"></div>
												<img src="http://placehold.it/116x116" data-at2x="http://placehold.it/116x116" class="attachment-shop_thumbnail" alt="">
											</a>
										</div>
										<div class="pic thumbnail">
											<a href="http://placehold.it/116x116" class="zoom first fancy" data-fancybox-group="gallery" title="" data-rel="prettyPhoto[product-gallery]">
												<div class="hover-effect"></div>
												<img src="http://placehold.it/116x116" data-at2x="http://placehold.it/116x116" class="attachment-shop_thumbnail" alt="">
											</a>
										</div>
										<div class="pic thumbnail">
											<a href="http://placehold.it/116x116" class="zoom first fancy" data-fancybox-group="gallery" title="" data-rel="prettyPhoto[product-gallery]">
												<div class="hover-effect"></div>
												<img src="http://placehold.it/116x116" data-at2x="http://placehold.it/116x116" class="attachment-shop_thumbnail" alt="">
											</a>
										</div>
										<div class="pic thumbnail">
											<a href="http://placehold.it/116x116" class="zoom first fancy" data-fancybox-group="gallery" title="" data-rel="prettyPhoto[product-gallery]">
												<div class="hover-effect"></div>
												<img src="http://placehold.it/116x116" data-at2x="http://placehold.it/116x116" class="attachment-shop_thumbnail" alt="">
											</a>
										</div>
									</div>	
								</div>-->
							</div>
							<div class="summary entry-summary">
								<h2  class="product_title entry-title"><?=$course_title;?></h2>
								<div class="star-rating" title="Rated <?=$course_avg_rating;?> out of 5">
									<span style="width:<?=$rating_percent;?>%"><strong class="rating"><?=$course_avg_rating;?></strong> out of 5</span>
								</div>
								<div  itemscope="" itemtype="http://schema.org/Offer">
									<p class="price">
										<span class="amount"><?=$course_currency;?><?=$course_fee;?></span>
									</p>
								</div>
								<div itemprop="description">
									<p><strong>Category:</strong><?= $category_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Sub category:</strong><?= $sub_category_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Duration:</strong><?= $duration;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Location:</strong><?= $location_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Study Level:</strong><?= $study_level_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Study Method:</strong><?= $study_method_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Institution:</strong><?= $institute_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Course type:</strong><?= $type_name;?></p>
								</div>
								<div itemprop="description">
									<p><strong>Quick Overview:</strong><?= $course_overview;?></p>
								</div>	
								<div class="main-features">
									<p class="head"><strong>Career Path:</strong></p>
									<?=career_path;?>
								</div>
								<div class="main-features">
									<p class="head"><strong>Who is the Course For?:</strong></p>
									<?=who_is_course_for;?>
								</div>
								<!--<form class="cart" method="post"> 
								  <div class="quantity buttons_added"><input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text"></div> 
								 	 <button type="submit" class="cws-button corner-radius-bottom alt"><i class="fa fa-shopping-cart"></i> Add to cart</button>
								</form>	-->						
								<div class="product_meta">
									<span class="tagged_as">
										<?php
										$myArray = explode(',', $tag);
										foreach($myArray as $my_Array){
										?>
										<a href="#" rel="tag"><?= $my_Array;?></a>
										<?php } ?>
									</span>								
								</div>
							</div>
							<hr class="divider-color">
							<!-- tabs -->
							<div class="tabs">
								<div class="block-tabs-btn clear-fix">
									<div class="tabs-btn active" data-tabs-id="tabs1">Description</div>
									<div class="tabs-btn" data-tabs-id="tabs2">Course Structure</div>
									<div class="tabs-btn" data-tabs-id="tabs3">Entry Requirements</div>
									<div class="tabs-btn" data-tabs-id="tabs4">Reviews</div>
								</div>
								<!-- tabs keeper -->
								<div class="tabs-keeper">
									<!-- tabs container -->
									<div class="container-tabs active" data-tabs-id="cont-tabs1">
										<?= $description;?>
									</div>
									<!--/tabs container -->
									<!-- tabs container -->
									<div class="container-tabs" data-tabs-id="cont-tabs2">
										<?= $course_structure;?>
									</div>
									<div class="container-tabs" data-tabs-id="cont-tabs2">
										<?= $entry_requirements;?>
										<br><br>
										<?= $apply_info;?>
									</div>
									<!--/tabs container -->
									<!-- tabs container -->
									<div class="container-tabs" data-tabs-id="cont-tabs4">
										<div id="reviews">
											<div class="comments">
												<h3><?=$comment_count;?> Reviews</h3>
												<ol class="commentlist">
													<?php
								$comments = $zenta_operation->get_course_reviews_by_courseID($course_id, '5');
								//comment_count = $zenta_operation->get_course_review_by_id($course_id)['comment_count'];
								if(isset($comments) && !empty($comments)) { foreach ($comments as $row) { 
									$comment_poster = $row['comment_poster'];
									$comment = $row['comment'];
									$timestamp = $row['timestamp'];
									$comment_rating = $row['comment_rating'];
									$comment_width = $comment_width*$comment_rating/5;
						?>
								<li class="comment">
									<div class="comment_container clear">
										<img src="../img/courses/<?=$course_img;?>" height="70" width="70" data-at2x="../img/courses/<?=$course_img;?>" alt="" class="avatar">
										<div class="comment-text">
											<div class="star-rating" title="Rated <?=$comment_rating;?> out of 5">
												<span style="width:<?=$comment_width;?>%"><strong class="rating"><?=$comment_rating;?></strong> out of 5</span>
											</div>
											<p class="meta">
												<strong><?=$comment_poster;?></strong>
												<time datetime="<?php echo gmdate(DATE_W3C, $timestamp); ?>">/<?php echo date('Y.m.d H:i:s', $timestamp); ?></time>
											</p>
											<div class="description">
												<p><?=$comment;?></p>
											</div>
										</div>
									</div>
								</li>
								<?php } }?>
												</ol>
											</div>
											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														<h3 id="reply-title" class="comment-reply-title">Add a review</h3>
														<form action="" method="post" class="comment-form">
														<input name="hiss" value="<?= $hiss;?>" type="hidden">
															<p class="comment-form-author">
																<label for="author">Name <span class="required">*</span></label>
																<input id="author" name="author" type="text" value="" size="30" aria-required="true">
															</p>
															<p class="comment-form-email">
																<label for="email">Email <span class="required">*</span></label>
																<input id="email" name="email" type="text" value="" size="30" aria-required="true">
															</p>
															<div class="comment-form-rating">
																<label for="rating">Your Rating</label>
																<p class="stars">
																	<span>
																		<a class="star-1" href="#">1</a>
																		<a class="star-2" href="#">2</a>
																		<a class="star-3" href="#">3</a>
																		<a class="star-4" href="#">4</a>
																		<a class="star-5" href="#">5</a>
																	</span>
																</p>
																<select name="rating" id="rating" style="display: none;">
																	<option value="">Rate…</option>
																	<option value="5">Perfect</option>
																	<option value="4">Good</option>
																	<option value="3">Average</option>
																	<option value="2">Not that bad</option>
																	<option value="1">Very Poor</option>
																</select>
															</div>
															<p class="comment-form-comment">
																<label for="comment">Your Review</label>
																<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
															</p>
															<p class="form-submit">
																<input type="submit" class="cws-button border-radius small" name="submit" value="Post Review" />
															</p>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--/tabs container -->
								</div>
								<!--/tabs keeper -->
							</div>
							<!-- /tabs -->
							
							<!--/woocommerce tabs -->
							<hr class="divider-color"/>
							<!-- woocommerce relative product -->
							<section>
								<div class="carousel-container">
									<div class="title-carousel">
										<h2>Other Courses</h2>
										<div class="carousel-nav">
											<div class="carousel-button">
												<div class="prev"><i class="fa fa-angle-left"></i></div><!-- 
											 --><div class="next"><i class="fa fa-angle-right"></i></div>
											</div>
										</div>
									</div>
									<div class="grid-col-row">
										<div class="owl-carousel owl-three-item">
											<?php
											$similar_courses = $zenta_operation->get_similar_courses();
									if (isset($similar_courses) && !empty($similar_courses)) {
										foreach ($similar_courses as $row) {
											
											$comment_count = $zenta_operation->get_course_comment_count($hiss);
$course_total_rating = $zenta_operation->get_total_course_rating($hiss);
$course_avg_rating = $course_total_rating/$comment_count;
$rating_percent = (($course_total_rating/$comment_count)/5)*100;
											?>
											<div class="gallery-item">
												<!-- product -->
												<div class="product new">
													<div class="picture">
														<img src="../img/courses/<?=$course_img;?>" width="270" height="200" data-at2x="../img/courses/<?=$course_img;?>" alt="">
														<span class="hover-effect"></span>
														<div class="link-cont">
															<a href="../img/courses/<?=$course_img;?>" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
															<a href="view_course?sid=<?=$course_id;?>" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
														</div>
														
													</div>
													<div class="product-name">
														<a href="view_course?sid=<?=$course_id;?>"><?=$course_title;?></a>
													</div>
													<div class="star-rating" title="Rated <?=$course_avg_rating;?> out of 5">
														<span style="width:<?=$rating_percent;?>%"><strong class="rating"><?=$course_avg_rating;?></strong> out of 5</span>
													</div>
													<span class="price">
														<span class="amount"><?=$course_currency;?><?=$course_fees;?></span>
													</span>
													
													<div class="product-description">
														<div class="short-description">
															<p><?=$course_overview;?></p>
														</div>
														<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
													</div>
													
													<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
												</div>
												<!-- product -->
											</div>
											<?php } } ?>
											
										</div>
									</div>
								</div>
							</section>
							<!-- woocommerce relative product -->
						</div>	
					</div>
					<!--Shop -->
				</div>
				<?php include_once('recru_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
	<script src="js/jquery.min.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<script src="js/jquery.isotope.min.js"></script>
	
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>
	
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
</body>
</html>