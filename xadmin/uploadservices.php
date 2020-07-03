<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
if (isset($_POST['addcontent']) && !empty($_POST['addcontent'])) {
    $intro = $db_handle->sanitizePost($_POST['intro']);
    $page_id = $db_handle->sanitizePost($_POST['page_id']);
    $page_title = $db_handle->sanitizePost($_POST['title']);
    $postedValue = $db_handle->sanitizePost($_POST['content']);
    $entrydate = date('Y-m-d');
    
    if(empty($page_title) || empty($postedValue) || empty($page_id)) {
        $message_error = "Please fill all the fields and try again.";
    } else {
        $result = $bio_operation->uploadservices($page_title, $page_id, $intro, $postedValue, $entrydate);
        if($result) {
             $message_success = "Service was successfully uploaded";
        } else {
            $message_error = "Service was not successfully uploaded.";
        }
    }
}
//$page_location = $bio_operation->get_page_location();
$pages = $bio_operation->get_service_page_name();
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
		<script src="../ckeditor/ckeditor.js"></script>
 
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
										<span>Upload Services</span>
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
								<h2>Upload Services</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
                            <?php require_once '../layouts/feedback_message.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type="hidden" name="POST_MAX_SIZE" value="5000000" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">
                                Page Title</label>
                            <input name="title" type="text" id="title" value="<?php $title; ?>" size="73" />
                        </div>
                        <div class="form-group">
                            <label for="page_id">
                                Page</label>
                            <div class="input-group">
                            <select name="page_id" class="form-control"  >
                            <option value="">Page</option>
                                      <?php 
							  foreach($pages as $key => $value) {
                                            $unique_id = $value['unique_id'];
								  			$page_name = $value['page_name'];
                                           
                                            echo "<option value='$unique_id'>$page_name</option>";
                                        }     ?>
                            </select></div>
                        </div>
                        <div class="form-group">
                            <label for="intro">Page Intro</label>
                            <div class="input-group">
								<input name="intro" type="text" id="intro" value="<?php $intro; ?>" size="73" />
                            </div>
                        </div>
                    <div class="form-group">
                            <label for="content">
                                Content</label>
                        <div class="">
                            <textarea id="editor1" name="content" style="width:100%"></textarea>
							<script>
                CKEDITOR.replace( 'editor1', {
					
					height: 300,

			// The following options are not necessary and are used here for presentation purposes only.
			// They configure the Styles drop-down list and widgets to use classes.

			stylesSet: [
				{ name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
				{ name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
			],

			// Load the default contents.css file plus customizations for this sample.
			contentsCss: [ CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

			// Configure the Enhanced Image plugin to use classes instead of styles and to disable the
			// resizer (because image size is controlled by widget styles or the image takes maximum
			// 100% of the editor width).
			image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
			image2_disableResizer: true
				} );
            </script>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="addcontent"  value="Add Services" />
                             <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
                    </div>
                        
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

