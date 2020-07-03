<?php
require_once("../Connections/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("login.php");
}
$id = $_GET['id'];
$content = $bio_operation->get_content_by_id($id);
extract($content);
if (isset($_POST['updatecontent']) && !empty($_POST['updatecontent'])) {
    $page_name = $db_handle->sanitizePost($_POST['page_name']);
    $page_location = $db_handle->sanitizePost($_POST['page_location']);
    $title = $db_handle->sanitizePost($_POST['title']);
    $postedValue = $db_handle->sanitizePost($_POST['content']);
    $entrydate = date('Y-m-d');
    
    if(empty($title) || empty($postedValue) || empty($page_name)) {
        $message_error = "Please fill all the fields and try again.";
    } else {
        $result = $bio_operation->updatecontent($id,$page_name, $page_location, $title, $postedValue, $entrydate);
        if($result) {
             $message_success = "Content was successfully updated.";
        } else {
            $message_error = "Content was not successfully updated.";
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
 
 <script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea",
	width: 800,
    height: 500,
    theme: "modern",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
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
										<span>Update Content</span>
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
								<h2>Update Content</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInLeft">

		        <?php require_once '../layouts/feedback_message.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                        <input type="hidden" name="POST_MAX_SIZE" value="500000" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">
                                Title</label>
                            <input name="title" type="text" id="title" value="<?php echo $title; ?>" size="73" />
                        </div>
                        <div class="form-group">
                            <label for="category">
                                Page</label>
                            <div class="input-group">
                            <select name="page_name" class="form-control"  >
                            <option value="<?php echo $page_name; ?>"><?php echo $page_name; ?></option>
                                      <?php $query="SELECT * FROM  pageslocation where status='1'"; 
                             $result = mysqli_query($con,$query);
                            
                            while($row = mysqli_fetch_array($result))
                            {
                                $page_name="$row[page_name]";
                                print "<option value='$page_name'>$page_name</option>";
                            
                              }
                              ?>
                            </select></div>
                        </div>
                        <div class="form-group">
                            <label for="page_location">
                                Page Location</label>
                            <div class="input-group">
                            <select name="page_location" class="form-control"  >
                            <option value="<?php echo $page_location; ?>"><?php echo $page_location; ?></option>
                                      <?php $query="SELECT * FROM pageslocation where status='1'"; 
                             $result = mysqli_query($con,$query);
                            
                            while($row = mysqli_fetch_array($result))
                            {
                                $page_location="$row[page_location]";
                                print "<option value='$page_location'>$page_location</option>";
                            
                              }
                              ?>
                            </select></div>
                        </div>                        
                        
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="content">
                                Content</label>
                            <textarea id="content" name="content" style="width:100%"><?php echo htmlspecialchars_decode($info);?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="updatecontent"  value="Update Content" />
                             <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
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

