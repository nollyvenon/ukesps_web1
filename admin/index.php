<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
 
 
		<script src="../js/jquery-1.11.2.min.js"></script>  
		<script src="../js/bootstrap.min.js"></script>
 
	</head>
	<body data-scrolling-animations="true">
		<div class="b-page">
<?php include('../header.php');?>			<div class="bg-wrapper aout-page">
				<section id="title-box" class="paralax bg-opacity-color about">
					<div class="wrapper">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h1>Admin</h1>
						</div>
					</div>
				</section>
				<section id="breadcrumbs" class="tooth tooth-green">
					<div class="section-bg">
						<div class="wrapper top-bug">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul>
									<li>
										<a href="index.php">Admin</a>
                                     
									</li>
									<li>
										<span>Home Page</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<section class="title-center">
					<div class="wrapper">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="section-title-box title-box-center wow bounceInDown center">
								<h2>Manage Site</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">

                                <div class="row">
                                	<div class="col-lg-3 text-center"><a href="uploadcontent.php"><i class="fa fa-eercast fa-6x" aria-hidden="true"></i><br>Upload Content</a></div>
                                	<div class="col-lg-3 text-center"><a href="uploadslider.php"><i class="fa fa-linode fa-6x" aria-hidden="true"></i><br>Upload Slider</a></div>
                                	<div class="col-lg-3 text-center"><a href="uploadgallery.php"><i class="fa fa-grav fa-6x" aria-hidden="true"></i><br>Upload Gallery</a></div>
                                	<div class="col-lg-3 text-center"><a href="addtestimonial.php"><i class="fa fa-free-code-camp fa-6x" aria-hidden="true"></i><br>Upload Testimonial</a></div>
                                
                                </div>            
                                <br><br>               
                                <div class="row">
                                	<div class="col-lg-3 text-center"><a href="addteammember.php"><i class="fa fa-ravelry fa-6x" aria-hidden="true"></i><br>Upload Team Member</a></div>
                                	<div class="col-lg-3 text-center"><a href="managecontent.php"><i class="fa fa-superpowers fa-6x" aria-hidden="true"></i><br>Manage Content</a></div>
                                	<div class="col-lg-3 text-center"><a href="manageslider.php"><i class="fa fa-cube fa-6x" aria-hidden="true"></i><br>Manage Slider</a></div>
                                	<div class="col-lg-3 text-center"><a href="managegallery.php"><i class="fa fa-clone fa-6x" aria-hidden="true"></i><br>Manage Gallery</a></div>
                                </div> 
                                <br><br>                          
                                <div class="row">
                                	<div class="col-lg-3 text-center"><a href="managetest.php"><i class="fa fa-map-o fa-6x" aria-hidden="true"></i><br>Manage Testimonial</a></div>
                                	<div class="col-lg-3 text-center"><a href="manageteammember.php"><i class="fa fa-male fa-6x" aria-hidden="true"></i><br>Manage Team Member</a></div>
                                	<div class="col-lg-3 text-center"><a href="managenews.php"><i class="fa fa-navicon fa-6x" aria-hidden="true"></i><br>Manage News</a></div>
                                	<div class="col-lg-3 text-center"><a href="managenewscat.php"><i class="fa fa-pencil-square-o fa-6x" aria-hidden="true"></i><br>Manage News Category</a></div>
                                </div>                           
                                <br><br>                          
                                <div class="row">
                                	<div class="col-lg-3 text-center"><a href="uploadservices.php"><i class="fa fa-newspaper-o fa-6x" aria-hidden="true"></i><br>Upload Services</a></div>
                                	<div class="col-lg-3 text-center"><a href="manageservices.php"><i class="fa fa-object-group fa-6x" aria-hidden="true"></i><br>Manage Services</a></div>
                                	<div class="col-lg-3 text-center"><a href="addvacancy.php"><i class="fa fa-newspaper-o fa-6x" aria-hidden="true"></i><br>Add Vacancy</a></div>
                                	<div class="col-lg-3 text-center"><a href="managevacancy.php"><i class="fa fa-newspaper-o fa-6x" aria-hidden="true"></i><br>Manage Vacancy</a></div>
                                </div>
								<br><br>
								<div class="row">
                                	<div class="col-lg-3 text-center"><a href="uploadvideo.php"><i class="fa fa-newspaper-o fa-6x" aria-hidden="true"></i><br>Upload Video</a></div>
                                	<div class="col-lg-3 text-center"><a href="managevideos.php"><i class="fa fa-object-group fa-6x" aria-hidden="true"></i><br>Manage Videos</a></div>
                                	<div class="col-lg-3 text-center"></div>
                                	<div class="col-lg-3 text-center"></div>
                                </div>
								<br><br>
								<div class="row">
                                	<div class="col-lg-3 text-center"><a href="addnews.php"><i class="fa fa-newspaper-o fa-6x" aria-hidden="true"></i><br>Upload News</a></div>
                                	<div class="col-lg-3 text-center"><a href="addnewscategory.php"><i class="fa fa-object-group fa-6x" aria-hidden="true"></i><br>Add News Category</a></div>
                                	<div class="col-lg-3 text-center"><a href="logout.php"><i class="fa fa-lock fa-6x" aria-hidden="true"></i><br>Log Out</a></div>
                                	<div class="col-lg-3"></div>
                                </div>                           
							</div>
						</div>
					</div>
				</section>
			
			</div>
			
            <?php include('../footer.php');?>          
		</div>
 
		<script src="../plugins/switcher/js/bootstrap-select.js"></script> 
		<script src="../plugins/switcher/js/evol.colorpicker.min.js" type="text/javascript"></script> 
		<script src="../plugins/switcher/js/dmss.js"></script>
 
		<script src="../js/jquery-ui.min.js"></script>
		<script src="../js/modernizr.custom.js"></script>
		<script src="../js/smoothscroll.min.js"></script>
		<script src="../js/wow.min.js"></script>
 
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->    
 
		<!--Owl Carousel-->
		<script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
		<script src="../js/waypoints.min.js"></script>
		<script src="../js/jquery.easypiechart.min.js"></script>
		<script src="../js/func.js"></script>
	</body>
</html>