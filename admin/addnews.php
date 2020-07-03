<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}

if (isset($_POST['addcontent']) && !empty($_POST['addcontent'])) {
     $gallery = $_FILES['gallery'];
     $title = $db_handle->sanitizePost($_POST['title']);
     $excerpts = $db_handle->sanitizePost($_POST['excerpts']);
     $category_name = $db_handle->sanitizePost($_POST['category_name']);
     $newsdate = $db_handle->sanitizePost(date('Y-m-d',strtotime($_POST['newsdate'])));
     $content = $db_handle->sanitizePost($_POST['content']);
     $news_type = $db_handle->sanitizePost($_POST['news_type']);
    $entrydate = date('Y-m-d');
   /* foreach($_POST as $key => $value) {
        $_POST[$key] = $db_handle->sanitizePost(trim($value));
    }
    extract($_POST);*/
    if(empty($gallery) || empty($title)) {
        $message_error = "Please fill all the fields and try again.";
    } else {
		$count = 0;
				$tmp_name = $_FILES["gallery"]["tmp_name"];
				echo $name = strtolower($_FILES["gallery"]["name"]);
				$extension = explode(".", $name);
		
				new_name:
				$name_string = rand_string(25);
				$newfilename = $name_string . '.' . end($extension);
				$newfilename = strtolower($newfilename);
		if($news_type=='releases'){
				if(file_exists("../img/releases/$newfilename")) {
					goto new_name;
				}
		
				$moved = move_uploaded_file($_FILES["gallery"]["tmp_name"], "../img/releases/$newfilename");
				//$_FILES['gallery']['name'] = $newfilename;

			$result = $bio_operation->uploadreleases($title, $newfilename, $category_name, $newsdate, $excerpts,$content);
		}elseif($news_type=='publications'){
				if(file_exists("../img/publications/$newfilename")) {
					goto new_name;
				}
		
				$moved = move_uploaded_file($tmp_name, "../img/publications/$newfilename");
				//$_FILES['gallery']['name'] = $newfilename;

			$result = $bio_operation->uploadpublications($title, $newfilename, $category_name, $newsdate, $excerpts,$content);
			
		}
			if($result) {
				 $message_success = "News was successfully uploaded";
			} else {
				$message_error = "News was not successfully uploaded.";
			}
		}
}
	
$category_name = $bio_operation->get_category_name();
?><!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="../img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
<script type="text/javascript" src="../js/moment.min.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
		
  		<script src="../js/jquery-1.11.2.min.js"></script>  
		<script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
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
										<span>Upload News</span>
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
								<h2>Upload News</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
                            <?php require_once '../layouts/feedback_message.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">
                                Title</label>
                            <input name="title" type="text" id="title" value="<?php $title; ?>" size="73" />
                        </div>
                        <div class="form-group">
                            <label for="category_name">
                                Category Name</label>
                            <div class="input-group">
                            <select name="category_name" class="form-control"  >
                            <option value="">Select Category Name</option>
                                      <?php 
							  foreach($category_name as $key => $value) {
                                            $category_name = $value['category_name'];
                                            $cat_id = $value['cat_id'];
                                           
                                            echo "<option value='$cat_id'>$category_name</option>";
                                        }     ?>
                            </select></div>
                        </div>
						<div class="form-group">
                            <label for="news_type">
                                News Type</label>
                            <div class="input-group">
                            <select name="news_type" class="form-control"  >
                            <option value="">Select News Type</option>
                            <option value="publications">Publications</option>
                            <option value="releases">Press Release</option>
                            </select></div>
                        </div>
                        <div class="form-group">
                            <label for="page_location">
                                Excerpts</label>
                            <div class="input-group">
                             <input name="excerpts" type="text" id="excerpts" value="<?php $excerpts; ?>" size="73" /></div>
                        </div>

                          <div class="form-group">
                          <label for="page_location">
                                News Date</label>
                            <div class='input-group date  col-md-4' id='datetimepicker1'>
                                <input type='text' name="newsdate" class="" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label for="page_location">
                                Image</label>
                            <div class="input-group">
                            <input name="gallery" type="file" class="btn btn-default" id="gallery" size="30" /></div>
                        </div>
                    <div class="form-group">
                            <label for="content">
                                Content</label>
                        <div class="">
                            <textarea id="editor1" name="content" style="width:1000px"></textarea>
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
                            <input type="submit" class="btn btn-primary" name="addcontent"  value="Add Content" />
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
 		
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
				viewMode: 'years',
                format: 'DD-MM-YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>

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

