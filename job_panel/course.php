<?php include("header.php");
$course = $db_class->fetch_course_by_id($_GET['id']);

$course_cat = $db_class->fetch_course_by_category($course[0]['course_category']);
$view = $db_class->View_course($session_jobseek,$_GET['id']);
 ?>

         <main>
                <section class="clear-fix">
                    <h2>Courses</h2>
                    <hr style="margin-bottom:5px;"/>
					<!-- Shop -->
					<div role="main">

						<div  itemscope="" itemtype="http://schema.org/Product" class="product">
                        <?php 
                    
                    if(isset($course) && !empty($course)) { foreach ($course as $row) { 
                        
            ?>
                    <!-- item -->
                    <div style="cursor:pointer;margin-bottom:5px;" class="category-item list clear-fix"
                     onclick='location="course?id=<?= $row["course_id"] ?>"'>
                        <div class="picture">
                            <div class="hover-effect"></div>
                            <div class="link-cont">
                                <a href="http://placehold.it/270x200" class="fancy fa fa-search"></a>
                            </div>
                            <img src='../assets/images/courses/<?= $row["course_img"]?>' data-at2x="http://placehold.it/270x200" alt>
                        </div>
                        <h3><?=$row["course_title"]?></h3>
                        <div>
                            <div class="star-rating" title="Rated 4.00 out of 5">
                                <span style="width:100%"></span>
                            </div>
                            <div class="count-reviews">( reviews 10 )</div>
                        </div>
                        <p><?= htmlspecialchars($row["description"])?></p>
                        <div class="category-info">
                        <span class="price">
                                
                                <button type="submit"
                                 class="cws-button corner-radius-bottom alt">
                                 <i class="fa fa-book"></i> Enroll Now</button>
                            </span>
                            <span class="price">
                                <span class="amount">
                                <b><?= $row['course_fee'] ?> $</b>
                                </span>
                                
                            </span>
                            
                            <div class="count-users"><i class="fa fa-user">

                            </i> 25 students</div>
                            <div class="course-lector">
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php  }} ?>
						
							<hr class="divider-color"/>
							<!-- woocommerce relative product -->
							<section>
								<div class="carousel-container">
									<div class="title-carousel">
										<h2>Related Courses</h2>
										<div class="carousel-nav">
											<div class="carousel-button">
												<div class="prev"><i class="fa fa-angle-left"></i></div><!-- 
											 --><div class="next"><i class="fa fa-angle-right"></i></div>
											</div>
										</div>
									</div>
									<div class="grid-col-row">
										<div class="owl-carousel owl-three-item">
                                       <?php if(isset($course_cat) && !empty($course_cat)) { foreach ($course_cat as $row) { 
                        
                        ?>

											<div class="gallery-item" style="cursor:pointer" onclick='location="course?id=<?= $row["course_id"] ?>"'>
												<!-- product -->
												<div class="product new">
													<div class="picture">
														<img src='../assets/images/courses/<?php echo $row["course_img"] ?>' data-at2x="http://placehold.it/270x200" alt="">
														<span class="hover-effect"></span>
														<div class="link-cont">
															<a href="http://placehold.it/270x200" class="cws-right fancy cws-slide-left "><i class="fa fa-search"></i></a>
															<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>
														</div>
														
													</div>
													<div class="product-name">
														<a href="shop-single-product.html"><?php echo substr($row["course_title"],0,40) . '....' ?></a>
													</div>
													<div class="star-rating" title="Rated 5.00 out of 5">
														<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>
													</div>
													<span class="price">
														<span class="amount"><?php echo htmlspecialchars($row["course_fee"]) ?><sup>$</sup></span>
													</span>
													
													<div class="product-description">
														
														<!-- <div class="full-description">
															<p>In blandit ultricies euismod.Lobortis erat, sed ullamcorper erat interdum et. Cras volutpat felis id enim vehicula, eu facilisis dui lacinia. Vivamus sollicitudin tristique tellus.</p>
														</div> -->
													</div>
													
													
												</div>
												<!-- product -->
                                            </div>
                                       <?php }}?>
											
									
										</div>
									</div>
								</div>
							</section>
							<!-- woocommerce relative product -->
						</div>	
					</div>
					<!--Shop -->
				</div>
				
			</div>
        </div>
        </section>
        </main>
	</div>
	<?php include("footer.php") ?>