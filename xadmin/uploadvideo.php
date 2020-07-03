<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}

if (isset($_POST['addcontent']) && !empty($_POST['addcontent'])) {
     $title = $db_handle->sanitizePost($_POST['title']);
     $excerpts = $db_handle->sanitizePost($_POST['excerpts']);
    $entrydate = date('Y-m-d');
   /* foreach($_POST as $key => $value) {
        $_POST[$key] = $db_handle->sanitizePost(trim($value));
    }
    extract($_POST);*/
    if(empty($_FILES['gallery']) || empty($title)) {
        $message_error = "Please fill all the fields and try again.";
    } else {
		$count = 0;
			    $tmp_name = $_FILES["gallery"]["tmp_name"];
				$name = strtolower($_FILES["gallery"]["name"]);
				$extension = explode(".", $name);
		
				new_name:
				$name_string = rand_string(20);
				$newfilename = $name_string . '.' . end($extension);
				$newfilename = strtolower($newfilename);
		
				if(file_exists("../videos/$newfilename")) {
					goto new_name;
				}
				$moved = move_uploaded_file($tmp_name, "../videos/$newfilename");
				//$_FILES['gallery']['name'] = $newfilename;

		$result = $bio_operation->uploadvideo($title, $newfilename,$excerpts);
			if($result) {
				 $message_success = "Video was successfully uploaded";
			} else {
				$message_error = "Video was not successfully uploaded.";
			}
		}
}
	
?><!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="../img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet"> 
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
										<span>Upload Video</span>
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
								<h2>Upload Video</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-10 col-sm-12 col-xs-12 wow fadeInLeft">
                            <?php require_once '../layouts/feedback_message.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">
                                Title</label>
                           <div class="input-group"> <input name="title" type="text" id="title" value="<?php $title; ?>" size="73" /></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="title">
                                Excerpt</label>
                           <div class="input-group"> <input name="excerpts" type="text" id="excerpts" value="<?php echo $excerpts; ?>" size="73" /></div>
                        </div>
                        
                    <div class="form-group">
                        <div class="form-group">
                            <label for="content">
                                Content(Recomm size: 30MB - 50MB)</label>
                           <div class="input-group"> <input name="gallery" type="file" class="btn btn-default" id="gallery" size="30" /></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">

                             <input name="addcontent" type="submit" class="btn btn-success " id="addcontent" value="Add Video" />
                             <input name="cancel" type="reset" class="btn btn-danger " id="cancel" value="Cancel" />

                             
                    </div>
                </div>
                
    </form>
				
							</div>
						</div>
					</div>
				</section>
				
				<section class="color-bg">
					<div class="wrapper">
						<div class="row-4">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row-2-blocks row-2-blocks-2">
									<<div class="r-block-1">
										<div class="c-content-block wow fadeInDown top__element">
											<h2>We Work Hard And Give Your Business A Cutting Edge</h2>
											<div>Friendly customer service staff for your all questions!</div>
										</div>
									</div>
									<div class="r-block-2">
										<div class="btn big-circle">
											<div class="big-text">
												GET in touch today!
											</div>
											<div class="sm-text">
												We'll fix all your Problems!
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tooth-color-gr"></div>
				</section>
			</div>
			
            <?php include('../footer.php');?>          
		</div>
 
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

